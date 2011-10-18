<?php
switch($_SERVER['SERVER_NAME']) 
	{ 
	case 'localhost': 
		$Controller = new ConnectionDB ('localhost', 'root', '', 'test');
		$Controller->OpenConnection();
	   break; 
	case 'ecoeco.elitno.net':
		$Controller = new ConnectionDB ('localhost', 'ecoeco', '123ewq', 'ecoeco');
		$Controller->OpenConnection();
	   break; 
	}
