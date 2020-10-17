<div class="col-md-8">
	<?php echo $alert_experience; ?>
	<div class="jumbotron">
		<h3><?php echo $experiences->getOneExperience($name_id)->title; ?></h3>
		<p>
			Publié le <?php echo $this->dateDMYHM($experiences->getOneExperience($name_id)->created); ?> 
			par <b><?php echo $admins->getOneAdmin($experiences->getOneExperience($name_id)->admin_id)->username; ?></b> 
		</p>
		<hr>
		<img class="img-fluid rounded" src="<?php echo URL.'public/img/experiences/upload/750x200/'.$experiences->getOneExperience($name_id)->name_id.'.'.$experiences->getOneExperience($name_id)->type_file; ?>" alt=""><br /><br />
		<p>
			<?php echo $this->nlBr($this->bbCode($experiences->getOneExperience($name_id)->body)); ?><br />
		</p>
		<?php if ($this->isAdmin() == true) echo'<p class="arrow-admin"><a href="'.URL.'experiences/edit/'.$experiences->getOneExperience($name_id)->name_id.'" class="btn btn-primary btn-first">Modifier</a>'; ?>
		<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'experiences/deleteExperience/'.$experiences->getOneExperience($name_id)->name_id.'" class="btn btn-primary">Supprimer</a></p><br />'; ?>
	</div>
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'experiences/add">Ajouter une expérience</a><br />'; ?>
</div>