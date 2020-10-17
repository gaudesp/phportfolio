<?php

class Contact extends Controller
{
    public function index()
    {
		$alert_contact = null;
		
        require HEAD;
		
			require INDEX_CONTACT;
			
        require FOOT;
    }

    public function sendMail()
    {
		$alert_contact = null;
		
        if (isset($_POST['sendMail']) && !empty($_POST['civility']) && !empty($_POST['name']) && !empty($_POST['subject']) && !empty($_POST['email']) && !empty($_POST['body'])) {
			$secret = "6Lca4mkUAAAAAG35koVtWLLsvA0GZe0BtA32OKjj";
			$response = $_POST['g-recaptcha-response'];
			$remoteip = $_SERVER['REMOTE_ADDR'];

			$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
				. $secret
				. "&response=" . $response
				. "&remoteip=" . $remoteip ;

			$decode = json_decode(file_get_contents($api_url), true);
			if($decode['success'] == true) {
				$this->mailSend($_POST['civility'], $_POST['name'], $_POST['subject'], $_POST['email'], $_POST['body']);
				$alert_contact = $this->alertBox('Votre message a bien été envoyé', 'success');
			} else {
				$alert_contact = $this->alertBox('Vous devez cocher la case "Je ne suis pas un robot"', 'danger');
			}
		} else {
			$alert_contact = $this->alertBox('Vous devez remplir tout les champs', 'danger');
		}

        require HEAD;
		
			require INDEX_CONTACT;
			
        require FOOT;
    }
}