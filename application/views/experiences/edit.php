<div class="col-md-12">
	<?php echo $alert_experience; ?>
	<div class="jumbotron">
		<form action="<?php echo URL; ?>experiences/editExperience/<?php echo $experience->name_id; ?>" method="post" enctype="multipart/form-data">
			<h3>Modifier une expérience</h3>
			<p>Modifier les informations de l'expérience n°<b><?php echo $experience->id; ?></p>
			<p class="arrow-back"><a href="<?php echo URL.'experiences'; ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="title">Titre</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php echo $experience->title; ?>" required>
			</div>
			<div class="form-group">
				<label for="body">Contenu</label>
				<textarea class="form-control" name="body" id="body" rows="18"><?php echo $experience->body; ?></textarea>
			</div>
			<div class="form-group">
				<label for="upload">Image</label>
				<input type="file" class="form-control" name="upload" id="upload">
			</div>
			<br />
			<center><button type="submit" name="editExperience" class="btn btn-primary btn-lg btn-block">Valider</button></center>
		</form>
	</div>
</div>