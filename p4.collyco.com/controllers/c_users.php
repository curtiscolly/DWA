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

		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		$_POST['created']  = Time::now(); # This returns the current timestamp
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

		# Put the data in the database
		DB::instance(DB_NAME)->insert('users', $_POST);

		$this->login();
		
		
	 
	}



	public function login($error = NULL) {
	
	
		# if the user is logged in already, send them to the profile page which is a list of their bags
		if( $this->user ){
		       $email = $this->user->email;
		       Router::redirect("/items/view_bags");
		    
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
			
			Router::redirect("/items/teams");
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
	

}	