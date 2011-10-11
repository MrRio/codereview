<?php

class Comment extends AppModel {
	
	var $belongsTo = array('Revision', 'Account');
	var $validate = array('comment' =>
							array('rule' => 'notEmpty',
								  'message' => 'The comment cannot be empty')
								);
	
}

?>