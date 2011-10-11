<?php


class Snippet extends AppModel {
	
	var $hasMany = array('Revision','Comment');
	var $belongsTo = array('Account');
	
}