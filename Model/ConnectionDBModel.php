<?php

class ConnectionDBModel
{
	protected $server; 
	private $username; 
	private $password;
	private $dbname;

	function __construct ($server, $username, $password, $dbname)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
	}
	
	function OpenConnection()
	{		
		if (!$this->link = mysql_connect($this->server, $this->username, $this->password)) 
		{
			die('Невозможно соединиться с базой данных: ' . mysql_error());
		}
		
		if (!$db_selected = mysql_select_db($this->dbname)) 
		{
			die ('Невозможно выбрать базу данных: ' . mysql_error());
		}
		
	}
	
	function CloseConnection($CloseMySQL)
	{
		$this->CloseMySQL=$CloseMySQL;
		if (mysql_close($this->link))
		{
		 echo $this->CloseMySQL;
		}
	}

}
switch($_SERVER['SERVER_NAME']) 
	{ 
	case 'localhost': 
		$Controller = new ConnectionDBModel ('localhost', 'root', '', 'test');
		$Controller->OpenConnection();
	   break; 
	case 'ecoeco.elitno.net':
		$Controller = new ConnectionDBModel ('localhost', 'ecoeco', '123ewq', 'ecoeco');
		$Controller->OpenConnection();
	   break; 
	}