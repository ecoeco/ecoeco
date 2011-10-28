<?php 
class RegistrationModel
{
	public $_dataReg;


	function checkUser ()
	{
		$reg['message'] = '';
		$reg = array();
		if (isset($_POST['check_user']) && isset ($_POST['username_reg']))
		{ 
			$result_user = mysql_query(sprintf("SELECT id_user FROM users WHERE login = '%s'", $_POST['username_reg']));
			$reg['number'] = mysql_num_rows($result_user);
			$reg['number'] = htmlspecialchars ($reg['number']);
			$id_user = mysql_fetch_array($result_user);
			
			if($_POST['username_reg'] == '')
			{
				$reg['message'] = '<p>Введите имя</p>';
			}
			elseif 	($reg['number'] == 0)
			{
				$reg['message'] = '<p>Такой пользователь не зарегестрированн.</p>';
			}
			elseif ($reg['number'] >= 1)
			{
				$reg['message'] = '<p>Такой пользователь уже зарегестрированн.</p>';
			}
			else
			{
				$reg['message'] = '';
			}
			
		}
		$this->_dataReg = array ();
		$this->_dataReg = $this->_dataReg + $reg;
		return $this;
	}
	public function getData()
    {
        return $this->_dataReg;
    }
	function RegistrationNewUser()
	{
		$result_user = mysql_query(sprintf("SELECT id_user FROM users WHERE login = '%s'", $_POST['username_reg']));
		$number = mysql_num_rows($result_user);
		
		if 	($number == 0)
		{
			$username_reg = mysql_real_escape_string ($_POST['username_reg']);
			$e_mail_reg = mysql_real_escape_string ($_POST['e_mail_reg']);
			$password_reg = mysql_real_escape_string ($_POST['password_reg']);
			$repeat_password_reg = mysql_real_escape_string ($_POST['repeat_password_reg']);
			if (!validate_alphanumeric_underscore($username_reg)) 
			{
				$_SESSION['msg'] = 'Forbidden chars in login. Try again.';
				return false;
			}
			if (!validate_mail($e_mail_reg)) 
			{
				$_SESSION['msg'] = 'Forbidden chars in E-mail. Try again.';
				return false;
			}
			if (!$password_reg) 
			{
				$_SESSION['msg'] = 'Please, provide pass';
				return false;
			}
			if ($password_reg != $repeat_password_reg) 
			{
				$_SESSION['msg'] = 'Please, repeat pass wrong';
				return false;
			}
			
			// Запись в базу Usera
			$g = getenv('HTTP_X_FORWARDED_FOR');
			$d = date('Y-m-d');
			$t = date('H:i:s');
			$pas_reg = md5 ($_POST['password_reg']);
			$_POST['username_reg'] = mysql_real_escape_string ($_POST['username_reg']);
			$_POST['e_mail_reg'] = mysql_real_escape_string ($_POST['e_mail_reg']);
			$result = mysql_query("INSERT INTO users (login, mail, password, date, time, external_ip, real_IP, activ)
			VALUES ('{$_POST['username_reg']}', '{$_POST['e_mail_reg']}', '{$pas_reg}', '{$d}', '{$t}', '{$_SERVER['REMOTE_ADDR']}', '{$g}', '1')")or die("Invalid query: " . mysql_error());
			
			if ($result)
			{
				$_SESSION['msg'] = 'Registration OK';
			}
			else 
			{
				$_SESSION['msg'] = 'Try again';
			}
			// TODO: настроите регенерацию сессии
			//session_regenerate_id();
			return true;
		}
		elseif($_POST['username_reg'] == '')
		{
			$_SESSION['msg'] = $reg['message'] = '<p>Введите имя</p>';
		}
		elseif 	($this->_dataReg == 0)
		{
			$_SESSION['msg'] = $reg['message'] = '<p>Такой пользователь не зарегестрированн.</p>';
		}
		elseif ($this->_dataReg >= 1)
		{
			$_SESSION['msg'] = $reg['message'] = '<p>Такой пользователь уже зарегестрированн.</p>';
		}
		
	
	}
}
