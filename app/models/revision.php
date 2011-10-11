<?php

class Revision extends AppModel {
	
	var $belongsTo = array('Snippet');
	var $validate = array('hash' => 
						     array('rule' => "isUnique",
							  'message' => "This revision already exists")
						 );
}
