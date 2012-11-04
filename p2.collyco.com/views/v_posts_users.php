<div class="left-of-page">&nbsp;</div> <!--Need this to make sure the middle boxes stay in the middle -->
<div class="middle-of-page">

	<form method='POST' action='/posts/p_follow'>

		<? foreach($users as $user): ?>

			<!-- Print this user's name -->
			<?=$user['first_name']?> <?=$user['last_name']?>

			<!-- If there exists a connection with this user, show a unfollow link -->
			<? if(isset($connections[$user['user_id']])): ?>
				<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
				<a href='/posts/followers/<?=$user['user_id']?>'>View this user's posts</a> <!-- make this a link to view the profile of this user -->

			<!-- Otherwise, show the follow link -->
			<? else: ?>
				<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
			<? endif; ?>

			<br><br>

		<? endforeach; ?>

	</form>
</div>