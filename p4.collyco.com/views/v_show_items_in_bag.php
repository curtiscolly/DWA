<form method="GET" action="http://www.amazon.com/gp/aws/cart/add.html">

   <input type="hidden" name="AssociateTag" value="eventfish-20"/>
   <input type="hidden" name="SubscriptionId" value="AKIAJBNE46V6KNJ3RU2A"/>
   <?  
       # this number is simply going to be an iterator because I 
       # am going to use a foreach loop for the items below
       $count = 1;
       

        
   	
       foreach($bags as $bag){
       
       
		$ASIN = "ASIN".'.'.$count;
		$ASIN_quotes = "'$ASIN'";

		$Quantity = "Quantity".'.'.$count;
		$Quantity_quotes = "'$Quantity'";
		
		$item_id = $bag['item_id'];
		$item_id_quotes = "'$item_id'";
		
		$value_id = $bag['number_of_items'];
		$value_id_quotes = "'$value_id'";
		
		

	       echo'
	       <input type="hidden" name='.$ASIN_quotes.' value='.$item_id_quotes.'/>
	       <input type="hidden" name='.$Quantity_quotes.'value='.$value_id_quotes.'/>
	       ';
	       $count++;    
      
       }
   
   ?>
<input type="image" name="add" id="buybutton" value="Buy from Amazon.com" border="0" alt="Buy from Amazon.com" src="http://images.amazon.com/images/G/01/associates/add-to-cart.gif">
</form>
<br><br>

<?	foreach($bags as $bag){
	$item_link = '#';
	$item_id = $bag['item_id'];

  	echo 
  	'<a href='.$item_link.'>
  	<img border="0" src="http://ws.assoc-amazon.com/widgets/q?_encoding=UTF8&ASIN='.$item_id.'&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=eventfish-20" ></a>
  	<img src="http://www.assoc-amazon.com/e/ir?t=eventfish-20&l=as2&o=1&a=B00542LUF8" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />'
        ; // end echo 
        echo '<p>'.$bag['number_of_items']. ' in this bag</p>';
		    
	}
?>
