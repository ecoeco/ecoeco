<?php
class registrationController
{
	public function showRegistration()
	{
		$registration = new RegistrationModel();
		$registration->checkUser();
		if (isset($_POST['login_reg']) && isset ($_POST['username_reg']) && isset($_POST['e_mail_reg'])) 
		{
			$registration->RegistrationNewUser($registration);
		}
		elseif ($_POST['logout']) 
		{
			logout();
		}
		//var_dump($_SERVER); die;
		
		$view = new RegistrationView();
		$view->set($registration);
		$view->renderHtml();
	}
}