<div class="col-md-8">
	<div class="jumbotron">
	  <h1 class="display-6">Bienvenue sur Gaudesp</h1>
	  <p class="lead">Mon site <b>personnel</b> et <b>professionnel</b></p>
	  <hr class="my-4">
	  <p>Vous trouverez sur ce site mon <b>CV</b>, mes <b>projets</b>, mes <b>formations</b>, mes <b>expériences</b>, ainsi que toutes les actualités concernant ma chaîne YouTube <b>Nox Studio</b> et moi-même.</p>
	  <p class="lead">
		<a class="btn btn-primary btn-lg" href="<?php echo URL.'about'; ?>" role="button">A propos de moi</a>
	  </p>
	</div>
	
	<h5 class="card-header">Dernières actualités</h5><br />
	
	<div class="row">
	
		<?php foreach ($articles->getLimitArticles(0, 2) as $article) { ?>
		<div class="col-lg-6 col-md-6 mb-4">
		  <div class="card h-100">
			<a href="<?php echo URL.'articles/read/'.$article->name_id; ?>" title="Lire la suite"><img class="card-img-top" src="<?php echo URL.'public/img/articles/upload/750x200/'.$article->name_id.'.'.$article->type_file; ?>" alt=""></a>
			<div class="card-body">
			  <h5 class="card-title">
				<a href="<?php echo URL.'articles/read/'.$article->name_id; ?>" title="Lire la suite"><?php echo $this->reduceString(30, $article->title); ?></a>
			  </h5>
			  <p class="card-text"><?php echo $this->bbCode($this->reduceString(120, $article->body)); ?></p>
			</div>
			<div class="card-footer">
			  <i class="left"><?php echo $this->dateDMY($article->created); ?></i> <b class="right"><?php echo $admins->getOneAdmin($article->admin_id)->username; ?></b>
			</div>
		  </div>
		</div>
		<?php } ?>
		
		<a class="btn btn-primary btn-block btn-margin" href="<?php echo URL.'articles'; ?>">Tout les articles</a>

	</div><br />
	
	<h5 class="card-header">Dernières formations</h5><br />
	
	<div class="row">
	
		<?php foreach ($formations->getLimitFormations(0, 3) as $formation) { ?>
		<div class="col-lg-4 col-md-6 mb-4">
		  <div class="card h-100">
			<a href="<?php echo URL.'formations/read/'.$formation->name_id; ?>" title="Lire la suite"><img class="card-img-top" src="<?php echo URL.'public/img/formations/upload/750x200/'.$formation->name_id.'.'.$formation->type_file; ?>" alt=""></a>
			<div class="card-body">
			  <h5 class="card-title">
				<a href="<?php echo URL.'formations/read/'.$formation->name_id; ?>" title="Lire la suite"><?php echo $this->reduceString(30, $formation->title); ?></a>
			  </h5>
			  <p class="card-text"><?php echo $this->bbCode($this->reduceString(60, $formation->body)); ?></p>
			</div>
			<div class="card-footer">
			  <i class="left"><?php echo $this->dateDMY($formation->created); ?></i> <b class="right"><?php echo $admins->getOneAdmin($formation->admin_id)->username; ?></b>
			</div>
		  </div>
		</div>
		<?php } ?>
		
		<a class="btn btn-primary btn-block btn-margin" href="<?php echo URL.'formations'; ?>">Toutes les formations</a>
		
	</div><br />

</div>

<div class="col-md-4">

<a href="<?php echo $config->getConfig('cv'); ?>" class="btn btn-primary btn-lg btn-block" target="_blank" title="Accéder à mon CV">Curriculum Vitae</a><br />
<a href="<?php echo $config->getConfig('linkedin'); ?>" class="btn btn-default btn-lg btn-block" target="_blank" title="Accéder à mon profil Linkedin"><img src="<?php echo URL.'public/img/home/linkedin.png'; ?>" /></a><br />
<a href="<?php echo $config->getConfig('youtube'); ?>" class="btn btn-default btn-lg btn-block" target="_blank" title="Accéder à ma chaîne YouTube Nox Studio"><img src="<?php echo URL.'public/img/home/youtube.png'; ?>" /></a>

  <div class="card my-4">
	<h5 class="card-header">Derniers projets</h5>
	<?php foreach ($projects->getLimitProjects(0, 3) as $project) { ?>
	<div class="media text-muted pt-3 border-bottom border-gray">
	  <img src="<?php echo URL.'public/img/projects/upload/60x60/'.$project->name_id.'.'.$project->type_file; ?>" alt="" class="mr-2 rounded-circle">
	  <div class="media-body pb-3 mb-0 small lh-125">
		<h6 class="d-block text-gray-dark"><a href="<?php echo URL.'projects/read/'.$project->name_id; ?>" title="Voir le projet"><?php echo $this->reduceString(15, $project->title); ?></a></h6>
		<p><?php echo $this->bbCode($this->reduceString(30, $project->body)); ?></p>
	  </div>
	</div>
	<?php } ?>
  </div>
  
  <a class="btn btn-secondary btn-block" href="<?php echo URL.'projects'; ?>">Tous les projets</a>
  
  <div class="card my-4">
	<h5 class="card-header">Dernières expériences</h5>
	<?php foreach ($experiences->getLimitExperiences(0, 3) as $experience) { ?>
	<div class="media text-muted pt-3 border-bottom border-gray">
	  <img src="<?php echo URL.'public/img/experiences/upload/60x60/'.$experience->name_id.'.'.$experience->type_file; ?>" alt="" class="mr-2 rounded-circle">
	  <div class="media-body pb-3 mb-0 small lh-125">
		<h6 class="d-block text-gray-dark"><a href="<?php echo URL.'experiences/read/'.$experience->name_id; ?>" title="voir l'expérience"><?php echo $this->reduceString(15, $experience->title); ?></a></h6>
		<p><?php echo $this->bbCode($this->reduceString(30, $experience->body)); ?></p>
	  </div>
	</div>
	<?php } ?>
  </div>
  
  <a class="btn btn-secondary btn-block" href="<?php echo URL.'formations'; ?>">Toutes les expériences</a><br />

</div>