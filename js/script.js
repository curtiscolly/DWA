$(document).ready(function() {
	//  Vanilla JavaScript
	document.getElementById('lucy').style.backgroundColor = "red";
	var alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j' , 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
	
	 $('#prepassword').keyup(function() {
		 var preString = $('#prepassword').val();
		 var lastCharacter = preString.charAt( preString.length-1 );
		 
		 
		 if (lastCharacter == 'a'){
			preString = preString.replace( lastCharacter, 'b');    // if the last character is 'a'
									  // change it to 'b'
		 }


		 $('#postpassword').val(  preString  ); 

         
         
         }); // end the keyup function




}); // end of doc ready