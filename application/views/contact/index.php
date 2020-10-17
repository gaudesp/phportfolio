<div class="col-md-12">
	<?php echo $alert_contact; ?>
	<div class="jumbotron">
		<form action="<?php echo URL; ?>contact/sendMail" method="post">
			<h3>Me contacter</h3>
			<hr />
			<div class="form-group">
				<label for="name">Nom de famille</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Insérez votre nom de famille" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" required>
			</div>
			<div class="form-group">
				<label for="email">Adresse email</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="Insérez votre adresse email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
			</div>
			<div class="form-group">
				<label for="email">Objet</label>
				<input type="text" class="form-control" name="subject" id="subject" placeholder="Insérez l'objet du message" value="<?php if(isset($_POST['subject'])) echo $_POST['subject']; ?>" required>
			</div>
			<div class="form-group">
				<label for="civility">Civilité</label><br />
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="civility" id="madame" value="madame" <?php if(isset($_POST['civility']) && $_POST['civility'] == 'madame') echo'checked'; ?>>
				  <label class="form-check-label" for="madame">Madame</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="civility" id="monsieur" value="monsieur" <?php if(isset($_POST['civility']) && $_POST['civility'] == 'monsieur') echo'checked'; ?>>
				  <label class="form-check-label" for="monsieur">Monsieur</label>
				</div>
			</div>
			<div class="g-recaptcha" data-sitekey="6Lca4mkUAAAAAAtMacNh_MY-PWS8dTVH3juIdIcG"></div><br />
			<div class="form-group">
				<label for="body">Message</label>
				<textarea class="form-control" name="body" id="body" rows="18" placeholder="Contenu du message"><?php if(isset($_POST['body'])) echo $_POST['body']; ?></textarea>
			</div>
			<br />
			<center><button type="submit" name="sendMail" class="btn btn-primary btn-lg btn-block">Envoyer</button></center>
		</form>
	</div>
</div>