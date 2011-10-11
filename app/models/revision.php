<?php

class Revision extends AppModel {
	
	var $belongsTo = array('Snippet');
	var $hasMany = array('Comment');
	
}
