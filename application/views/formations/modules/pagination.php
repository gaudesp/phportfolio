<?php if($formations->getNbFormation()->nb > FORMATIONS_PER_PAGE) { ?>
<div class="card my-4">
	<h5 class="card-header">Pagination</h5>
	<div class="card-body">
		<?php $this->getButtonPage(FORMATIONS_PER_PAGE, $formations->getNbFormation()->nb, 'formations', $id_page); ?>
	</div>
</div>
<?php } ?>