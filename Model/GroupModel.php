<?php

class GroupModel
{
	public $_dataGp;
	
	//
	//Название текущей группы
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
	// Смежные группы
	//
	function getRelatedGroup ()
		{
			$result_group = mysql_query('SELECT * FROM catalog_groups' ) or die("Invalid query: " . mysql_error());
			$gp['number'] = mysql_num_rows($result_group);
			$i=1;
			while ($gp['RelatedGroup'][] = mysql_fetch_array($result_group) and $i<$gp['number'])
			{
				foreach($gp['RelatedGroup'] as $id) 
					{
						foreach($id as $prod) 
						{
							$prod = htmlspecialchars ($prod);
						}
					}
				$i++;
			} 
			$this->_dataGp = $this->_dataGp + $gp;
			return $this;
		}
	public function getData()
    {
        return $this->_dataGp;
    }
	
	//
	//Картинки продуктов в текущей категории
	//
	function menuFotoProductСurrentGroup ()
		{
			$result_cat = mysql_query(sprintf('SELECT id_category, group_id, name, img FROM catalog_category WHERE group_id = %d', $this->_dataGp['title']['id_group']))or die("Invalid query: " . mysql_error());
			$img['number'] = mysql_num_rows($result_cat);
			$i=1;
			while ($img['foto'][] = mysql_fetch_array($result_cat) and $i<$img['number'])
			{
				foreach($img['foto'] as $id) 
					{
						foreach($id as $prod) 
						{
							$prod = htmlspecialchars ($prod);
						}
					}
				$i++;
			}
			$this->_dataGp = $this->_dataGp + $img;
			return $this;
		}
}