<?php if (!isset($isNotLoggedIn)) { ?>
	<?php echo $form->create('Snippet')?>
		<?php echo $form->input('name')?>
		<?php echo $form->input('Revision.code', array('type' => 'textarea'))?>
	<?php echo $form->end('Add')?>
<?php } else { ?>
	<div class="centerMass"><a href="<?php echo $html->url('/accounts/login'); ?>">Click here</a> Login via GitHub.</div>
<?php } ?>