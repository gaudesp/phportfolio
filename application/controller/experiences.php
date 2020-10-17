<?php

class Experiences extends Controller
{
    public function index()
    {
        $experiences = $this->loadModel('experiencesmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_experiences = 5;
		$last_experiences = 'Dernières expériences';
		$alert_experience = null;
		
        require HEAD;
		
			require INDEX_EXPERIENCES;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_EXPERIENCES;
				
				require LAST_EXPERIENCES;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function read($name_id = false)
    {
        $experiences = $this->loadModel('experiencesmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_experiences = 5;
		$last_experiences = 'Dernières expériences';
		$alert_experience = null;
		
		require HEAD;
		
			if ($experiences->getOneExperience($name_id) == true) {
				require READ_EXPERIENCES;
			} else {
				require INDEX_EXPERIENCES;
			}
			
			require ASIDE_TOP;
			
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require LAST_EXPERIENCES;
				require BACK_EXPERIENCES;
				
				require LOGOUT_ADMINS;
			
			require ASIDE_BOT;
		
		require FOOT;
    }
	
    public function page($id_page = false)
    {
        $experiences = $this->loadModel('experiencesmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$nb_experiences = 5;
		$last_experiences = 'Dernières expériences';
		$alert_experience = null;
		
        require HEAD;
		
			require INDEX_EXPERIENCES;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_EXPERIENCES;
				
				require LAST_EXPERIENCES;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function add()
    {
		if ($this->isAdmin() == true) {
			$alert_experience = null;
			
			require HEAD;
			
				require ADD_EXPERIENCES;
			
			require FOOT;
			
		} else {
			$this->index();
		}
    }

    public function edit($name_id)
    {
		if ($this->isAdmin() == true) {
			$experiences = $this->loadModel('experiencesmodel');
			
			$experience = $experiences->getOneExperience($name_id);
			$alert_experience = null;
			
			require HEAD;
			
				require EDIT_EXPERIENCES;
			
			require FOOT;
			
		} else {
			$this->index();
		}
    }

    public function addExperience()
    {
        if ($this->isAdmin() == true) {
			if(isset($_POST['addExperience'], $_FILES['upload']['tmp_name']) && !empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['image'])) {
				$experiences = $this->loadModel('experiencesmodel');
				
				$alert_experience = null;
				
				if ($experiences->getOneExperience($this->transformUrl($_POST['title'])) != true) {
					if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'experiences') == true) {
						$experiences->addExperience($_POST['title'], $_POST['body'], date("Y-m-d H:i:s"), NULL, $_SESSION['admin']['id'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
						
						$alert_experience = $this->alertBox('L\'expérience a bien été ajoutée', 'success');
					} else {
						$alert_experience = $this->alertBox('L\'image choisie n\'est pas conforme', 'danger');
					}
				} else {
					$alert_experience = $this->alertBox('Le titre choisi a déjà été utilisé', 'danger');
				}
			} else {
				$alert_experience = $this->alertBox('Vous devez remplir tout les champs', 'danger');
			}
			
			require HEAD;
			
				require ADD_EXPERIENCES;
			
			require FOOT;
			
		} else {
			$this->index();
		}
    }

    public function editExperience($name_id)
    {
        if ($this->isAdmin() == true) {
			if(isset($_POST['editExperience']) && !empty($_POST['title']) && !empty($_POST['body'])) {
				$experiences = $this->loadModel('experiencesmodel');
				
				$alert_experience = null;
				$experience = $experiences->getOneExperience($name_id);
				
				if (($this->transformUrl($_POST['title']) == $name_id && $experiences->getOneExperience($this->transformUrl($_POST['title'])) == true) OR ($this->transformUrl($_POST['title']) != $name_id && $experiences->getOneExperience($this->transformUrl($_POST['title'])) != true)) {
					if(file_exists($_FILES['upload']['tmp_name'])) {
						$this->unlinkImg($experience->name_id, $experience->type_file, 'experiences');
						if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'experiences') == true) {
							$experiences->editExperience($experience->id, $_POST['title'], $_POST['body'], $experience->created, date("Y-m-d H:i:s"), $experience->admin_id, $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
							$alert_experience = $this->alertBox('L\'expérience a bien été modifiée', 'success');
						} else {
							$alert_experience = $this->alertBox('L\'image choisie n\'est pas conforme', 'danger');
						}
					} else {
						$this->renameImg($experience->name_id, $this->transformUrl($_POST['title']), $experience->type_file, 'experiences');
						$experiences->editExperience($experience->id, $_POST['title'], $_POST['body'], $experience->created, date("Y-m-d H:i:s"), $experience->admin_id, $experience->type_file, $this->transformUrl($_POST['title']));
						$alert_experience = $this->alertBox('L\'expérience a bien été modifiée', 'success');
					}
				} else {
					$alert_experience = $this->alertBox('Le titre choisi a déjà été utilisé', 'danger');
				}
			} else {
				$alert_experience = $this->alertBox('Vous devez remplir tout les champs', 'danger');
			}
			
			require HEAD;
			
				require EDIT_EXPERIENCES;
			
			require FOOT;
			
		} else {
			$this->index();
		}
    }

    public function deleteExperience($name_id)
    {
		if ($this->isAdmin() == true && isset($name_id)) {
			$experiences = $this->loadModel('experiencesmodel');
			
			$alert_experience = null;
			$this->unlinkImg($name_id, $experiences->getOneExperience($name_id)->type_file, 'experiences');
			$experiences->deleteExperience($name_id);
			$alert_experience = $this->alertBox('L\'expérience a bien été supprimée', 'success');
			
			require HEAD;
			
				require INDEX_EXPERIENCES;
			
				require ASIDE_TOP;
			
					require CV;
					require LINKEDIN;
					require YOUTUBE;
					
					require PAGINATION_EXPERIENCES;
					
					require LAST_EXPERIENCES;
					
					require LOGOUT_ADMINS;
			
				require ASIDE_BOT;
			
			require FOOT;
			
		} else {
			$this->loadController('home');
		}
    }
}
