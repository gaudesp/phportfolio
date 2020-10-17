<?php

class Admins extends Controller
{
    public function index()
    {
		if ($this->isAdmin() == false) {
			$admins = $this->loadModel('adminsmodel');
			$alert_admins = null;
			
			require HEAD;
			
				require INDEX_ADMINS;
				
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }
	
    public function logIn()
    {
		if (isset($_POST['logIn']) && $this->isAdmin() == false) {
			$admins = $this->loadModel('adminsmodel');
			$alert_admins = null;
			
			if($admins->getLogAdmin($_POST['username']) == true) {
				if($admins->getLogAdmin($_POST['username'])->password == $this->hashPassword($_POST['password'])) {
					$_SESSION['admin']['id'] = $admins->getLogAdmin($_POST['username'])->id;
					$_SESSION['admin']['access'] = true;
					$alert_admins = $this->alertBox('Connexion réussie', 'success');
				} else {
					$alert_admins = $this->alertBox('Identifiants incorrects', 'danger');
				}
			} else {
				$alert_admins = $this->alertBox('Identifiants incorrects', 'danger');
			}
			
			require HEAD;
			
				require INDEX_ADMINS;
				
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }
	
    public function logOut()
    {
		if ($this->isAdmin() == true) {
			session_destroy();
			header('Location: '.URL);
		} else {
			$this->loadController('home');
		}
    }
}
