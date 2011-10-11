
<ul>
	<?php foreach($snippets as $snippet) { ?>
		<li><?php echo $html->link($snippet['Snippet']['name'], '/snippets/view/' . $snippet['Snippet']['id'])?></li>
	<?php } ?>
</ul?>