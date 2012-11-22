$(document).ready(function() {

	function createDiv(text,divId) {
            
            var divTag = document.createElement("div"); 
            divTag.id = divId; 
            divTag.setAttribute("align", "center"); 
            divTag.style.margin = "0px auto"; 
            divTag.className = "dynamicDiv"; 
            divTag.innerHTML = text; 
            document.body.appendChild(divTag); 
            
	}
	
	function createSomeDiv(text) {
            
            var divTag = document.createElement("span"); 
            divTag.id = "someDiv";
            // divTag.class = "postPasswordDiv";
            divTag.setAttribute("align", "right"); 
           
            divTag.style.margin = "0px auto"; 
            divTag.className = "postPasswordDiv"; 
            divTag.innerHTML = text; 
            document.body.appendChild(divTag); 
            
	}	
	

	
	
	

	//document.getElementById('lucy').style.backgroundColor = "red";
	var alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j' , 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
	var postString= "";  // define this outside so that the letters are not forgotten
	
	
	// Loop through the array and put those letters on the screen
	for(var i=0; i< alphabet.length; i++){
		createSomeDiv(alphabet[i]);
		
	}
	
	$('.postPasswordDiv').on('click', function() {
		//processPassword();
		console.log(" something was clicked");
       	});
	
	$('#prepassword').on('keyup', function() {
	     processPassword();
        });
	 
	 
	 
	 function processPassword() {

	 	 $('#prepassword').on('keydown', function() {
	 	       console.log("inside of the hide function");
	 	       $('div').remove('#letterChangeDiv');
	 	 });
	 	
	 	 
		 var preString = $('#prepassword').val().toLowerCase();
		 var lastCharacter = preString.charAt( preString.length-1 ).toLowerCase();
		 console.log("lastCharacter= " + lastCharacter); 
		 		 		 
		 switch(lastCharacter){ 

			case 'a': 
			  lastCharacter = '@';
			  createDiv("Your letter a was changed to the @ symbol", "letterChangeDiv");
			  break;
			  
			case 's':
			  lastCharacter = '$';
			  createDiv("Your s was changed to the $ sign", "letterChangeDiv");
			  break;
			  
			  
			case 'h':
			  lastCharacter = '#';
			  createDiv("Your h was changed to the # sign", "letterChangeDiv");
			  break;
			  
			case 'o':
			  lastCharacter = '0';
			  createDiv("Your o was changed to the number zero", "letterChangeDiv");
			  break;
			  
			case 'x':
			  lastCharacter = '%';
			  createDiv("Your x was changed to the % symbol", "letterChangeDiv");
			  break;
			  
			case 'i':
			  lastCharacter = '!';
			  createDiv("Your i was changed to the symbol !", "letterChangeDiv");
			  break;
			  
			case 'l':
			  lastCharacter = '1';
			  createDiv("Your L was changed to the number one", "letterChangeDiv");
			  break;
			  
			case 'e':
			  lastCharacter = '3';
			  createDiv("Your E was changed to the number three", "letterChangeDiv");
			  break;
			  
			  
			default:
			  lastCharacter = preString.charAt( preString.length-1 );            // if none of these cases are true
			  if(preString.length == 1){ //capitalize the first character	     // then do not change the last character 
			  	lastCharacter = preString.charAt(0).toUpperCase();
			  	createDiv("Your first letter was capitalized", "letterChangeDiv");
			  	
			  }							    
			  
		}	  	                                                   

		postString+=lastCharacter;
		
		// Check to make sure that the 
		// user did not delete characters
		if(preString.length < postString.length ){
		   postString = postString.substring(0, postString.length-2);
		   
		}
		
		// put the new password in the bottom textbox
		$('#postpassword').val(  postString  );
		
         
         }
         

}); // end of doc ready