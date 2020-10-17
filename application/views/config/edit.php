<div class="col-md-12">
	<div class="jumbotron">
		<form action="<?php echo URL; ?>config/editConfig" method="post">
			<h3>Configuration</h3>
			<p class="lead">Modifier les informations du fichier de configuration</p>
			<p class="arrow-back"><a href="<?php echo URL; ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="cv">Curriculum Vitae</label>
				<input type="text" class="form-control" name="cv" value="<?php echo $config->getConfig('cv'); ?>" required>
			</div>
			<div class="form-group">
				<label for="linkedin">Profil Linkedin</label>
				<input type="text" class="form-control" name="linkedin" value="<?php echo $config->getConfig('linkedin'); ?>" required>
			</div>
			<div class="form-group">
				<label for="youtube">Chaîne Youtube</label>
				<input type="text" class="form-control" name="youtube" value="<?php echo $config->getConfig('youtube'); ?>" required>
			</div>
			<div class="form-group">
				<label for="about">A propos</label>
				<textarea class="form-control" name="about" id="body" rows="18"><?php echo $config->getConfig('about'); ?></textarea>
			</div>
			<br />
			<center><button type="submit" name="editConfig" class="btn btn-primary btn-lg btn-block">Valider</button></center>
		</form>
	</div>
</div>