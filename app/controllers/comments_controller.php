<?php

class CommentsController extends AppController {
	
	public function index() {
		
	}
	
	public function add() {
		
		if (isset($this->data)) {
			if($this->Comment->save($this->data)) {
		 		$this->redirect($this->referer() . '#comment-' . $this->Comment->getID());
		    }
		}
		
	}

}