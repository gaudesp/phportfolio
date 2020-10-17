<?php

class Articles extends Controller
{
    public function index()
    {
        $articles = $this->loadModel('articlesmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_articles = 5;
		$last_articles = 'Derniers articles';
		
        require HEAD;
		
			require INDEX_ARTICLES;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_ARTICLES;
				
				require LAST_ARTICLES;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function read($name_id = false)
    {
        $articles = $this->loadModel('articlesmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$id_page = null;
		$nb_articles = 5;
		$last_articles = 'Derniers articles';
		
		require HEAD;
		
			if ($articles->getOneArticle($name_id) == true) {
				require READ_ARTICLES;
			} else {
				require INDEX_ARTICLES;
			}
			
			require ASIDE_TOP;
			
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require LAST_ARTICLES;
				require BACK_ARTICLES;
				
				require LOGOUT_ADMINS;
			
			require ASIDE_BOT;
		
		require FOOT;
    }
	
    public function page($id_page = false)
    {
        $articles = $this->loadModel('articlesmodel');
		$admins = $this->loadModel('adminsmodel');
		$config = $this->loadModel('configmodel');
		
		$nb_articles = 5;
		$last_articles = 'Derniers articles';
		
        require HEAD;
		
			require INDEX_ARTICLES;
		
			require ASIDE_TOP;
		
				require CV;
				require LINKEDIN;
				require YOUTUBE;
				
				require PAGINATION_ARTICLES;
				
				require LAST_ARTICLES;
				
				require LOGOUT_ADMINS;
		
			require ASIDE_BOT;
		
        require FOOT;
    }

    public function add()
    {
		if ($this->isAdmin() == true) {
			require HEAD;
			
				require ADD_ARTICLES;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }

    public function edit($name_id)
    {
		if ($this->isAdmin() == true) {
			$articles = $this->loadModel('articlesmodel');
			$article = $articles->getOneArticle($name_id);
			
			require HEAD;
			
				require EDIT_ARTICLES;
			
			require FOOT;
		} else {
			$this->loadController('home');
		}
    }

    public function addArticle()
    {
        if (isset($_POST['addArticle'], $_FILES['upload']['tmp_name'])) {
			if ($this->isAdmin() == true) {
				$articles = $this->loadModel('articlesmodel');
				if ($articles->getOneArticle($this->transformUrl($_POST['title'])) != true) {
					if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'articles') == true) {
						$articles->addArticle($_POST['title'], $_POST['body'], date("Y-m-d H:i:s"), NULL, $_SESSION['admin']['id'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
					}
				}
			}
		}

        header('location: ' . URL . 'articles');
    }

    public function editArticle($name_id)
    {
        if (isset($_POST['editArticle'])) {
			if ($this->isAdmin() == true) {
				$articles = $this->loadModel('articlesmodel');
				$article = $articles->getOneArticle($name_id);
				if (($this->transformUrl($_POST['title']) == $name_id && $articles->getOneArticle($this->transformUrl($_POST['title'])) == true) OR ($this->transformUrl($_POST['title']) != $name_id && $articles->getOneArticle($this->transformUrl($_POST['title'])) != true)) {
					if(file_exists($_FILES['upload']['tmp_name'])) {
						$this->unlinkImg($article->name_id, $article->type_file, 'articles');
						if ($this->uploadFile($_FILES['upload']['tmp_name'], $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']), 'articles') == true) {
							$articles->editArticle($article->id, $_POST['title'], $_POST['body'], $article->created, date("Y-m-d H:i:s"), $article->admin_id, $this->typeFile($_FILES['upload']['type']), $this->transformUrl($_POST['title']));
						}
					} else {
						$this->renameImg($article->name_id, $this->transformUrl($_POST['title']), $article->type_file, 'articles');
						$articles->editArticle($article->id, $_POST['title'], $_POST['body'], $article->created, date("Y-m-d H:i:s"), $article->admin_id, $article->type_file, $this->transformUrl($_POST['title']));
					}
				}
			}
		}

        header('location: ' . URL . 'articles');
    }

    public function deleteArticle($name_id)
    {
        if (isset($name_id)) {
			if ($this->isAdmin() == true) {
				$articles = $this->loadModel('articlesmodel');
				$this->unlinkImg($name_id, $articles->getOneArticle($name_id)->type_file, 'articles');
				$articles->deleteArticle($name_id);
			}
        }

        header('location: ' . URL . 'articles');
    }
}
