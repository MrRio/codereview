<?php

class Comment extends AppModel {
	
	var $belongsTo = array('Revision', 'Account');
	
}

?>