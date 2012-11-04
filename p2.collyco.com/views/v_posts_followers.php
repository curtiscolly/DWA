<div class="left-of-page">&nbsp;</div> <!--Need this to make sure the middle boxes stay in the middle -->
<div class="middle-of-page">
   <? if ($connections_string == ''){  ?>
      <p> <? echo  'This user does not have any posts'  ?> </p>
      
   <? } else { ?>
   
	<? foreach($posts as $post): ?>

		<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
		<?=$post['content']?>
                <hr />
		<br><br>

	<? endforeach; ?>
   <? } ?>

</div>