<?php

class Config extends Controller
{
	public function index()
	{
		$this->loadController('home');
	}
	
    public function edit()
    {
		if ($this->isAdmin() == true) {
			$config = $this->loadModel('configmodel');
			
			require HEAD;
			
			require EDIT_CONFIG;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }
	
	public function editConfig()
	{
		if(isset($_POST['editConfig'])) {
			if ($this->isAdmin() == true) {
				$config = $this->loadModel('configmodel');
				$config->editConfig($_POST['cv'], $_POST['linkedin'], $_POST['youtube'], $_POST['about']);
			}
		}
		
        header('location: ' . URL . 'config/edit');
	}
}
