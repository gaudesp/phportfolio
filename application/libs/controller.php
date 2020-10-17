<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Controller
{
    public $db = null;

    function __construct()
    {
        $this->openDatabaseConnection();
    }

    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

	public function isAdmin()
	{
		if (isset($_SESSION['admin']) && $_SESSION['admin']['access'] == true) {
			return true;
		}
	}
	
	public function nlBr($texte)
	{
		return nl2br($texte);
	}
	
    public function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.php';
        return new $model_name($this->db);
    }
	
	public function loadController($controller_name) {
		require 'application/controller/' . strtolower($controller_name) . '.php';
		$controller_name = ucfirst($controller_name);
		$controller_name = new $controller_name();
		return $controller_name->index();
	}
	
    public function loadModule($module_folder, $module_name)
    {
        require 'application/views/' . strtolower($module_folder) . '/modules/' . strtolower($module_name) . '.php';
    }
	
	public function alertBox($texte, $type) {
		return '
		  <div class="alert alert-'.$type.'" role="alert">
			'.$texte.'
		  </div>
		';
	}
	
	public function dateDMY($date)
	{
		$date = new DateTime($date);
		return $date->format('d/m/Y');
	}

	public function dateDMYHM($date)
	{
		$date = new DateTime($date);
		return $date->format('d/m/Y à H\hi');
	}
	
	public function mailSend($civility, $name, $subject, $email, $body) {
		$user = ucfirst(strtolower($civility)).' '.ucfirst(strtolower($name));
		
		$mail             = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host       = MAIL_HOST;
		$mail->Port       = MAIL_PORT;
		$mail->SMTPAuth   = true;
		$mail->Username   = MAIL_USER;
		$mail->Password   = MAIL_PASS;
		$mail->SMTPSecure = "tls";
		$mail->CharSet = "UTF-8";
		$mail->IsHTML(true);

		$mail->SetFrom($email, $email);
		$mail->AddReplyTo($email, $email);
		$mail->AddAddress(CONTACT_EMAIL);

		$mail->Subject    = $subject;
		$mail->Body		  = '<b>'.$user.'</b> vous a envoyé un message depuis le formulaire de contact de votre site <b>'.strtoupper(SITE_NAME).'</b>.<br /><br />
							Retrouvez <b>ci-dessous</b> le contenu du message.<br /><br />
							<hr /><br />
							'.$this->nlBr($this->bbCode(htmlspecialchars($body)));
		if($mail->send()) {
			return true;
		} else {
			return false;
		}
	}

	public function reduceString($nb_max, $string)
	{
		$string = strip_tags($string);
		if (strlen($string) > $nb_max) { 
			$string = substr($string, 0, $nb_max) ;
			$last_space = strrpos($string, " ") ;
			$string = substr($string, 0, $last_space)."..." ;
		}
		return $string;
	}

	public function hashPassword($password)
	{
		$pass = strlen($password);
		$pass = ($pass * 4)*($pass/3);
		
		$salt = strlen($password);
		$salt2 = strlen($pass.$password);
		
		$sha1 = sha1($salt.$password.$salt2);
		$md5 = md5($sha1.$salt2);
		
		$combine = $sha1.$md5;
		substr($combine, 7, 8);
		return strtoupper($combine);
	}

	public function bbCode($texte)
	{
		$texte = preg_replace('`\[b\](.+)\[/b\]`isU', '<b>$1</b>', $texte); 
		$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<i>$1</i>', $texte);
		$texte = preg_replace('`\[u\](.+)\[/u\]`isU', '<u>$1</u>', $texte);
		$texte = preg_replace('`\[s\](.+)\[/s\]`isU', '<s>$1</s>', $texte);
		$texte = preg_replace('`\[left\](.+)\[/left\]`isU', '<div style="text-align: left;">$1</div>', $texte);
		$texte = preg_replace('`\[center\](.+)\[/center\]`isU', '<center>$1</center>', $texte);
		$texte = preg_replace('`\[right\](.+)\[/right\]`isU', '<div style="text-align: right;">$1</div>', $texte);
		$texte = preg_replace('`\[img\](.+)\[/img\]`isU', '<img class="img-fluid rounded" src="$1" />', $texte);
		$texte = preg_replace('`\[url=(.+)\](.+)\[/url\]`isU', '<a href="$1" target="_blank">$2</a>', $texte);
		$debut = array('[list]','[/list]','[*]','[/*]');
		$fin = array('<ul>','</ul>','<li>','</li>');
		$texte = str_replace($debut, $fin, $texte);
		$debut = array('[list=1]','[/list]','[*]','[/*]');
		$fin = array('<ol>','</ol>','<li>','</li>');
		$texte = str_replace($debut, $fin, $texte);
		$texte = preg_replace('`\[color=(.+)\](.+)\[/color\]`isU', '<font color="$1">$2</font>', $texte);
		$texte = preg_replace('`\[size=50\](.+)\[/size\]`isU', '<font size="1">$1</font>', $texte);
		$texte = preg_replace('`\[size=85\](.+)\[/size\]`isU', '<font size="2">$1</font>', $texte);
		$texte = preg_replace('`\[size=100\](.+)\[/size\]`isU', '<font size="3">$1</font>', $texte);
		$texte = preg_replace('`\[size=150\](.+)\[/size\]`isU', '<font size="4">$1</font>', $texte);
		$texte = preg_replace('`\[size=200\](.+)\[/size\]`isU', '<font size="5">$1</font>', $texte);
		$debut = array('[table]','[/table]','[tr]','[/tr]','[td]','[/td]');
		$fin = array('<table>','</table>','<tr>','</tr>','<td>','</td>');
		$texte = str_replace($debut, $fin, $texte);
		
		return $texte;
	}
	
	public function getFirstPagination($per_page, $total_data, $id_page)
	{
		$nb_page = ceil($total_data / $per_page);
		
		if (isset($id_page) AND is_numeric($id_page) AND $id_page <= $nb_page AND $id_page > 1) {
			$page = $id_page;
		} else {
			$page = 1;
		}
		
		return ($page - 1) * $per_page;
	}
	
	public function getPagination($per_page, $total_data, $name_page, $id_page = false)
	{
		if(empty($id_page)) {
			$id_page = 1;
		}
		
		$nb_page = ceil($total_data / $per_page);
		
		if (isset($id_page) AND is_numeric($id_page) AND $id_page <= $nb_page AND $id_page > 1) {
			$page = $id_page;
			$current_page = $id_page;
		} else {
			$page = 1;
			$current_page = 1;
		}
		
		if ($nb_page > 1) {
			echo'<nav class="margin-bottom-24"><ul class="pagination justify-content-center">';
			
			if ($page == 1 AND $nb_page > 1) {
				$previous = '<li class="page-item disabled"><a href="#" class="page-link">Précédent</a></li>';
				$next = '<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page + 1).'" title="Page suivante">Suivant</a></li>';
			} elseif ($page > 1 AND $page < $nb_page) {
				$previous = '<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page-1).'" title="Page précédente">Précédent</a></li>';
				$next = '<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page+1).'" title="Page suivante">Suivant</a></li>';
			} elseif ($page == $nb_page AND $page > 1) {
				$previous = '<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page-1).'" title="Page précédente">Précédent</a></li>';
				$next = '<li class="page-item disabled"><a href="#" class="page-link">Suivant</a></li>';
			}
			
			echo $previous;
			
			if ($nb_page > 1 OR !$nb_page) {
				while ($page % 30 != 0) {
					$page--;
				}
				
				$begin_page = $page - 5;
				
				if ($begin_page < 1) {
					$begin_page = 1 ;
				}
				
				if ($nb_page - $page < 5 AND ($nb_page - 9 > 1)) {
					$begin_page = $nb_page - 9;
				}
				
				if ($begin_page != 1) {
					echo'<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/1" title="Page 1">1</a></li>';
					
					if ($begin_page != 2) {
						$retro_page = $page - 10;
						
						if ($retro_page < 2) {
							$retro_page = 2;
						}
						
						echo'<li class="page-item"><a class="page-link" href="#" title="...">...</a></li>';
					}
				}
				
				$i = $begin_page;
				$n = 0 ;
				while ($n < 10 AND $i <= $nb_page) {
					if ($current_page == $i) {
						echo'<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
					} else {
						echo'<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
					}
					
					$i++;
					$n++;
				}
				
				$i--;
				
				if ($i != $nb_page) {
					if ($i + 1 != $nb_page) {
						$retro_page = $page + 10;
						
						if ($retro_page >= $nb_page) {
							$retro_page = $nb_page - 1;
						}
						
						echo'<li class="page-item"><a class="page-link" href="#" title="...">...</a></li>';
					}
					echo'<li class="page-item"><a class="page-link" href="'.URL.''.$name_page.'/page/'.$nb_page.'" title="Page '.$nb_page.'">'.$nb_page.'</a></li>';
				}
			} else {
				echo'<li class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
			}
			
			echo $next . '
			</ul></nav>
			';
		}
	}
	
	public function getButtonPage($per_page, $total_data, $name_page, $id_page = false)
	{
		if(empty($id_page)) {
			$id_page = 1;
		}
		
		$nb_page = ceil($total_data / $per_page);
		
		if (isset($id_page) AND is_numeric($id_page) AND $id_page <= $nb_page AND $id_page > 1) {
			$page = $id_page;
			$current_page = $id_page;
		} else {
			$page = 1;
			$current_page = 1;
		}
		
		if ($nb_page > 1) {
			echo'<ul class="pagination justify-content-center mb-1">';
			
			if ($page == 1 AND $nb_page > 1) {
				$previous = '<li class="page-item width-100 disabled"><a href="#" class="page-link">Précédent</a></li>';
				$next = '<li class="page-item width-100"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page + 1).'" title="Page suivante">Suivant</a></li>';
			} elseif ($page > 1 AND $page < $nb_page) {
				$previous = '<li class="page-item width-100"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page-1).'" title="Page précédente">Précédent</a></li>';
				$next = '<li class="page-item width-100"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page+1).'" title="Page suivante">Suivant</a></li>';
			} elseif ($page == $nb_page AND $page > 1) {
				$previous = '<li class="page-item width-100"><a class="page-link" href="'.URL.''.$name_page.'/page/'.($page-1).'" title="Page précédente">Précédent</a></li>';
				$next = '<li class="page-item width-100 disabled"><a href="#" class="page-link">Suivant</a></li>';
			}
			
			echo $previous;
			echo $next . '
			</ul>
			';
		}
	}
	
	public function resizeImage($resource_type,$image_width,$image_height,$resize_width,$resize_height) {
		$image_layer = imagecreatetruecolor($resize_width,$resize_height);
		imagecopyresampled($image_layer,$resource_type,0,0,0,0,$resize_width,$resize_height, $image_width,$image_height);
		return $image_layer;
	}
	
	public function typeFile($type_file) {
		return str_replace('image/', '', $type_file);
	}
	
	public function unlinkImg($name_id, $type_file, $controller_name) {
		$url = 'public/img/'.$controller_name.'/upload/';
		if(@file_exists($url.'750x200/'.$name_id.'.'.$type_file)) unlink($url.'750x200/'.$name_id.'.'.$type_file);
		if(@file_exists($url.'60x60/'.$name_id.'.'.$type_file)) unlink($url.'60x60/'.$name_id.'.'.$type_file);
	}
	
	public function renameImg($old_name, $new_name, $type_file, $controller_name) {
		$url = 'public/img/'.$controller_name.'/upload/';
		if(@file_exists($url.'750x200/'.$old_name.'.'.$type_file)) rename($url.'750x200/'.$old_name.'.'.$type_file, $url.'750x200/'.$new_name.'.'.$type_file);
		if(@file_exists($url.'60x60/'.$old_name.'.'.$type_file)) rename($url.'60x60/'.$old_name.'.'.$type_file, $url.'60x60/'.$new_name.'.'.$type_file);
	}
	
	public function uploadFile($file_name, $type_file, $name_file, $controller_name)
	{
		$success = 0;
        $source_properties = getimagesize($file_name);
        $upload_path = 'public/img/'.$controller_name.'/upload/';
        $upload_image_type = $source_properties[2];
        $source_image_width = $source_properties[0];
        $source_image_height = $source_properties[1];
		$list_folder = array(1 => "750x200/", 2 => "60x60/");
		$new_width = array(1 => 750, 2 => 60);
		$new_height = array(1 => 200, 2 => 60);
		
		for($i = 1; $i <= 2; $i++) {
			switch ($upload_image_type) {
				case IMAGETYPE_JPEG:
					$resource_type = imagecreatefromjpeg($file_name); 
					$image_layer = $this->resizeImage($resource_type,$source_image_width,$source_image_height,$new_width[$i],$new_height[$i]);
					imagejpeg($image_layer,$upload_path.$list_folder[$i].$name_file.'.'. $type_file);
					$success = 1;
					break;

				case IMAGETYPE_GIF:
					$resource_type = imagecreatefromgif($file_name); 
					$image_layer = $this->resizeImage($resource_type,$source_image_width,$source_image_height,$new_width[$i],$new_height[$i]);
					imagegif($image_layer,$upload_path.$list_folder[$i].$name_file.'.'. $type_file);
					$success = 1;
					break;

				case IMAGETYPE_PNG:
					$resource_type = imagecreatefrompng($file_name); 
					$image_layer = $this->resizeImage($resource_type,$source_image_width,$source_image_height,$new_width[$i],$new_height[$i]);
					imagepng($image_layer,$upload_path.$list_folder[$i].$name_file.'.'. $type_file);
					$success = 1;
					break;

				default:
					$success = 0;
					break;
			}
		}
		
        if($success == 1) {
			return true;
		}
	}

	public function transformUrl($text, $separator = '-', $charset = 'utf-8') {
		$text = mb_convert_encoding($text,'HTML-ENTITIES',$charset);
		$text = strtolower(trim($text));
		$text = preg_replace( array('/ß/','/&(..)lig;/', '/&([aouAOU])uml;/','/&(.)[^;]*;/'), array('ss',"$1","$1".'e',"$1"), $text);
		$text = str_replace(':', '', $text);
		
		$text_clear = preg_replace("[^a-z0-9_-]",' ',trim($text));
		$array = explode(' ', $text_clear);
		$str = '';
		
		$i = 0;
		foreach ($array as $key => $value) {
			if (trim($value) != '' AND trim($value) != $separator AND $i > 0) {
				$str .= $separator.$value;
			} elseif (trim($value) != '' AND trim($value) != $separator AND $i == 0) {
				$str .= $value;
			}
			$i++;
		}

		return $str;
	}
}
