<?php

class BodyModel
{
	public $_dataBody;
	function load()
	{	
		if (isset($_GET['id']) && !isset($_POST['AdminEnter'])) {
			$productShow = new productController();
			$productShow->showProduct();
		}
		elseif (isset($_GET['cat']) && !isset($_POST['AdminEnter'])) {
			$categoryShow = new categoryController();
			$categoryShow->showCategory();
		}
		
		elseif (isset($_GET['action'])) {
			if ($_GET['action']=='forum') {
				//	Forum
				require_once 'comments/demo.php';
			}
			elseif ($_GET['action']=='quote') {
				//	quote
				$quoteShow = new quoteController();
				$quoteShow->showQuote();
				//require_once 'templates/Quote/quote.php';
			}
			elseif ($_GET['action']=='registration'){
				//	registration
				//require_once 'templates/Registration/registration.php';
				$registrationShow = new registrationController();
				$registrationShow->showRegistration();
			}
			elseif ($_GET['action']=='feedback'){
				//	test
				require_once 'templates/Feedback/feedback.php';
			}
			else{
				unset ($_GET);
				unset ($_POST);?>
				<script language=javascript>
					setTimeout("location.href='index.php'", 0);
				</script>
				<?php $groupShow = new groupController();
				$groupShow->showGroup();
			}
			
		}
		
		
		/*elseif (isset($_GET['edit_id']) && !isset($_POST['AdminEnter'])) {
			$_GET['edit_id'] = mysql_real_escape_string ($_GET['edit_id']);
			show_group($_GET['edit_id']);
		}*/
		
		//
		//Admin panel
		//
		elseif (isset($_POST['AdminEnter'])) {
			$_POST['AdminEnter'] = mysql_real_escape_string ($_POST['AdminEnter']);
			require_once 'admin.php';
			//show_admin ();
		}
		elseif (isset ($_POST['browsing_history']) or isset($_GET['log_list'])) {
			require_once 'admin.php';
			require_once 'admin/log.php';
		}
		 elseif (isset ($_POST['mysql_status'])) {
			require_once 'admin.php';
			require_once 'admin/status.php';
		}
		 elseif (isset ($_POST['edit_product']) ) {
			require_once 'admin.php';
			require_once 'admin/EditProduct.php'; 
		}	
		 elseif (isset($_POST['edit_category'])) {
			require_once 'admin.php';
			require_once 'admin/EditCategory.php'; 
		}		
		elseif (isset($_GET['edit_id'])) {
			$_GET['edit_id'] = mysql_real_escape_string ($_GET['edit_id']);
				require_once 'admin.php';
				edit_id ($_GET['edit_id']); 
		}
		elseif (isset($_GET['edit_cat'])) {
			$_GET['edit_cat'] = mysql_real_escape_string ($_GET['edit_cat']);
				require_once 'admin.php';
				edit_cat ($_GET['edit_cat']); 
		}
		elseif (isset($_POST['AddCategory'])) {
			$_POST['AddCategory'] = mysql_real_escape_string ($_POST['AddCategory']);
				require_once 'admin.php';
				require_once 'admin/EditorCategory.php';
		}
		elseif (isset($_POST['AddCategoryNewCat'])) {
			$_POST['AddCategoryNewCat'] = mysql_real_escape_string ($_POST['AddCategoryNewCat']);
			edit_cat ($_POST['AddCategoryNewCat']); 
			}
		elseif (!isset($_POST['AdminEnter']) && !isset($_POST['AdminEnter'])) {
			$groupShow = new groupController();
			$groupShow->showGroup();
		}
		else {
			unset ($_GET);
			unset ($_POST);
			
			$groupShow = new groupController();
			$groupShow->showGroup();
		}
		
	}
	
	public function getData()
    {
        return $this->_dataBody;
    }


}