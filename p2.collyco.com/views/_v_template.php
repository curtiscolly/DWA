<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?php echo @$client_files; ?>
	
</head>

<body>	
<div class="left-of-page">
   <? if($user): ?>
	   <p></p>
	   <!-- These divs are for the bubbles -->
	   <div class="square-1">
	      <span>
	         <!-- I could put text in here -->
	      </span>
	   </div>
	   <div class="square-2">
	      <span>
	        <a href='/users/logout'>Logout</a>  
	      </span>
	   </div>
	   <div class="square-3">
	      <span>
	          <a href='/posts/add'>Add a new post</a>
	      </span>
	   </div>
	   <div class="square-4">
	      <span>
	         <a href='/posts/'>View posts</a>
	      </span>
	   </div>
	   
   <? else: ?>
   	   <p></p>
   	   <!-- These divs are for the bubbles -->
   	   <div class="square-1">
   	      <span><a href='/users/signup'>Sign up</a></span>  <!-- I could put text in here -->
   	   </div>
   	   <div class="square-2">
   	      <span><a href='/users/login'>Log in</a></span>
   	   </div>
   	   <div class="square-3">
   	      <span></span>
   	   </div>
   	   <div class="square-4">
	   <span></span>
	   </div>
  <? endif; ?> 
</div>
        <div class="upper-middle">
	 <div id='menu'>
	<!-- <? echo $user->email; ?>   -->
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
			
			<a href='/users/logout'>Logout</a>
			<a href='/posts/users/'>Change who you're following</a>
			<a href='/posts/'>View posts</a>
			<a href='/posts/add'>Add a new post</a>
			<p>Welcome Back <?=$user->first_name?></p>
	
		
		<!-- Menu options for users who are not logged in -->	
		<? else: ?>
		
			<a href='/users/signup'>Sign up</a>
			<a href='/users/login'>Log in</a>
			<p>Welcome Stranger</p>
		
		<? endif; ?>

	</div>
       </div>
	
	<br>

	<?=$content;?> 

</body>
</html>