<?php


class Snippet extends AppModel {
	
	var $hasMany = array('Revision');
	var $belongsTo = array('Account');
	
}