<div class="col-md-12">
	<div class="jumbotron">
		<form action="<?php echo URL; ?>articles/editArticle/<?php echo $article->name_id; ?>" method="post" enctype="multipart/form-data">
			<h3>Modifier un article</h3>
			<p>Modifier les informations de l'article n°<b><?php echo $article->id; ?></p>
			<p class="arrow-back"><a href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo $_SERVER["HTTP_REFERER"]; } else { echo URL.'articles'; } ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="title">Titre</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php echo $article->title; ?>" required>
			</div>
			<div class="form-group">
				<label for="body">Contenu</label>
				<textarea class="form-control" name="body" id="body" rows="18"><?php echo $article->body; ?></textarea>
			</div>
			<div class="form-group">
				<label for="upload">Image</label>
				<input type="file" class="form-control" name="upload" id="upload">
			</div>
			<br />
			<center><button type="submit" name="editArticle" class="btn btn-primary btn-lg btn-block">Valider</button></center>
		</form>
	</div>
</div>