<div class="col-md-8">
	<div class="jumbotron">
		<h3><?php echo $projects->getOneProject($name_id)->title; ?></h3>
		<p>
			Publié le <?php echo $this->dateDMYHM($projects->getOneProject($name_id)->created); ?> 
			par <b><?php echo $admins->getOneAdmin($projects->getOneProject($name_id)->admin_id)->username; ?></b> 
		</p>
		<hr>
		<img class="img-fluid rounded" src="<?php echo URL.'public/img/projects/upload/750x200/'.$projects->getOneProject($name_id)->name_id.'.'.$projects->getOneProject($name_id)->type_file; ?>" alt=""><br /><br />
		<p>
			<?php echo $this->nlBr($this->bbCode($projects->getOneProject($name_id)->body)); ?><br />
		</p>
		<?php if ($this->isAdmin() == true) echo'<p class="arrow-admin"><a href="'.URL.'projects/edit/'.$projects->getOneProject($name_id)->name_id.'" class="btn btn-primary btn-first">Modifier</a>'; ?>
		<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'projects/deleteProject/'.$projects->getOneProject($name_id)->name_id.'" class="btn btn-primary">Supprimer</a></p><br />'; ?>
	</div>
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'projects/add">Ajouter un projet</a><br />'; ?>
</div>