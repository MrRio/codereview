<?php

class SnippetsController extends AppController {
	
	
	function index() {
		
		$this->set('snippets', $this->Snippet->find('all'));
		
	}
	
	function view($id) {
		$this->set('snippet', $this->Snippet->read(null, $id));
		
		if (isset($this->data)) {
			$currentUser = $this->Session->read('CurrentUser');
			if ($currentUser === NULL) {
				$this->Session->setFlash('Sorry but you need to be logged in to comment on a snippet', 'error');
			} else {
				$insertData = $this->data;
				$insertData['Comment']['account_id'] = $currentUser['Account']['id'];
				if($this->Snippet->Comment->save($insertData)) {
		 			$this->redirect($this->referer() . '#comment-' . $this->Snippet->Comment->getID());
		    	} else {
					$this->Session->setFlash('Sorry, there was a problem', 'error');
				}
			}
		}
	}
	
	function vote($revisionId) {
		
		$this->Revision->read(null,$revisionId);
		$voteCount = $this->Revision->field('vote_count');
		$voteCount++;
		$this->Revision->set('vote_count',$voteCount);
		$this->Revision-save();
	}
 	
	function revision($snippetId) {
		
		$revision = $this->data;
		$revision['Revision']['hash'] = md5($revision['Revision']['code']);
		$revision = $this->Snippet->Revision->save($revision);
		if (!$revision) {
			$this->Session->setFlash('That code is already in our database!', 'error');
		}	else {
			$this->redirect('/snippets/view/' . $snippetId);
		}
		
	}
	
	function add() {
		$currentUser = $this->Session->read('CurrentUser');
			
		if ($currentUser === NULL) {
			$this->Session->setFlash('Sorry but you need to be logged in to add a snippet', 'error');
			$this->set('isNotLoggedIn', true);
			return;
		}
		
		if(isset($this->data)) {
			$snippetData = $this->data;
			$snippetData['Snippet']['account_id'] = $currentUser['Account']['id'];
			$snippetData['Snippet']['username'] = $currentUser['Account']['username'];
			if($this->Snippet->save($snippetData)) {
				$snippet_id = $this->Snippet->getID();
				$revision = array('Revision' => array('code' => $this->data['Revision']['code'], 'snippet_id' => $snippet_id, 'hash' => md5($this->data['Revision']['code']) ));
				if(!$this->Snippet->Revision->save($revision)) {
					$this->Session->setFlash('That code is already in our database!', 'error');
				} else {
					$this->redirect('/snippets/view/' . $snippet_id);
				}
			} else {
				$this->Session->setFlash('Sorry, please try again.');
			}
		}
		
	}
	
}