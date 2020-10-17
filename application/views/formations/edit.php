<div class="col-md-12">
	<div class="jumbotron">
		<form action="<?php echo URL; ?>formations/editFormation/<?php echo $formation->name_id; ?>" method="post" enctype="multipart/form-data">
			<h3>Modifier une formation</h3>
			<p>Modifier les informations de la formation n°<b><?php echo $formation->id; ?></p>
			<p class="arrow-back"><a href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo $_SERVER["HTTP_REFERER"]; } else { echo URL.'formations'; } ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="title">Titre</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php echo $formation->title; ?>" required>
			</div>
			<div class="form-group">
				<label for="body">Contenu</label>
				<textarea class="form-control" name="body" id="body" rows="18"><?php echo $formation->body; ?></textarea>
			</div>
			<div class="form-group">
				<label for="upload">Image</label>
				<input type="file" class="form-control" name="upload" id="upload">
			</div>
			<br />
			<center><button type="submit" name="editFormation" class="btn btn-primary btn-lg btn-block">Valider</button></center>
		</form>
	</div>
</div>