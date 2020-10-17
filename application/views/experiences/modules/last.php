<div class="card my-4">
	<h5 class="card-header"><?php echo $last_experiences; ?></h5>
	<?php foreach ($experiences->getLimitExperiences(0, $nb_experiences) as $experience) { ?>
	<div class="media text-muted pt-3 border-bottom border-gray">
		<img src="<?php echo URL.'public/img/experiences/upload/60x60/'.$experience->name_id.'.'.$experience->type_file; ?>" alt="" class="mr-2 rounded-circle">
		<div class="media-body pb-3 mb-0 small lh-125">
			<h6 class="d-block text-gray-dark"><a href="<?php echo URL.'experiences/read/'.$experience->name_id; ?>" title="Voir l'expérience"><?php echo $this->reduceString(20, $experience->title); ?></a></h6>
			<p><?php echo $this->bbCode($this->reduceString(30, $experience->body)); ?></p>
		</div>
	</div>
	<?php } ?>
</div>