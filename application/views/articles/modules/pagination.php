<?php if($articles->getNbArticle()->nb > ARTICLES_PER_PAGE) { ?>
<div class="card my-4">
	<h5 class="card-header">Pagination</h5>
	<div class="card-body">
		<?php $this->getButtonPage(ARTICLES_PER_PAGE, $articles->getNbArticle()->nb, 'articles', $id_page); ?>
	</div>
</div>
<?php } ?>