<div class="card my-4">
	<h5 class="card-header"><?php echo $last_articles; ?></h5>
	<?php foreach ($articles->getLimitArticles(0, $nb_articles) as $article) { ?>
	<div class="media text-muted pt-3 border-bottom border-gray" id="zoom" onclick="window.location='<?php echo URL.'articles/read/'.$article->name_id; ?>';">
		<img src="<?php echo URL.'public/img/articles/upload/60x60/'.$article->name_id.'.'.$article->type_file; ?>" alt="" class="mr-2 rounded-circle">
		<div class="media-body pb-3 mb-0 small lh-125">
			<h6 class="d-block text-gray-dark"><a href="<?php echo URL.'articles/read/'.$article->name_id; ?>" title="Voir l'article"><?php echo $this->reduceString(20, $article->title); ?></a></h6>
			<p><?php echo $this->bbCode($this->reduceString(30, $article->body)); ?></p>
		</div>
	</div>
	<?php } ?>
</div>