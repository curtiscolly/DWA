
<!DOCTYPE html>
<html>
<head>
        <script type="text/javascript" src="https://Ajax.googleapis.com/Ajax/libs/jquery/1.7.0/jquery.min.js"></script>

        <script type='text/javascript'>
                $(document).ready(function() {
                	$('#process-btn').click(function(){
                	
				$.ajax({
					type: 'POST',
					url: 'processor.php;
					success: function(response) {
					
					
					},
					data: {
						first_name: $('#first_name').val(),
						
					
					}
				
					



				}
                	
                	
                	});
                  });

                });
        </script>
</head>
<body>

        Enter your name:<br>
        <input type='text' id='name'><br><br>

        <input type='button' id='process-btn'>Reverse</button>

<!-- We'll put the results in this empty div -->
        <div id='results'></div>


</body>
</html>