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
            divTag.id = text;
            divTag.setAttribute("align", "right"); 
            divTag.style.margin = "0px auto"; 
            divTag.className = "postPasswordDiv"; 
            divTag.innerHTML = text; 
            document.body.appendChild(divTag); 
            
	}	
	

	var alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j' , 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
	var postString= "";  // define this outside so that the letters are not forgotten
	
	
	// Loop through the array and put those letters on the screen
	for(var i=0; i< alphabet.length; i++){
		var letterId = '#' + alphabet[i];
		createSomeDiv(alphabet[i]);
		
		
		$(letterId).on('click', function() {
			//console.log( this.id + " was clicked");
			processPassword(this.id);
		
		});
		
		
	}
	

	$('#prepassword').on('keyup', function() {
	     processPassword();
        });
	 
	 
	 
	 var postString;
	 function processPassword(lastCharacter) {

	 	/* $('#prepassword').on('keydown', function() {
	 	       console.log("inside of the hide function");
	 	       $('div').remove('#letterChangeDiv');
	 	 }); */
	 	
	 	 
		  lastCharacter
		// var lastCharacter = preString.charAt( preString.length-1 ).toLowerCase();
		 
		
		 
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
			  
			case 't':
			  lastCharacter = '+';
			  createDiv("Your T was changed to the symbol +", "letterChangeDiv");
			  break;
			  
			  
			default:
			  if(postString.length == 0){ //capitalize the first character
			  	lastCharacter = lastCharacter.toUpperCase();
			  	createDiv("Your first letter was capitalized", "letterChangeDiv");
				
			  }
		
		} // end switch
		postString+=lastCharacter;
		
		// put the new password in the textbox
		$('#postpassword').val(  postString  );
		// console.log(postString);
		}	  	                                                   

		
		
		

		
         
         
    $('#m').after("<br /><br /><br /><br /><br />");
    $('#z').after("<br /><br />");
   
         

}); // end of doc ready