<div class="col-md-8">
	<?php if ($this->isAdmin() == true) echo'<a class="btn btn-primary btn-lg btn-block" href="'.URL.'config/edit">Modifier cette page</a><br />'; ?>
	<div class="jumbotron">
		<p>
			<?php echo $this->nlBr($this->bbCode($config->getConfig('about'))); ?><br />
		</p>
	</div>
</div>