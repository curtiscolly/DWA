$(function() {
	
	$('h2').each(function(index) {
		$(this).prepend("<a name='" + $(this).html() + "'>");
		$(this).append("</a>");
	});
	
	
	$('a').each(function(index) {
		
	});

	$('.code').each(function(index) {
			
		// If it already has an id, it's already been instantiated
		if( !$(this).attr('id') ) {
			
	        $(this).attr('id', 'code-' + index);
	        var editor = CodeMirror.fromTextArea(document.getElementById('code-' + index), {
	                mode: "application/x-httpd-php",
	                tabMode: "indent",
	                indentUnit: 5,
	                matchBrackets: false,
	                smartIndent: false,
	                electricChars: false,
	               	indentWithTabs: true,
	               	lineWrapping: true,
	               	autoClearEmptyLines: true, 
	               	lineNumbers: $(this).is('.inline') ? false : true,
	               	onChange: function() {
	                	// updates the textarea 
						editor.save(); 
					}
	            }
	            
	        );
		}
		
	});	
	
	
	/*-------------------------------------------------------------------------------------------------
	Table of contents collapsing menu
	-------------------------------------------------------------------------------------------------*/
	$('#toc strong').click(function() {
	
		// Turn them all off
		$('#toc div').each(function() {
			$(this).hide();
		});
		
		$('#toc strong').each(function() {
			$(this).css('text-decoration', 'underline');
		});
		
		// Then turn this one on
		$(this).next().show();
		
		$(this).css('text-decoration', 'none');
		
		
		
	});
	
	/*-------------------------------------------------------------------------------------------------
	Table of contents
	-------------------------------------------------------------------------------------------------*/
	var toc_left_pos = $("#toc").css('left'); // Dynamically figure out how far to push cp right; this way if we want to change it we only have to change it in the CSS
	var toc_width = parseInt($("#toc").css('width')); 	
		
	$('#toc-toggle').click(function() {
		
		if($("#toc").css('left') == '0px') {
			$("#toc").animate({left:-toc_width - 6},"fast");
			$(".wrapper").animate({left:25},"fast");
			$(".wrapper").animate({width:"100%"},"fast");
			$("#toc-toggle").html("+");
		}
		else {
			$("#toc").animate({left:toc_left_pos},"fast");
			$(".wrapper").animate({left:toc_width + 25},"fast");
			$(".wrapper").animate({width:"80%"},"fast");
			$("#toc-toggle").html("-");
		}


		
	});


});

