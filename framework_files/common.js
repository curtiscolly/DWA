$(document).ready(function() {
	
	
	/* If we use a button in a form as a submit, instead of a submit button it triggers on most browsers except id. 
	If we add the class "submit" to it, this function will make it work */
	$('.submit:button').click(function() {
		$(this).parents('form:first').submit();
	});	


}); // eodr

/*-------------------------------------------------------------------------------------------------
JS equivalent of PHP's $_GET
Use: var foobar = $_GET('foobar');
-------------------------------------------------------------------------------------------------*/
function common_get(q,s) {
	s = s ? s : window.location.search; 
	var re = new RegExp('&'+q+'(?:=([^&]*))?(?=&|$)','i'); 
	s = s.replace('?','&').match(re); 
	if(s) 
		return typeof s[1] != 'undefined' ? decodeURIComponent(s[1]) : '';
}

/*-------------------------------------------------------------------------------------------------

-------------------------------------------------------------------------------------------------*/
function common_start_ajax(id) {

	var button = $('#' + id);
	
	// Make the button unclickable
		button.attr('disabled','disabled');
 	
 	// Change the class to the loading one (yellow animated stripe background)
		button.addClass("ajax-loading");

}


/*-------------------------------------------------------------------------------------------------

-------------------------------------------------------------------------------------------------*/
function common_end_ajax(id) {

	var button = $('#' + id);
	
	// Turn off the loading class (yellow animated stripe background)
		button.removeClass("ajax-loading");
	
	// Turn on complete loading class (green)
		button.addClass("ajax-complete");
						
	// Wait a quick second, then return to normal state
		setTimeout(function() {
		
			$(button).removeClass("ajax-complete");
			
			// Make the button clickable again
				button.removeAttr('disabled');
		}, 500);
}

/*-------------------------------------------------------------------------------------------------

-------------------------------------------------------------------------------------------------*/
function common_dialog(data, width) {

	var dialog = $("#common-dialog");
	if ($("#common-dialog").length == 0) {
	   	dialog = $('<div id="common-dialog"><span class="icon">&#x0023;</span></div>').appendTo('body');
	}

	dialog.append(data);
	
	dialog.dialog({ 
		autoOpen: true,
		draggable: true,
		modal:true,
		resizable: true, 
		title: '', 
		width: width,
		closeOnEscape: true,
		dialogClass: "common-dialog",
		close: function(){
			dialog.remove();
		},
		open: function(){
            $('.ui-widget-overlay, .icon').bind('click',function(){
                dialog.dialog('close');
            })
        }
	})

}

