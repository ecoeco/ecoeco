<?php

class BodyController
{

	public function showBody ()
	{
		$body= new BodyModel();
		$body->load();
		
	}




}