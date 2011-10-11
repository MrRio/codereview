<?php if (isset($isNotLoggedIn)) { ?>
	<div class="centerMass"><a href="<?php echo $html->url('/accounts/login'); ?>">Click here</a> Login via GitHub.</div>
<?php } else { ?>
	<ul>
		<li><a href="<?php echo $html->url('/accounts/posts/'.$username); ?>">View all your snippets</a></li>
	</ul>
<?php  } ?>