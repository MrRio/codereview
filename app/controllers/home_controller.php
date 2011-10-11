<?php

class HomeController extends AppController {
	
	function index() {
		
		$this->set('snippets', $this->Snippet->find('all'));
		
	}
	
}