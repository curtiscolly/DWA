<?php

class users_controller extends base_controller {
       

	public function __construct() {
		parent::__construct();
	}
		
       
       
         public function index() {
            Router::redirect("/users/login");

	}



	public function signup() {

	# Set up view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign Up";

	# Load CSS / JS
		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files); 
        
	# Render the template
	echo $this->template;
	
	}

	public function p_signup() {

		# What data was submitted
		#print_r($_POST);

		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		$_POST['created']  = Time::now(); # This returns the current timestamp
		$_POST['modified'] = Time::now();

		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

		# Put the data in the database
		DB::instance(DB_NAME)->insert('users', $_POST);
		
		#reroute them to their profile page
		$email = $_POST['email'];
		Router::redirect("/users/profile/$email");
		
		# Prepare our data array to be inserted 
		# get the user to follow themselves to that they can see their own posts
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $this->user->user_id
			);

		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);
		
		#send them an email confirming that they are signed up
		Email::send();

		

	}

	public function view_cookies() {
		echo Debug::dump($this->user, "coooooooookies");
		echo $this->user->email; 
	}


	public function login($error = NULL) {
	
	
		# if the user is logged in already, send them to the profile page
		if( $this->user ){
		       $email = $this->user->email;
		       Router::redirect("/users/profile/$email");
		    
		}
		else {

			# Set up view
			$this->template->content = View::instance('v_users_login');
			$this->template->title   = "Login";
			$this->template->content->error = $error;

			# Load CSS / JS
			$client_files = Array(
					"/css/users.css",
					"/js/users.js",
			    );

			$this->template->client_files = Utils::load_client_files($client_files); 

			# Render the template
			echo $this->template;
		}
		
          }
          
	public function p_login() {
	       

		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		$q = "SELECT token
			FROM users
			WHERE email = '".$_POST['email']."'
			AND password = '".$_POST['password']."'
			";

		$token = DB::instance(DB_NAME)->select_field($q);
		

		# Login failed
		if($token == "") {
			Router::redirect("/users/login/error"); # Note the addition of the parameter "error"

		}

		# Login passed
		else { 
			setcookie("token", $token, strtotime('+2 weeks'), '/');
			# I am going to make the email function global so that  I can reference 
			# from the login function 
			
			$email = $_POST['email'];

			#send them into thier posts
			Router::redirect("/posts");
		}

	}


	public function logout() {
	
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);

		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		# Delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');

		# Send them back to the main landing page (a hack to delete the cookie)
		Router::redirect("/");
		
	}

	public function profile($user_name = NULL) {

		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Login</a>";

			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return false;
		}

			#echo $this->user->first_name;		

        
		 if($user_name == NULL) {
		 	echo "You did not specify a user";
		 } 
		
		 else {

			# Setup the view
				$this->template->content = View::instance("v_users_profile");
				$this->template->title   = "Profile for ".$user_name;

		        # Set up client files
				$client_files = Array(
					"/css/users.css", "/js/users.js"
					);
				$this->template->client_files = Utils::load_client_files($client_files);

			 # Pass variables to the view
				$this->template->content->user_name = $user_name;

			 #  Render the view
	 			echo $this->template;
	
	   
		}	
	}
	
	

}	