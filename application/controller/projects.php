<?php

class Projects extends Controller
{
    public function index()
    {
        $projects = $this->loadModel('projectsmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_projects = 5;
		$last_projects = 'Derniers projets';
		
        require HEAD;
		
			require INDEX_PROJECTS;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_PROJECTS;
				
				require LAST_PROJECTS;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function read($name_id = false)
    {
        $projects = $this->loadModel('projectsmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_projects = 5;
		$last_projects = 'Derniers projets';
		
		require HEAD;
		
			if ($projects->getOneProject($name_id) == true) {
				require READ_PROJECTS;
			} else {
				require INDEX_PROJECTS;
			}
			
			require ASIDE_TOP;
			
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require LAST_PROJECTS;
				require BACK_PROJECTS;
				
				require LOGOUT_ADMINS;
			
			require ASIDE_BOT;
		
		require FOOT;
    }
	
    public function page($id_page = false)
    {
        $projects = $this->loadModel('projectsmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$nb_projects = 5;
		$last_projects = 'Derniers projets';
		
        require HEAD;
		
			require INDEX_PROJECTS;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_PROJECTS;
				
				require LAST_PROJECTS;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function add()
    {
		if ($this->isAdmin() == true) {
			require HEAD;
			
				require ADD_PROJECTS;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }

    public function edit($name_id)
    {
		if ($this->isAdmin() == true) {
			$projects = $this->loadModel('projectsmodel');
			$project = $projects->getOneProject($name_id);
			
			require HEAD;
			
				require EDIT_PROJECTS;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }

    public function addProject()
    {
        if (isset($_POST['addProject'], $_FILES['upload']['tmp_name'])) {
			if ($this->isAdmin() == true) {
				$projects = $this->loadModel('projectsmodel');
				if ($projects->getOneProject($this->transformUrl($_POST['title'])) != true) {
					if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'projects') == true) {
						$projects->addProject($_POST['title'], $_POST['body'], date("Y-m-d H:i:s"), NULL, $_SESSION['admin']['id'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
					}
				}
			}
		}

        header('location: ' . URL . 'projects');
    }

    public function editProject($name_id)
    {
        if (isset($_POST['editProject'])) {
			if ($this->isAdmin() == true) {
				$projects = $this->loadModel('projectsmodel');
				$project = $projects->getOneProject($name_id);
				if (($this->transformUrl($_POST['title']) == $name_id && $projects->getOneProject($this->transformUrl($_POST['title'])) == true) OR ($this->transformUrl($_POST['title']) != $name_id && $projects->getOneProject($this->transformUrl($_POST['title'])) != true)) {
					if(file_exists($_FILES['upload']['tmp_name'])) {
						$this->unlinkImg($project->name_id, $project->type_file, 'projects');
						if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'projects') == true) {
							$projects->editProject($project->id, $_POST['title'], $_POST['body'], $project->created, date("Y-m-d H:i:s"), $project->admin_id, $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
						}
					} else {
						$this->renameImg($project->name_id, $this->transformUrl($_POST['title']), $project->type_file, 'projects');
						$projects->editProject($project->id, $_POST['title'], $_POST['body'], $project->created, date("Y-m-d H:i:s"), $project->admin_id, $project->type_file, $this->transformUrl($_POST['title']));
					}
				}
			}
		}

        header('location: ' . URL . 'projects');
    }

    public function deleteProject($name_id)
    {
        if (isset($name_id)) {
			if ($this->isAdmin() == true) {
				$projects = $this->loadModel('projectsmodel');
				$this->unlinkImg($name_id, $projects->getOneProject($name_id)->type_file, 'projects');
				$projects->deleteProject($name_id);
			}
        }

        header('location: ' . URL . 'projects');
    }
}
