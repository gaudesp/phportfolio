<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
	<a class="navbar-brand" href="#">Gaudesp</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav ml-auto">
		<li class="nav-item <?php if($_GET['url'] == 'home' OR stripos($_SERVER['REQUEST_URI'], 'home')) echo'active'; ?>">
		  <a class="nav-link" href="<?php echo URL; ?>">Accueil
		  </a>
		</li>
		<li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'articles')) { echo'active'; } ?>">
		  <a class="nav-link" href="<?php echo URL; ?>articles">Actualités</a>
		</li>
		<li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'about')) echo'active'; ?>">
		  <a class="nav-link" href="<?php echo URL; ?>about">A propos</a>
		</li>
		<li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'formations')) echo'active'; ?>">
		  <a class="nav-link" href="<?php echo URL; ?>formations">Formations</a>
		</li>
		<li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'experiences')) echo'active'; ?>">
		  <a class="nav-link" href="<?php echo URL; ?>experiences">Expériences</a>
		</li>
		<li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'projects')) echo'active'; ?>">
		  <a class="nav-link" href="<?php echo URL; ?>projects">Projets</a>
		</li>
		<li class="nav-item <?php if(stripos($_SERVER['REQUEST_URI'], 'contact')) echo'active'; ?>">
		  <a class="nav-link" href="<?php echo URL; ?>contact">Contactez-moi</a>
		</li>
	  </ul>
	</div>
  </div>
</nav>