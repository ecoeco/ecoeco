<?php
class GroupView
{
	private $_group;

    function setGroup($group)
    {
        $this->_group = $group;
        return $this;
    }
	
    function getGroupData()
    {
        return $this->_group
		->getData();
    }

    function renderHtml()
    {
		$group = $this->getGroupData();
		if (isset($_GET['gp']))
		{
			include_once '/templates/Group/view.php';
		}
		else 
		{
			include_once '/templates/Group/viewImg.php';
		}
		
		
    }
}

