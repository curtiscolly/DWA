

   <h1>Boston Sports</h1>
   <h2>Get gear from your favorite team</h2>

   
   <div class='middle'>
        <form method='POST' action='/users/p_login'>
            Email<br>
	    <input type='text' name='email'>	
	    <br><br>

	    Password<br>
	    <input type='password' name='password'>
	    <br><br>
	    <? if($error): ?>
		  <div class="error">
			<p>Login failed. Please double check your email and password.</p>
		  </div>
		  <br>
	    <? endif; ?>

	   <input type='submit' class='buttons' value='Log In'>

        </form>
  
   
   
   <h1>OR</h1>
   
   
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
   
 

		
