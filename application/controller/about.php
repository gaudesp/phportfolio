<?php

class About extends Controller
{
    public function index()
    {
        $articles = $this->loadModel('articlesmodel');
        $formations = $this->loadModel('formationsmodel');
        $experiences = $this->loadModel('experiencesmodel');
        $projects = $this->loadModel('projectsmodel');
		$config = $this->loadModel('configmodel');
		
		$nb_articles = 1;
		$nb_formations = 1;
		$nb_experiences = 1;
		$nb_projects = 1;
		
		$last_articles = 'Dernier article';
		$last_formations = 'Dernière formation';
		$last_experiences = 'Dernière expérience';
		$last_projects = 'Dernier projet';
		
        require HEAD;
		
			require INDEX_ABOUT;
			
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require LAST_ARTICLES;
				require BACK_ARTICLES;
				
				require LAST_FORMATIONS;
				require BACK_FORMATIONS;
				
				require LAST_EXPERIENCES;
				require BACK_EXPERIENCES;
				
				require LAST_PROJECTS;
				require BACK_PROJECTS;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }
}
