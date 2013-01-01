<?php
	
/*
 $somevar = 15;
 $foo = 3;
 */
 



class items_controller extends base_controller {

	private $bag_group_id = 0;

	public function __construct() {
			
		parent::__construct();
		global $bag_group_id;
		
		
		
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
			
		}
		
	}
	

	public function index() {

            # Send them back
	    Router::redirect("items/teams");
         
	}
	
	
	/* When a user clicks on an item this function, if the item is 
	 * not in the db already for this user it will be added
	 * Otherwise it will simply add one to the number of items for that user
	 */
	public function add_item($item_id = 'no item selected') {
	   global $bag_group_id;
	
	   /*
	    * If the item is not in the database,
	    * then put it in there
	    */
	    $item_id_quotes = "'$item_id'";
	    
	    $q = "SELECT *
		  FROM bags
		  WHERE user_id=".$this->user->user_id."
		  AND item_id=".$item_id_quotes."
		  AND bag_group_id=".$this->user->current_bag_id
		;
		  
	   $the_item = DB::instance(DB_NAME)->select_row($q);
	   
	   
	   /*
	    * This is the Query for the bag number 
	    * which is stored for each user in the DB
	    */
       	    $q = "SELECT current_bag_id
	         FROM users
		 WHERE user_id=".$this->user->user_id;
		 
	   $bag_id_row = DB::instance(DB_NAME)->select_row($q);
	   $current_bag_id = $bag_id_row['current_bag_id'];
	   
	   // If the user does NOT have at least one of the item
	   // then put that add that item to their bag
	   if(empty($the_item)){
		// add the item to the bag for the user
	 
		$data = Array(	
			"number_of_items" => 1, // change this if they already have an item there
			"item_id" => $item_id,
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"bag_group_id" => $current_bag_id
		);
		
		# Do the insert
		DB::instance(DB_NAME)->insert('bags', $data);
		
		# Send them back
		Router::redirect("/items/teams");
		
	    	
	    // If the user already has at least one of the item
	    // then simply add one to the number_of_items row
	    } else {
	    	
	         $plus_one_item = ++$the_item['number_of_items'];         
	         $where_clause = 'WHERE bag_id = '.$the_item['bag_id'];         
	         $data = Array("number_of_items" => $plus_one_item );
	         DB::instance(DB_NAME)->update('bags', $data, $where_clause);
	         
		 # Send them back
		 Router::redirect("/items/teams");
		   
	    }
	  	   
	}
	
	
	/*
	 * This function will remove items from a user's bag
	 * If the number_of_items = 1 (or less) then remove the row, otherwise
	 * subtract one from the number_of_items
	 */
	public function remove_one_item($item_id) {
		   // if the item does not exist then let the user know
		   // if there is only one of the item, then remove it from the database
		   // (make this function return a value for the if clauses)
	   	   $item_id_quotes = "'$item_id'";
	   	   
	   	   
		   /*
		    * This is the Query for the bag number 
		    * which is stored for each user in the DB
		    */
		    $q = "SELECT current_bag_id
			 FROM users
			 WHERE user_id=".$this->user->user_id;

		   $bag_id_row = DB::instance(DB_NAME)->select_row($q);
		   $current_bag_id = $bag_id_row['current_bag_id'];
	   	   
	   	   
	    
		    $q = "SELECT *
			  FROM bags
			  WHERE user_id=".$this->user->user_id."
			  AND item_id=".$item_id_quotes."
			  AND bag_group_id=".$this->user->current_bag_id
			;
		  
	           $the_item = DB::instance(DB_NAME)->select_row($q);
	           
		   if(empty($the_item)){
		        // no items
		        return false;
		   
		   } elseif($the_item['number_of_items']==1){
			// remove the item from the db
			$where_clause = 'WHERE bag_id = '.$the_item['bag_id']; 
			DB::instance(DB_NAME)->delete('bags', $where_clause);
		   	return $the_item['item_id'];
		   	 
		   } else {
			$minus_one_item = --$the_item['number_of_items']; 
			echo '$minus_one_item= '.$minus_one_item;
			$where_clause = 'WHERE bag_id = '.$the_item['bag_id'];         
			$data = Array("number_of_items" => $minus_one_item, "modified" => Time::now() );
			DB::instance(DB_NAME)->update('bags', $data, $where_clause);
	         	return $the_item['item_id'];
		   
		   }	
		   
		      
	   }
	/*
	 * Show the items that are one of 
	 * the user's bags
	 */
	public function show_items_in_bag($bag_group_id) {
	
    		$q = "SELECT *
		FROM bags
		WHERE user_id=".$this->user->user_id."
		AND bag_group_id=".$bag_group_id;
	        $bags = DB::instance(DB_NAME)->select_rows($q);
	        $number_of_items = 1;

	        
		$this->template->content = View::instance("v_items_show_in_bag");
		$this->template->title   = "Items in this bag";

		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
		    );

		$this->template->client_files = Utils::load_client_files($client_files);
		
		# pass this data to the view
		$this->template->content->bags  = $bags ;

		# Render the view
		echo $this->template;

	
			
	}
	
	/*
	 * For each bag group put a bag on the screen
	 * and assign a bag_group_id to to the img
	 * src 
	 */
	public function view_bags(){
	   // execute a query that lists
	   // all of the bags on the screen
           $q = "SELECT DISTINCT bag_group_id
	         FROM bags
		 WHERE user_id=".$this->user->user_id;
		 
	   $bags = DB::instance(DB_NAME)->select_rows($q);

	   $this->template->content = View::instance("v_items_bags");
	   $this->template->title   = "Your bags";

	   $client_files = Array(
			"/css/users.css",
			"/js/users.js",
	    );

	   $this->template->client_files = Utils::load_client_files($client_files);

	   # pass this data to the view
	   $this->template->content->bags  = $bags;

	   # Render the view
	   echo $this->template;

	   	         
	}
	
	/*
	 * Send the items to the amazon cart
	 */
	public function send_to_cart(){
	
	  
	   $this->template->content = View::instance("v_items_send_to_cart");
	   $this->template->title   = "Sending to Cart";

	   $client_files = Array(
			"/css/users.css",
			"/js/users.js",
	    );

	   $this->template->client_files = Utils::load_client_files($client_files);

	   # Render the view
	   echo $this->template;
	  
	
	}
	
	
	/*
	*  Display a list of teams and allow 
	*  a user to send a user to a screen 
	*  with the items of the team that they 
	*  select
	*/
	public function teams(){
		# Set up the view
		$this->template->content = View::instance("v_items_teams");
		$this->template->title   = "Users";

		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
		    );

		$this->template->client_files = Utils::load_client_files($client_files); 

		# Render the view
		echo $this->template;	
	
	}
	
	/**
	 * Changes the bag number for a user
	 * which would allow for the creation
	 * of more bags
	 */
	public function change_bag_number($bag_id){
	  	global $bag_group_id;
	  	$new_bag_id = $this->bag_group_id;
	  	$new_bag_id++;	
	  	//$this->bag_group_id = $new_bag_id;
	  	$this->set_bag_group_id( $bag_id  );
	  	echo $this->bag_group_id;
	  	
	  	Router::redirect("/items/teams"); 
	       
	}
	
	
	/**
	*
	* Increments the bag number by one
	* so that a new bag can be created
	*
	*/
	public function increment_bag_number(){
		echo '<br>';
		global $bag_group_id;
		$new_bag_id = $this->bag_group_id;
	  	$new_bag_id++;	
	  	$this->set_bag_group_id( $new_bag_id  );
	  	echo $this->bag_group_id;
	
	}
	
	/*
	 * Fetch all of the bags from the database
	 * Get the highest bag number and then make the 
	 * new bag id one higher than the current highest 
	 * bag id
	 */
	public function create_new_bag(){
           $q = "SELECT current_bag_id
	         FROM users
		 WHERE user_id=".$this->user->user_id;
		 
	   $bag_id_row = DB::instance(DB_NAME)->select_row($q);
	   $current_bag_id = $bag_id_row['current_bag_id'];
	   
	   // incrementing the bag_id so that a new bag_id can be
	   // associated with the next items
	   $current_bag_id++;
	   
	   echo $current_bag_id;
	   
	   // Store this new value in the DB
	   // so that it can be fetched later
	   
	   $data = Array("current_bag_id" => $current_bag_id);
	   $where_clause = 'WHERE user_id = '. $this->user->user_id;
	   DB::instance(DB_NAME)->update("users", $data, $where_clause);
	      	
	}
	
		
	/*
	 * View a list of patriots items
	 */
	public function patriots_items(){
	
		$this->template->content = View::instance("v_items_for_team");
		$this->template->title   = "Patriots Gear";

		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
		    );

		$this->template->client_files = Utils::load_client_files($client_files); 
		
		# Build a query of the users this user is following - we're only interested in their posts
		$q = "SELECT * 
		      FROM items
		      WHERE team = 
		      'patriots'
		      ";
			

		# Store our results (an array) in the variable $items
		$items = DB::instance(DB_NAME)->select_array($q, 'item_id');
		
		# Pass the item data to the view
		$this->template->content->items = $items;

		# Render the view
		echo $this->template;		
	
	}
	
	
	public function celtics_items(){
	
		$this->template->content = View::instance("v_items_for_team");
		$this->template->title   = "Celtics Gear";

		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
		    );

		$this->template->client_files = Utils::load_client_files($client_files); 
		
		# Build a query of 
		$q = "SELECT * 
			FROM items
		        WHERE team = 
		       'celtics'
		      ";
			
		# Store our results (an array) in the variable $items
		$items = DB::instance(DB_NAME)->select_array($q, 'item_id');
		
		# Pass the item data to the view
		$this->template->content->items = $items;

		# Render the view
		echo $this->template;		
	
	}
	
	public function red_sox_items(){
	
		$this->template->content = View::instance("v_items_for_team");
		$this->template->title   = "Red Sox Gear";

		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
		    );

		$this->template->client_files = Utils::load_client_files($client_files); 
		
		# Build a query of 
		$q = "SELECT * 
			FROM items
		        WHERE team = 
		       'redsox'
		      ";
			
		# Store our results (an array) in the variable $items
		$items = DB::instance(DB_NAME)->select_array($q, 'item_id');
		
		# Pass the item data to the view
		$this->template->content->items = $items;

		# Render the view
		echo $this->template;		
	
	}
	
	public function bruins_items(){
	
		$this->template->content = View::instance("v_items_for_team");
		$this->template->title   = "Bruins Gear";

		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
		    );

		$this->template->client_files = Utils::load_client_files($client_files); 
		
		# Build a query of 
		$q = "SELECT * 
			FROM items
		        WHERE team = 
		       'bruins'
		      ";
			
		# Store our results (an array) in the variable $items
		$items = DB::instance(DB_NAME)->select_array($q, 'item_id');
		
		# Pass the item data to the view
		$this->template->content->items = $items;

		# Render the view
		echo $this->template;		
	
	}
	
}