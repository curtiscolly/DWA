<?php

class posts_controller extends base_controller {
    public function __construct(){
    
       parent::__construct();
    
       if(!$this->user){
          die("Members only. <a href=/users/login'>Please Login</a>");
       
       
       }
    
    
    
    }
 
 public function index(){
 
 #Set up the view
 $this->template->content = View::instance("v_posts_index");
 $this->template->title = "all the posts";
 
 $q = "SELECT *
       FROM posts
       JOIN users USING(user_id)";
       
 $posts = DB::instance(DB_NAME)->select_rows($q);
 
 #pass data to the view
 this->template->content->posts = $posts;
 
 #render this view
 echo $this->template;
 
 }

 public function users(){
 $this->template->content = View::instance("v_posts_users");
 
 $q = "SELECT * 
       FROM users";
       
 $users
 
 
 }
 
 
 public function follow($user_id_followed = NULL){
    
     $data['created'] = Time::now();
     $data['user_id'] = $this->user->user_id;
     $data['user_id_followed'} = $user_id_followed;
     
     DB::insert(DB_NAME)->insert("users_users", $data);
     
     Router::redirect("/posts/users");
 
 
 }
 
 
 public function unfollow($user_id_followed = NULL){
 
 
 
 }

 public function add(){
   
 #Set up the view
 $this->template->content = ("v_posts_add");
 
 
 #render the view
 
 }
 
 
 public function p_add(){
 
    print_r($posts);
    
    $_POST['created'] = Time::now();
    $_POST['modified'] = Time::now();
    $_POST['user_id'] = $this->user->user_id;
    
    DB::instance
 
  
 }
 
 
 

}