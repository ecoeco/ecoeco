<?php

class GroupModel
{
	public $_dataGp;
	
	//
	//�������� ������� ������
	//
	function load($gp)
	{	
		$result = mysql_query(sprintf('SELECT id_group, name FROM catalog_groups WHERE id_group = %d', $gp)) or die("Invalid query: " . mysql_error());
		if ($group['title'] = mysql_fetch_array($result)){
			foreach($group['title'] as &$group_)
				{
					$group_ = htmlspecialchars ($group_);
				}

		}
		$this->_dataGp = array ();
		$this->_dataGp = $this->_dataGp + $group;
		return $this;
	}
	
	//
	// ������� ������
	//
	function getRelatedGroup ()
		{
			$result_group = mysql_query('SELECT * FROM catalog_groups' ) or die("Invalid query: " . mysql_error());
			while ($gp['RelatedGroup'][] = mysql_fetch_array($result_group))
			{
				foreach($gp['RelatedGroup'] as $id) 
					{
						foreach($id as $prod) 
						{
							$prod = htmlspecialchars ($prod);
						}
					}
			} 
			$this->_dataGp = $this->_dataGp + $gp;
			return $this;
		}
	public function getData()
    {
        return $this->_dataGp;
    }
	
	//
	//�������� ��������� � ������� ���������
	//
	function menuFotoProduct�urrentGroup ()
		{
			$result_cat = mysql_query(sprintf('SELECT id_category, group_id, name, img FROM catalog_category WHERE group_id = %d', $this->_dataGp['title']['id_group']))or die("Invalid query: " . mysql_error());
			while ($img['foto'][] = mysql_fetch_array($result_cat))
			{
				foreach($img['foto'] as $id) 
						{
							foreach($id as $prod) 
							{
								$prod = htmlspecialchars ($prod);
							}
						}
			}
			$this->_dataGp = $this->_dataGp + $img;
			return $this;
		}
}