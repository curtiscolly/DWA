<?
	   
	   foreach($bags as $bag){
	      
	   	$bag_id = $bag['bag_group_id'];
		$show_items_in_bag_link = "/items/show_items_in_bag/".$bag_id;  	
	   	
	   	echo '<br>';	   	
	   	echo '<a href='.$show_items_in_bag_link.'><img src="/images/bag.png" alt="bag" class="bag">
	   	     </a>';	   	
	   	echo '<br>'; 
	   		      
	   }

?>