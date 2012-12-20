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
  <div id='topBar'>
   <? if($user): ?>
	      
	        <a href='/users/logout'>Logout</a>  
	        <a href='/items/view_bags'>View Bags</a>
	        <a href='/teams/'>Create new bag</a>
	        
   <? else: ?>
 	   <span id= 'topButtons'>
   	       <a href='/users/signup'>Sign up</a>
   	       <a href='/users/login'>Log in</a>
   	   </span>
   	      
  <? endif; ?>
 
 <div id='left'>
 	 <img src="/images/patriots.jpg" alt="Patriots Logo" class="images">
 	 <img src="/images/celtics.jpg" alt="Patriots Logo"  class="images">
	 <img src="/images/patriots.jpg" alt="Patriots Logo" class="images">
	 <img src="/images/celtics.jpg" alt="Patriots Logo" class="images">	 
 </div>
 
 <div id='right'><?=$content;?></div>
 
</body>
</html>