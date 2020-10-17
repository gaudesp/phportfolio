<div class="col-md-8">
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'formations/add">Ajouter une formation</a><br />'; ?>
	<?php $this->getPagination(FORMATIONS_PER_PAGE, $formations->getNbFormation()->nb, 'formations', $id_page); ?>

	<?php foreach ($formations->getLimitFormations($this->getFirstPagination(FORMATIONS_PER_PAGE, $formations->getNbFormation()->nb, $id_page), FORMATIONS_PER_PAGE) as $formation) {  ?>
	<div class="card mb-4">
		<img class="card-img-top" src="<?php echo URL.'public/img/formations/upload/750x200/'.$formation->name_id.'.'.$formation->type_file; ?>" alt="Card image cap">
		<div class="card-body">
			<h3 class="card-title"><?php echo $formation->title; ?></h3>
			<p class="card-text"><?php echo $this->nlBr($this->bbCode($formation->body)); ?></p>
			<span class="btn-right">
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'formations/edit/'.$formation->name_id.'" class="btn btn-primary btn-tool">Modifier</a>'; ?>
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'formations/deleteFormation/'.$formation->name_id.'" class="btn btn-primary btn-tool">Supprimer</a>'; ?>
			</span>
		</div>
		<div class="card-footer text-muted">
			Publié le <?php echo $this->dateDMY($formation->created); ?> par
			<a href="#"><?php echo $admins->getOneAdmin($formation->admin_id)->username; ?></a>
		</div>
	</div>
	<?php } ?>
	<?php $this->getPagination(FORMATIONS_PER_PAGE, $formations->getNbFormation()->nb, 'formations', $id_page); ?>
</div>