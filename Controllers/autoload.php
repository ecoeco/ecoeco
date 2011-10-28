<?php
function autoloadMyClasses($className)
{
	$possibilities = array( 
		//'beans'.'/'.$className.'.php', 
		'Controllers'.'/'.$className.'.php', 
		//'libraries'.'/'.$className.'.php', 
		'Model'.'/'.$className.'.php', 
		'Views'.'/'.$className.'.php',
		'comments'.'/'.$className.'.class.php',
		$className.'.php' 
	); 
	
	foreach ($possibilities as &$file) { 
		if (file_exists($file)) { 
			require_once($file); 
			return true; 
		}
	} 
	return false; 
}

spl_autoload_register('autoloadMyClasses');
