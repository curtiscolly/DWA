<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="eng">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Curtis Colly</title>
    <meta name="keywords" content="" />    
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
	<link rel="stylesheet" href="css/jquery.stickynotes.css" type="text/css">
	<link rel="stylesheet" href="css/mainstyle.css" type="text/css">
    <style type="text/css">
        #stage {
            top: 0px;
            left: 0px;
            z-index: 100;
        }
        .stage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            min-width: 900px;
            height: 359px;
            overflow: hidden;
        }
        #bg {
            background: #aedfe5 url(images/sky1.png) 0 0 repeat-x;
        }
        #clouds {
            background: transparent url(images/cloud.png) 305px 102px repeat-x;
        }
        #hill2 {
            background: transparent url(images/hill2.png) 0 258px repeat-x;
        }
        #hill1 {
            background: transparent url(images/hill-with-windmill.png) 0 104px repeat-x;
        }
        #balloons {
            position: relative;
            left: 720px;
            background: transparent url(images/balloons.png) 0 0 repeat-y;
        }
        #bird {
            background: transparent url(images/bird-forward-back.png) 0 0 no-repeat;
            position: absolute;
            top: 150px;
            left: 65px;
            width: 180px;
            height: 123px;
            z-index: 2000;
            cursor: pointer;
        }
    </style>
	
	
	<!--Start CSS for the rounded box -->
	<style type="text/css">
   .roundedcornr_box_388177 {
      background: #aedfe5 url(images/roundedcornr_388177_grad.gif) no-repeat;
   }
   .roundedcornr_top_388177 div {
      background: url(images/roundedcornr_388177_tl.gif) no-repeat top left;
   }
   .roundedcornr_top_388177 {
      background: transparent url(images/roundedcornr_388177_tr.gif) no-repeat top right;
   }
   .roundedcornr_bottom_388177 div {
      background: url(images/roundedcornr_388177_bl.gif) no-repeat bottom left;
   }
   .roundedcornr_bottom_388177 {
      background: transparent url(images/roundedcornr_388177_br.gif) no-repeat bottom right;
   }

   .roundedcornr_top_388177 div, .roundedcornr_top_388177,
   .roundedcornr_bottom_388177 div, .roundedcornr_bottom_388177 {
      width: 100%;
      height: 30px;
      font-size: 1px;
   }
.roundedcornr_content_388177 { margin: 0 30px; }
	
	</style>
	<!--End CSS for the rounded box -->
    
    <!-- IE6 fixes are found in styles/ie6.css -->
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="styles/ie6.css" /><![endif]-->
    
    <script src="scripts/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.spritely-0.6.js" type="text/javascript"></script>

    <script type="text/javascript">

        (function($) {
            $(document).ready(function() {
                $('#logo').click(function() {
                    document.location.href = 'http://www.spritely.net/';
                });
            
                $('#bird')
                    .sprite({
                        fps: 9, 
                        no_of_frames: 3,
                        // the following are optional: new in version 0.6...
                        start_at_frame: 2,
                        on_first_frame: function(obj) {
                            if (window.console) {
                                console.log('first frame');
                            }
                        },
                        on_last_frame: function(obj) {
                            // you could stop the sprite here with, e.g.
                            // obj.spStop();
                            if (window.console) {
                                console.log('last frame');
                            }
                        },
                        on_frame: {
                            2: function(obj) {
                                // you could change the 'state' of the
                                // sprite here with, e.g. obj.spState(2);
                                if (window.console) {
                                    console.log('frame 2');
                                }
                            }
                        }
                    })
                    .spRandom({top: 50, bottom: 200, left: 300, right: 320})
                    .isDraggable()
                    .activeOnClick()
                    .active();
                $('#clouds').pan({fps: 30, speed: 0.7, dir: 'left', depth: 10});
                $('#hill2').pan({fps: 30, speed: 2, dir: 'left', depth: 30});
                $('#hill1').pan({fps: 30, speed: 3, dir: 'left', depth: 70});
                                $('#balloons').pan({fps: 30, speed: 3, dir: 'up', depth: 70});
                $('#hill1, #hill2, #clouds').spRelSpeed(8);
                
                window.actions = {
                    fly_slowly_forwards: function() {
                        $('#bird')
                            .fps(10)
                            .spState(1);
                        $('#hill1, #hill2, #clouds')
                            .spRelSpeed(10)
                            .spChangeDir('left');
                    },
                    fly_slowly_backwards: function() {
                        $('#bird')
                            .fps(10)
                            .spState(2);
                        $('#hill1, #hill2, #clouds')
                            .spRelSpeed(10)
                            .spChangeDir('right');
                    },
                    fly_quickly_forwards: function() {
                        $('#bird')
                            .fps(20)
                            .spState(1);
                        $('#hill1, #hill2, #clouds')
                            .spRelSpeed(30)
                            .spChangeDir('left');
                    },
                    fly_quickly_backwards: function() {
                        $('#bird')
                            .fps(20)
                            .spState(2);
                        $('#hill1, #hill2, #clouds')
                            .spRelSpeed(30)
                            .spChangeDir('right');
                    },
                    fly_like_lightning_forwards: function() {
                        $('#bird')
                            .fps(25)
                            .spState(1);
                        $('#hill1, #hill2, #clouds')
                            .spSpeed(40)
                            .spChangeDir('left');
                    },
                    fly_like_lightning_backwards: function() {
                        $('#bird')
                            .fps(25)
                            .spState(2);
                        $('#hill1, #hill2, #clouds')
                            .spSpeed(40)
                            .spChangeDir('right');
                    }
                };
                
                window.page = {
                    hide_panels: function() {
                        $('.panel').hide(300);
                    },
                    show_panel: function(el_id) {
                        this.hide_panels();
                        $(el_id).show(300);
                    }
                }
                
            });
        })(jQuery);
    
    </script>
	
	
	<!--Start scripts for the sticky notes stuff-->
    <script type="text/javascript" src="scripts/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.stickynotes.js"></script>
	<!--End Scripts for the stikey notes stuff -->
	
	
	
</head>
<body>
<div id="container">
    <div id="stage" class="stage">
        <div id="tap" class="stage"></div>
        <div id="bg" class="stage"></div>
        <div id="clouds" class="stage"></div>
        <div id="hill2" class="stage"></div>
        <div id="hill1" class="stage"></div>
        <div id="balloons" class="stage"></div>
        <div id="logo">Spritely</div>
    </div>
    <div id="bird"></div>
    
    <div id="mainContent">
       
        <div id="panels">
           
            <p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
       
	
        <div id="notes" style="width:800px;height:500px;">
        
		<script type="text/javascript" charset="utf-8">
			var edited = function(note) {
				alert("Edited note with id " + note.id + ", new text is: " + note.text);
			}
			var created = function(note) {
				alert("Created note with id " + note.id + ", text is: " + note.text);
			}
			
			var deleted = function(note) {
				alert("Deleted note with id " + note.id + ", text is: " + note.text);
			}
			
			var moved = function(note) {
				alert("Moved note with id " + note.id + ", text is: " + note.text);
			}	
			
			var resized = function(note) {
				alert("Resized note with id " + note.id + ", text is: " + note.text);
			}					
		
			jQuery(document).ready(function() {
				var options = {
					notes:[{"id":1,
					      "text":"Curtis Colly, edited with NotePadd++ hosted on asmallorange, I love the web!!!",
						  

						  "pos_x": 50,
						  "pos_y": 50,	
						  "width": 200,							
						  "height": 200,													
					    }]
					,resizable: true
					,controls: true 
					,editCallback: edited
					,createCallback: created
					,deleteCallback: deleted
					,moveCallback: moved					
					,resizeCallback: resized					
					
				};
				jQuery("#notes").stickyNotes(options);
				
				
			});
		</script>		
		    </div> <!--Closing notes div -->
		
	   </div> <!--Closing panels div -->   

<div class="roundedcornr_box_388177">
   <div class="roundedcornr_top_388177"><div></div></div>
      <div class="roundedcornr_content_388177">
        <p> My name is Curtis Colly. I love the field of Computer Science and look forward
		 to learning PHP and other related topics in this class. This page is hosted on asmallorange.
		 I started my editing with TextPad but ended up doing most
		 of it on NotePad++.
		 <br />
		 </p>
		 <a href="https://github.com/curtiscolly/DWA.git">Link to my GitHub Repository</a>
		 
      </div>
   <div class="roundedcornr_bottom_388177"><div></div></div>
</div>	   
     
	 
	 </div> <!--Closing main content div --> 

</body>
</html>
