<? 

  if(empty($items)){
   echo 'There are NO items here';
  
  }
  else{
  
  
  foreach($items as $item)
     {
  	
  	
  	$item_id = $item['item_id'];
  	$add_item_link = "/items/add_item/".$item_id;
  	$remove_item_link = "/items/remove_one_item/".$item_id;
  	
  	
  	echo '$'.$item['price'];
  	
  	// This will only work if I break the code lines in some places
  	echo 
  	'<a href='.$add_item_link.'>
  	<img border="0" src="http://ws.assoc-amazon.com/widgets/q?_encoding=UTF8&ASIN='.$item_id.'&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=eventfish-20" ></a>
  	<img src="http://www.assoc-amazon.com/e/ir?t=eventfish-20&l=as2&o=1&a=B00542LUF8" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />'
        ; // end echo 
  
        echo
        '<FORM METHOD="LINK" ACTION='.$add_item_link.'>
	 <INPUT TYPE="submit" VALUE="Add one of these to your bag" onclick="item_add_alert()">
	 </FORM>';
	 
        echo
        '<FORM METHOD="LINK" ACTION='.$remove_item_link.'>
	 <INPUT TYPE="submit" VALUE="Remove one of these from your bag">
	 </FORM>';
	 
       
     }
     
     
   }
	    

?> 
