<?php if($experiences->getNbExperience()->nb > EXPERIENCES_PER_PAGE) { ?>
<div class="card my-4">
	<h5 class="card-header">Pagination</h5>
	<div class="card-body">
		<?php $this->getButtonPage(EXPERIENCES_PER_PAGE, $experiences->getNbExperience()->nb, 'experiences', $id_page); ?>
	</div>
</div>
<?php } ?>