<div class="left-of-page">&nbsp;</div> <!--Need this to make sure the middle boxes stay in the middle -->

<div class="middle-of-page">
   <h1>BUBBLES</h1>

   <div class="upper-middle">

        <form method='POST' action='/users/p_login'>
            Email<br>
	    <input type='text' name='email'>	
	    <br><br>

	    Password<br>
	    <input type='password' name='password'>
	    <br><br>
	    <? if($error): ?>
		  <div class='error'>
			Login failed. Please double check your email and password.
		  </div>
		  <br>
	    <? endif; ?>

	   <input type='submit' class='buttons' value='Log In'>

        </form>
   </div>
   
   
   
   <h1>OR</h1>
   <div class="lower-middle">
   
    <form method='POST' action='/users/p_signup'>
   
   	First Name<br>
   	<input type='text' name='first_name'>
   	<br><br>
   	
   	Last Name<br>
   	<input type='text' name='last_name'>
   	<br><br>
   
   	Email<br>
   	<input type='text' name='email'>
   	<br><br>
   	
   	Password<br>
   	<input type='password' name='password'>
   	<br><br>
   	
	<? if($error): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<? endif; ?>

   	
   	<input type='submit' class='buttons' value='Sign Up'>
    </form> 


   </div>

</div>
		
<div class="right-of-page">
   <p></p>
   <div class="square-1">
      <span></span>
   </div>
   <div class="square-2">
      <span></span>
   </div>
   <div class="square-3">
      <span></span>
   </div>
   <div class="square-4">
      <span></span>
   </div>
</div>