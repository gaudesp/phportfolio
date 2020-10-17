<?php

class ConfigModel
{
	public function getConfig($value)
	{
		$config = parse_ini_file(CONFIG);
		
		return $config[$value];
	}

	public function editConfig($cv, $linkedin, $youtube, $about)
	{
		$config = fopen(CONFIG, 'w');
		
		$cv = 'cv = "' . $cv . '"';
		$linkedin = 'linkedin = "' . $linkedin . '"';
		$youtube = 'youtube = "' . $youtube . '"';
		$about = 'about = "' . $about . '"';
		
		fwrite($config, $cv . "\n");
		fwrite($config, $linkedin . "\n");
		fwrite($config, $youtube . "\n");
		fwrite($config, $about . "\n");
		
		fclose($config);
	}
}