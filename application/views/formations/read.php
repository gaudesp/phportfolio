<div class="col-md-8">
	<div class="jumbotron">
		<h3><?php echo $formations->getOneFormation($name_id)->title; ?></h3>
		<p>
			Publié le <?php echo $this->dateDMYHM($formations->getOneFormation($name_id)->created); ?> 
			par <b><?php echo $admins->getOneAdmin($formations->getOneFormation($name_id)->admin_id)->username; ?></b> 
		</p>
		<hr>
		<img class="img-fluid rounded" src="<?php echo URL.'public/img/formations/upload/750x200/'.$formations->getOneFormation($name_id)->name_id.'.'.$formations->getOneFormation($name_id)->type_file; ?>" alt=""><br /><br />
		<p>
			<?php echo $this->nlBr($this->bbCode($formations->getOneFormation($name_id)->body)); ?><br />
		</p>
		<?php if ($this->isAdmin() == true) echo'<p class="arrow-admin"><a href="'.URL.'formations/edit/'.$formations->getOneFormation($name_id)->name_id.'" class="btn btn-primary btn-first">Modifier</a>'; ?>
		<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'formations/deleteFormation/'.$formations->getOneFormation($name_id)->name_id.'" class="btn btn-primary">Supprimer</a></p><br />'; ?>
	</div>
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'formations/add">Ajouter une formation</a><br />'; ?>
</div>