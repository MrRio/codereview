<?php echo $form->create('Snippet')?>
	<?php echo $form->input('name')?>
	<?php echo $form->input('code', array('type' => 'textarea'))?>
<?php echo $form->end('Add')?>