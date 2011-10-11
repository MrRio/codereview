<?php

class AccountsController extends AppController {
	
	var $uses = array('Account', 'Curl','Snippet');
	
	
	public function index() {
		$currentUser = $this->Session->read('CurrentUser');
		if ($currentUser === NULL) {
			$this->Session->setFlash("You need to login before you can view account settings and details",'error');
			$this->set('isNotLoggedIn', true);
			return;
		}
		$this->set('username', $currentUser['Account']['username']);	
	}
	
	public function login() {
		$this->Session->write('LoginRedirect', $this->referer());
		
		$githubClientID = Configure::read('GitHub.ClientID');
		
		$this->redirect('https://github.com/login/oauth/authorize/?client_id='.urlencode($githubClientID));
		
	}
	
	public function logout() {
		$this->Session->write('CurrentUser', NULL);
		$this->Session->setFlash("Just logged you out.","success");
		$this->redirect($this->referer());
	}
	
	public function callback() {
		
		$githubClientID = Configure::read('GitHub.ClientID');
		$githubClientSecret = Configure::read('GitHub.ClientSecret');
		$this->Curl->url = 'https://github.com/login/oauth/access_token';
		$this->Curl->post = true;
		$this->Curl->postFieldsArray = array('client_id' => $githubClientID, 
											 'client_secret' => $githubClientSecret, 
											 'code' => $_GET['code']);
		$accessToken = $this->Curl->execute();
		
		$accountData = $this->Account->find('first', 
										array('conditions' => array('access_token' => $accessToken))
									);									
		
		if (empty($accountData)) {
			$this->Curl->url = 'https://api.github.com/user?'.$accessToken;
			$this->Curl->post = false;
			$this->Curl->postFieldsArray = null;
			$userData = json_decode($this->Curl->execute());
			if (!isset($userData->login)) {
				$this->Session->setFlash("Account couldn't be created due to bad GitHub Data","error");
				$this->redirect('/Accounts/LoginFail');
			}
			$insertData = array('access_token' => $accessToken,
								'username' => $userData->login,
								'name' => $userData->name);
			$accountData = $this->Account->save($insertData);
			if (!$accountData) {
				$this->Session->setFlash("Account couldn't be created in the database","error");
				$this->redirect('/Accounts/LoginFail');
				return;
			} 
			$accountData['Account']['id'] = $this->Account->getLastInsertID();
		}
		
		$this->Session->write('CurrentUser', $accountData);
		$this->Session->setFlash("You've successfully logged in.", "success");
		$redirectUrl = $this->Session->read('LoginRedirect');
		$this->Session->write('LoginRedirect',null);
		$this->redirect($redirectUrl);
		
	}
	
	public function posts($username) {
		
		
		$snippets = $this->Snippet->find('all',	array(
													'conditions' => array('Account.username' => $username))
														);
		$this->set('snippets', $snippets);
		$this->set('username', $username);
	}
	
}