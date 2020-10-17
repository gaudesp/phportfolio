<div class="col-md-12">
	<?php echo $alert_experience; ?>
	<div class="jumbotron">
		<form action="<?php echo URL; ?>experiences/addExperience" method="post" enctype="multipart/form-data">
			<h3>Ajouter une expérience</h3>
			<p>Publier une nouvelle expérience</p>
			<p class="arrow-back"><a href="<?php echo URL.'experiences'; ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="title">Titre</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" required>
			</div>
			<div class="form-group">
				<label for="body">Contenu</label>
				<textarea class="form-control" name="body" id="body" rows="18"><?php if (isset($_POST['body'])) echo $_POST['body']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="upload">Image</label>
				<input type="file" class="form-control" name="upload" id="upload">
			</div>
			<br />
			<center><button type="submit" name="addExperience" class="btn btn-primary btn-lg btn-block">Valider</button></center>
		</form>
	</div>
</div>