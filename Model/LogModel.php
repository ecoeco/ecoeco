<?php

// Запись в файл информации о посещении страницы.
class LogModel
{
	var $g;
	var $d;
	var $t;
	
	function __construct ()
	{
		$this->g = getenv('HTTP_X_FORWARDED_FOR');
		$this->d = date('Y-m-d');
		$this->t = date('H:i:s');
		$this->username = false;
	}
	//Запись в базу лога
	function run ()
	{
		if (!isset($_COOKIE['username']))
		{
			$this->name=false;
		}
		else
		{
			$this->name = mysql_real_escape_string($_COOKIE['username']);
		}
		if(!isset ($_SERVER['HTTP_REFERER']))
		{
			$_SERVER['HTTP_REFERER']=false;
		}
		$result = mysql_query("INSERT INTO log (username, date, time, external_ip, where_from, where_to, user_agent, real_IP)
		VALUES ('{$this->name}', '$this->d', '$this->t', '{$_SERVER['REMOTE_ADDR']}', '{$_SERVER['HTTP_REFERER']}', '{$_SERVER['REQUEST_URI']}', '{$_SERVER['HTTP_USER_AGENT']}', '$this->g')") or die("Invalid query: " . mysql_error());
	}
}

