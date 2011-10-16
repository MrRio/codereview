<h1><?php echo $snippet['Snippet']['name']?></h1>
<h2>Posted by <a href="<?php echo $html->url('/accounts/posts/'.$snippet['Account']['username']); ?>"><?php echo $snippet['Account']['username'];?></a> on
			 <?php echo date("F j, Y, g:i a", strtotime($snippet['Snippet']['timestamp'])); ?></h2>

<?php foreach($snippet['Revision'] as $revision) { ?>
	<pre class="code"><?php $lines = explode(PHP_EOL, $revision['code']); 
		foreach ($lines as  $number => $line) { 
			$number++;
			//$line = htmlentities($line);
			$line = str_replace('\t','&nbsp;&nbsp;&nbsp;&nbsp;', $line);
		?><em><?php echo $number; ?>.</em><span id="line-<?php echo $number; ?>"><?php echo $line; ?></span><?php } ?></pre>
<?php } ?>
<?php 
	$currentUser = $session->read('CurrentUser');
	if ($currentUser !== NULL) { 
		if ($currentUser['Account']['id'] === $snippet['Account']['id']) {
			?>
			<h2>Add A Revision</h2>
				<?php echo $form->create('Revision', array('url' => '/snippets/revision/'.$snippet['Snippet']['id'],'inputDefaults' => array('div' => 'fullSizeForm') )); ?>
					<?php echo $form->input('snippet_id', array('type' => 'hidden', 'value' => $snippet['Snippet']['id']))?>
					<?php echo $form->input('language', array('type' => 'hidden', 'value' => $snippet['Snippet']['language']))?>
					<?php echo $form->input('code', array('type' => 'textarea'))?>
				<?php echo $form->end('Add')?>
			<?php
		}
	?>
	
<h2>Add A Comment</h2>	
<?php echo $form->create('Comment', array('url' => '/snippets/view/' . $snippet['Snippet']['id'],'inputDefaults' => array('div' => 'fullSizeForm')))?>
	<?php echo $form->input('snippet_id', array('type' => 'hidden', 'value' => $snippet['Snippet']['id']))?>
	<?php echo $form->input('comment', array('type' => 'textarea'))?>
<?php echo $form->end('Add')?>
<?php } else { ?>
	<div class="centerMass"><a href="<?php echo $html->url('/accounts/login'); ?>">Click here</a> to login via GitHub to post a comment.</div>
<?php } ?>

<?php foreach($snippet['Comment'] as $comment) { ?>
	<a name="comment-<?php echo $comment['id']; ?>"></a>
	<div id="comment-container-<?php echo $comment['id']; ?>" class="row">
		<div class="span-one-third">
			<h3><a href="http://github.com/<?php echo $comment['username']; ?>"><?php echo $comment['username']; ?></a></h3>
			<span><?php echo date("F j, Y, g:i a", strtotime($comment['timestamp'])); ?></span>
		</div>
		<div class="span-two-thirds">
			<pre><?php echo htmlentities($comment['comment']); ?></pre>
		</div>
	</div>
<?php } ?>