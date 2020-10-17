<?php
	$conf = parse_ini_file('/var/www/html/config.ini', true);
	
	if($conf['gaudesp']['statut'] != 'OFF') {
			require 'application/config/config.php';
			require 'application/libs/application.php';
			require 'application/libs/phpmailer.php';
			require 'application/libs/controller.php';
			
			session_start();
			
			$Application = new Application();
	} else {
		require_once '/var/www/html/function.php';
		
		site_off();
	}