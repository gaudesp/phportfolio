<?php if($projects->getNbProject()->nb > PROJECTS_PER_PAGE) { ?>
<div class="card my-4">
	<h5 class="card-header">Pagination</h5>
	<div class="card-body">
		<?php $this->getButtonPage(PROJECTS_PER_PAGE, $projects->getNbProject()->nb, 'projects', $id_page); ?>
	</div>
</div>
<?php } ?>