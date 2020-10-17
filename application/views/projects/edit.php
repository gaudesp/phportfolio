<div class="col-md-12">
	<div class="jumbotron">
		<form action="<?php echo URL; ?>projects/editProject/<?php echo $project->name_id; ?>" method="post" enctype="multipart/form-data">
			<h3>Modifier un projet</h3>
			<p>Modifier les informations du projet n°<b><?php echo $project->id; ?></p>
			<p class="arrow-back"><a href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo $_SERVER["HTTP_REFERER"]; } else { echo URL.'projects'; } ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="title">Titre</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php echo $project->title; ?>" required>
			</div>
			<div class="form-group">
				<label for="body">Contenu</label>
				<textarea class="form-control" name="body" id="body" rows="18"><?php echo $project->body; ?></textarea>
			</div>
			<div class="form-group">
				<label for="upload">Image</label>
				<input type="file" class="form-control" name="upload" id="upload">
			</div>
			<br />
			<center><button type="submit" name="editProject" class="btn btn-primary btn-lg btn-block">Valider</button></center>
		</form>
	</div>
</div>