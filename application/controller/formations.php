<?php

class Formations extends Controller
{
    public function index()
    {
        $formations = $this->loadModel('formationsmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_formations = 5;
		$last_formations = 'Dernières formations';
		
        require HEAD;
		
			require INDEX_FORMATIONS;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_FORMATIONS;
				
				require LAST_FORMATIONS;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function read($name_id = false)
    {
        $formations = $this->loadModel('formationsmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_formations = 5;
		$last_formations = 'Dernières formations';
		
		require HEAD;
		
			if ($formations->getOneFormation($name_id) == true) {
				require READ_FORMATIONS;
			} else {
				require INDEX_FORMATIONS;
			}
			
			require ASIDE_TOP;
			
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require LAST_FORMATIONS;
				require BACK_FORMATIONS;
				
				require LOGOUT_ADMINS;
			
			require ASIDE_BOT;
		
		require FOOT;
    }
	
    public function page($id_page = false)
    {
        $formations = $this->loadModel('formationsmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$nb_formations = 5;
		$last_formations = 'Dernières formations';
		
        require HEAD;
		
			require INDEX_FORMATIONS;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_FORMATIONS;
				
				require LAST_FORMATIONS;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function add()
    {
		if ($this->isAdmin() == true) {
			require HEAD;
			
				require ADD_FORMATIONS;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }

    public function edit($name_id)
    {
		if ($this->isAdmin() == true) {
			$formations = $this->loadModel('formationsmodel');
			$formation = $formations->getOneFormation($name_id);
			
			require HEAD;
			
				require EDIT_FORMATIONS;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }

    public function addFormation()
    {
        if (isset($_POST['addFormation'], $_FILES['upload']['tmp_name'])) {
			if ($this->isAdmin() == true) {
				$formations = $this->loadModel('formationsmodel');
				if ($formations->getOneFormation($this->transformUrl($_POST['title'])) != true) {
					if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'formations') == true) {
						$formations->addFormation($_POST['title'], $_POST['body'], date("Y-m-d H:i:s"), NULL, $_SESSION['admin']['id'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
					}
				}
			}
		}

        header('location: ' . URL . 'formations');
    }

    public function editFormation($name_id)
    {
        if (isset($_POST['editFormation'])) {
			if ($this->isAdmin() == true) {
				$formations = $this->loadModel('formationsmodel');
				$formation = $formations->getOneFormation($name_id);
				if (($this->transformUrl($_POST['title']) == $name_id && $formations->getOneFormation($this->transformUrl($_POST['title'])) == true) OR ($this->transformUrl($_POST['title']) != $name_id && $formations->getOneFormation($this->transformUrl($_POST['title'])) != true)) {
					if(file_exists($_FILES['upload']['tmp_name'])) {
						$this->unlinkImg($formation->name_id, $formation->type_file, 'formations');
						if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'formations') == true) {
							$formations->editFormation($formation->id, $_POST['title'], $_POST['body'], $formation->created, date("Y-m-d H:i:s"), $formation->admin_id, $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
						}
					} else {
						$this->renameImg($formation->name_id, $this->transformUrl($_POST['title']), $formation->type_file, 'formations');
						$formations->editFormation($formation->id, $_POST['title'], $_POST['body'], $formation->created, date("Y-m-d H:i:s"), $formation->admin_id, $formation->type_file, $this->transformUrl($_POST['title']));
					}
				}
			}
		}

        header('location: ' . URL . 'formations');
    }

    public function deleteFormation($name_id)
    {
        if (isset($name_id)) {
			if ($this->isAdmin() == true) {
				$formations = $this->loadModel('formationsmodel');
				$this->unlinkImg($name_id, $formations->getOneFormation($name_id)->type_file, 'formations');
				$formations->deleteFormation($name_id);
			}
        }

        header('location: ' . URL . 'formations');
    }
}
