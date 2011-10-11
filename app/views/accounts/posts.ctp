<h1>All snippets posted by <?php echo $username; ?></h1>

<?php foreach($snippets as $snippet) { ?>
	<h2><?php echo $snippet['Snippet']['name']; ?> Posted on <?php echo date("F j, Y, g:i a", strtotime($snippet['Snippet']['timestamp'])); ?></h2>
	
	<?php
		$lines = explode(PHP_EOL, $snippet['Revision'][0]['code']);
	?>
	<pre><?php for ($i = 0; $i < 5; $i++) { 
			if (!isset($lines[$i])) { break; }
			
			$line = htmlentities($lines[$i]);
			$line = str_replace(' ','&nbsp;', $line);
			$line = str_replace('\t','&nbsp;&nbsp;&nbsp;&nbsp;', $line);
				?><em><?php echo $i+1; ?>.</em><span id="line-<?php echo $i+1;; ?>"><?php echo $line; ?></span><?php 
		} 
		if (sizeof($lines) > 5) {
			?><span>...</span><?php
		}
		?></pre>
		<span><a href="<?php echo $html->url('/snippets/view/'.$snippet['Snippet']['id']); ?>">See view post</a></span>
<?php }?>