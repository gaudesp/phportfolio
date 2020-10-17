<div class="card my-4">
	<h5 class="card-header"><?php echo $last_projects; ?></h5>
	<?php foreach ($projects->getLimitProjects(0, $nb_projects) as $project) { ?>
	<div class="media text-muted pt-3 border-bottom border-gray">
		<img src="<?php echo URL.'public/img/projects/upload/60x60/'.$project->name_id.'.'.$project->type_file; ?>" alt="" class="mr-2 rounded-circle">
		<div class="media-body pb-3 mb-0 small lh-125">
			<h6 class="d-block text-gray-dark"><a href="<?php echo URL.'projects/read/'.$project->name_id; ?>" title="Voir le projet"><?php echo $this->reduceString(20, $project->title); ?></a></h6>
			<p><?php echo $this->bbCode($this->reduceString(30, $project->body)); ?></p>
		</div>
	</div>
	<?php } ?>
</div>