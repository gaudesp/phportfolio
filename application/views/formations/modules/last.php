<div class="card my-4">
	<h5 class="card-header"><?php echo $last_formations; ?></h5>
	<?php foreach ($formations->getLimitFormations(0, $nb_formations) as $formation) { ?>
	<div class="media text-muted pt-3 border-bottom border-gray">
		<img src="<?php echo URL.'public/img/formations/upload/60x60/'.$formation->name_id.'.'.$formation->type_file; ?>" alt="" class="mr-2 rounded-circle">
		<div class="media-body pb-3 mb-0 small lh-125">
			<h6 class="d-block text-gray-dark"><a href="<?php echo URL.'formations/read/'.$formation->name_id; ?>" title="Voir la formation"><?php echo $this->reduceString(20, $formation->title); ?></a></h6>
			<p><?php echo $this->bbCode($this->reduceString(30, $formation->body)); ?></p>
		</div>
	</div>
	<?php } ?>
</div>