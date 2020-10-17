<div class="col-md-12">
	<?php echo $alert_admins; ?>
	<div class="jumbotron">
		<form action="<?php echo URL; ?>admins/logIn" method="post">
			<h3>Panel d'Administration</h3>
			<p>Se connecter en tant qu'administrateur</p>
			<p class="arrow-back"><a href="<?php echo URL; ?>" class="btn btn-primary">← Retour</a></p>
			<hr />
			<div class="form-group">
				<label for="username">Utilisateur</label>
				<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" required>
			</div>
			<div class="form-group">
				<label for="password">Mot de passe</label>
				<input type="password" class="form-control" name="password" id="password" required>
			</div>
			<br />
			<center><button type="submit" name="logIn" class="btn btn-primary btn-lg btn-block">Connexion</button></center>
		</form>
	</div>
</div>