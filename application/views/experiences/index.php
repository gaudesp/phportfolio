<div class="col-md-8">
	<?php echo $alert_experience; ?>
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'experiences/add">Ajouter une experience</a><br />'; ?>
	<?php $this->getPagination(EXPERIENCES_PER_PAGE, $experiences->getNbExperience()->nb, 'experiences', $id_page); ?>

	<?php foreach ($experiences->getLimitExperiences($this->getFirstPagination(EXPERIENCES_PER_PAGE, $experiences->getNbExperience()->nb, $id_page), EXPERIENCES_PER_PAGE) as $experience) {  ?>
	<div class="card mb-4">
		<a href="<?php echo URL.'experiences/read/'.$experience->name_id; ?>" title="Lire la suite"><img class="card-img-top" src="<?php echo URL.'public/img/experiences/upload/750x200/'.$experience->name_id.'.'.$experience->type_file; ?>"></a>
		<div class="card-body">
			<h3 class="card-title"><a href="<?php echo URL.'experiences/read/'.$experience->name_id; ?>" title="Lire la suite"><?php echo $experience->title; ?></a></h3>
			<p class="card-text"><?php echo $this->nlBr($this->bbCode($this->reduceString(250, $experience->body))); ?></p>
			<a href="<?php echo URL.'experiences/read/'.$experience->name_id; ?>" class="btn btn-primary">Lire la suite &rarr;</a>
			<br class="br" />
			<span class="btn-right">
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'experiences/edit/'.$experience->name_id.'" class="btn btn-primary btn-tool">Modifier</a>'; ?>
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'experiences/deleteExperience/'.$experience->name_id.'" class="btn btn-primary btn-tool">Supprimer</a>'; ?>
			</span>
		</div>
		<div class="card-footer text-muted">
			Publié le <?php echo $this->dateDMY($experience->created); ?> par
			<a href="#"><?php echo $admins->getOneAdmin($experience->admin_id)->username; ?></a>
		</div>
	</div>
	<?php } ?>
	<?php $this->getPagination(EXPERIENCES_PER_PAGE, $experiences->getNbExperience()->nb, 'experiences', $id_page); ?>
</div>