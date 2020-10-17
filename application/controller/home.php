<?php

class Home extends Controller
{
    public function index()
    {
		$articles = $this->loadModel('articlesmodel');
		$admins = $this->loadModel('adminsmodel');
		$projects = $this->loadModel('projectsmodel');
		$experiences = $this->loadModel('experiencesmodel');
		$formations = $this->loadModel('formationsmodel');
		$config = $this->loadModel('configmodel');
		
        require HEAD;

        	require INDEX_HOME;

        require FOOT;
    }
}
