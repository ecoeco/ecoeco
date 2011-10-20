<?php

class ConnectionDBModel
{
	protected $server; 
	private $username; 
	private $password;
	public $dbname;

	function __construct (/*$server, $username, $password, $dbname*/)
	{
		/*$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
		return $this;*/
		
		switch($_SERVER['SERVER_NAME']) 
		 { 
		 case 'localhost': 
			$this->server=$server = 'localhost'; 
			$this->username = $username = 'root'; 
			$this->password = $password = '';
			$this->dbname = $dbname = 'test';
			//$link = mysql_connect($server, $username, $password);
		   break; 
		 case 'ecoeco.elitno.net': 
			$this->server = $server = 'localhost'; 
			$this->username = $username = 'ecoeco'; 
			$this->password = $password = '123ewq';
			$this->dbname = $dbname = 'ecoeco';
			//$link = mysql_connect($server, $username, $password);
		   break; 
		 }
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
/*
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
	
	
	
switch($_SERVER['SERVER_NAME']) 
 { 
 case 'localhost': 
	$server = 'localhost'; 
	$username = 'root'; 
	$password = '';
	$dbname = 'test';
	$link = mysql_connect($server, $username, $password);
   break; 
 case 'ecoeco.elitno.net': 
	$server = 'localhost'; 
	$username = 'ecoeco'; 
	$password = '123ewq';
	$dbname = 'ecoeco';
	$link = mysql_connect($server, $username, $password);
   break; 
 }
$Controller = new ConnectionDBModel ($server, $username, $password, $dbname);
$Controller->OpenConnection();*/

$Controller = new ConnectionDBModel ();
$Controller->OpenConnection();
