<div class="col-md-8">
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'projects/add">Ajouter un projet</a><br />'; ?>
	<?php $this->getPagination(PROJECTS_PER_PAGE, $projects->getNbProject()->nb, 'projects', $id_page); ?>

	<?php foreach ($projects->getLimitProjects($this->getFirstPagination(PROJECTS_PER_PAGE, $projects->getNbProject()->nb, $id_page), PROJECTS_PER_PAGE) as $project) {  ?>
	<div class="card mb-4">
		<a href="<?php echo URL.'projects/read/'.$project->name_id; ?>" title="Lire la suite"><img class="card-img-top" src="<?php echo URL.'public/img/projects/upload/750x200/'.$project->name_id.'.'.$project->type_file; ?>"></a>
		<div class="card-body">
			<h3 class="card-title"><a href="<?php echo URL.'projects/read/'.$project->name_id; ?>" title="Lire la suite"><?php echo $project->title; ?></a></h3>
			<p class="card-text"><?php echo $this->nlBr($this->bbCode($this->reduceString(250, $project->body))); ?></p>
			<a href="<?php echo URL.'projects/read/'.$project->name_id; ?>" class="btn btn-primary">Lire la suite &rarr;</a>
			<br class="br" />
			<span class="btn-right">
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'projects/edit/'.$project->name_id.'" class="btn btn-primary btn-tool">Modifier</a>'; ?>
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'projects/deleteProject/'.$project->name_id.'" class="btn btn-primary btn-tool">Supprimer</a>'; ?>
			</span>
		</div>
		<div class="card-footer text-muted">
			Publié le <?php echo $this->dateDMY($project->created); ?> par
			<a href="#"><?php echo $admins->getOneAdmin($project->admin_id)->username; ?></a>
		</div>
	</div>
	<?php } ?>
	<?php $this->getPagination(PROJECTS_PER_PAGE, $projects->getNbProject()->nb, 'projects', $id_page); ?>
</div>