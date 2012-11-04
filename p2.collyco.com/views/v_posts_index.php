<div class="left-of-page">&nbsp;</div> <!--Need this to make sure the middle boxes stay in the middle -->
<div class="middle-of-page">
   <? if ($connections_string == ''){  ?>
      <p> <? echo  'You do not have any posts! If you want to see your own posts you have to follow yourself'  ?> </p>
      
   <? } else { ?>
   
	<? foreach($posts as $post): ?>

		<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
		<?=$post['content']?>
		<a href='/posts/deletepost/<?=$post['post_id']?>'> Delete Post</a>
                <hr />
		<br><br>

	<? endforeach; ?>
   <? } ?>

</div>