<div class="col-md-8">
	<div class="jumbotron">
		<h3><?php echo $articles->getOneArticle($name_id)->title; ?></h3>
		<p>
			Publié le <?php echo $this->dateDMYHM($articles->getOneArticle($name_id)->created); ?> 
			par <b><?php echo $admins->getOneAdmin($articles->getOneArticle($name_id)->admin_id)->username; ?></b> 
		</p>
		<hr>
		<img class="img-fluid rounded" src="<?php echo URL.'public/img/articles/upload/750x200/'.$articles->getOneArticle($name_id)->name_id.'.'.$articles->getOneArticle($name_id)->type_file; ?>" alt=""><br /><br />
		<p>
			<?php echo $this->nlBr($this->bbCode($articles->getOneArticle($name_id)->body)); ?><br />
		</p>
		<?php if ($this->isAdmin() == true) echo'<p class="arrow-admin"><a href="'.URL.'articles/edit/'.$articles->getOneArticle($name_id)->name_id.'" class="btn btn-primary btn-first">Modifier</a>'; ?>
		<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'articles/deleteArticle/'.$articles->getOneArticle($name_id)->name_id.'" class="btn btn-primary">Supprimer</a></p><br />'; ?>
	</div>
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'articles/add">Ajouter un article</a><br />'; ?>
</div>