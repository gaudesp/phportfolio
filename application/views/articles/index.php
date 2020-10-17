<div class="col-md-8">
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'articles/add">Ajouter un article</a><br />'; ?>
	<?php $this->getPagination(ARTICLES_PER_PAGE, $articles->getNbArticle()->nb, 'articles', $id_page); ?>

	<?php foreach ($articles->getLimitArticles($this->getFirstPagination(ARTICLES_PER_PAGE, $articles->getNbArticle()->nb, $id_page), ARTICLES_PER_PAGE) as $article) {  ?>
	<div class="card mb-4" id="zoom" onclick="window.location='<?php echo URL.'articles/read/'.$article->name_id; ?>';">
		<a href="<?php echo URL.'articles/read/'.$article->name_id; ?>" title="Lire la suite"><img class="card-img-top" src="<?php echo URL.'public/img/articles/upload/750x200/'.$article->name_id.'.'.$article->type_file; ?>"></a>
		<div class="card-body">
			<h3 class="card-title"><a href="<?php echo URL.'articles/read/'.$article->name_id; ?>" title="Lire la suite"><?php echo $article->title; ?></a></h3>
			<p class="card-text"><?php echo $this->nlBr($this->bbCode($this->reduceString(250, $article->body))); ?></p>
			<a href="<?php echo URL.'articles/read/'.$article->name_id; ?>" class="btn btn-primary">Lire la suite &rarr;</a>
			<br class="br" />
			<span class="btn-right">
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'articles/edit/'.$article->name_id.'" class="btn btn-primary btn-tool">Modifier</a>'; ?>
				<?php if ($this->isAdmin() == true) echo'<a href="'.URL.'articles/deleteArticle/'.$article->name_id.'" class="btn btn-primary btn-tool">Supprimer</a>'; ?>
			</span>
		</div>
		<div class="card-footer text-muted">
			Publié le <?php echo $this->dateDMY($article->created); ?> par
			<a href="#"><?php echo $admins->getOneAdmin($article->admin_id)->username; ?></a>
		</div>
	</div>
	<?php } ?>
	<?php $this->getPagination(ARTICLES_PER_PAGE, $articles->getNbArticle()->nb, 'articles', $id_page); ?>
</div>