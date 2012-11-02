<div class="left-of-page">&nbsp;</div> <!--Need this to make sure the middle boxes stay in the middle -->
<div class="middle-of-page">
	<? foreach($posts as $post): ?>

		<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
		<?=$post['content']?>
		<a href='/posts/deletepost/<?=$post['post_id']?>'> Delete Post</a>
                <hr />
		<br><br>

	<? endforeach; ?>
</div>