<?php

class SnippetsController extends AppController {
	
	
	function index() {
		
		$this->set('snippets', $this->Snippet->find('all'));
		
	}
	
	function view($id) {
		$this->set('snippet', $this->Snippet->read(null, $id));
	}
	
	function add() {
		
		if(isset($this->data)) {
			if($this->Snippet->save($this->data)) {
				$snippet_id = $this->Snippet->getID();
				$revision = array('Revision' => array('code' => $this->data['Snippet']['code'], 'snippet_id' => $snippet_id));
				$this->Snippet->Revision->save($revision);
				$this->redirect('/snippets/view/' . $snippet_id);
			} else {
				$this->Session->setFlash('Sorry, please try again.');
			}
		}
		
	}
	
}