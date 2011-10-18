<?php

class MenuModel
{
	public $_dataMenu;
	
	function load()
	{	
		
		echo getcwd();
		$i=1;
		$k=1;
		$n=1;
		$menu = array();
		$result_gp = mysql_query('SELECT id_group, name FROM catalog_groups') or die("Invalid query: " . mysql_error()) or die("Invalid query: " . mysql_error());
		$number_gp = mysql_num_rows($result_gp);
		while (($menu['group'][$i] = mysql_fetch_array($result_gp)) and $i<$number_gp)
		{
			foreach($menu['group'] as $value) 
			{	
				foreach($value as $v) 
				{
					$v = htmlspecialchars ($v);
				}
			}
			$i++;
		}	
		$result = mysql_query(sprintf('SELECT id_category, group_id, name FROM catalog_category')) or die("Invalid query: " . mysql_error());
		$number_cat = mysql_num_rows($result);
		while (($menu['category'][$k] = mysql_fetch_array($result)) and $k<$number_cat)
		{
			foreach($menu['category'] as $cat) 
			{
				foreach($cat as $category) 
				{
					$category = htmlspecialchars ($category);
				}
			}
			$k++;
		}	var_dump ($menu); die;	
		$result_cat = mysql_query(sprintf('SELECT id_product, id_category, name, id_category FROM catalog_product WHERE id_category = %d ', $menu['group'][$i]['category'][$k]['group_id'])) or die("Invalid query: " . mysql_error());
		while ($menu['product'][$n] = mysql_fetch_array($result_cat))
		{
	
			foreach($menu['group'][$i]['category'][$k]['product'][$n] as $product) 
			{
				$product = htmlspecialchars ($product);
				
			}
			$n++;
		}//var_dump ($menu['group'][$i]['category'][$k]['product']); die;	
		$k++;
			
		
		
		
		
		
		
		
		
		
		
		/*
		$result_gp = mysql_query('SELECT id_group, name FROM catalog_groups') or die("Invalid query: " . mysql_error()) or die("Invalid query: " . mysql_error());
		while ($menu['group'][$i] = mysql_fetch_array($result_gp))
		{
			foreach($menu['group'][$i] as $value) 
			{
					$value = htmlspecialchars ($value);
			}
			
			$result = mysql_query(sprintf('SELECT id_category, group_id, name FROM catalog_category WHERE group_id = %d ORDER BY group_id' , intval($menu['group'][$i]['id_group']))) or die("Invalid query: " . mysql_error());
			while ($menu['group'][$i]['category'][$k] = mysql_fetch_array($result))
			{
				foreach($menu['group'][$i]['category'][$k] as $category) 
				{
					$category = htmlspecialchars ($category);
				}
				
				$result_cat = mysql_query(sprintf('SELECT id_product, id_category, name, id_category FROM catalog_product WHERE id_category = %d ORDER BY birth', $menu['group'][$i]['category'][$k]['group_id'])) or die("Invalid query: " . mysql_error());
				while ($menu['group'][$i]['category'][$k]['product'][$n] = mysql_fetch_array($result_cat))
				{
			
					foreach($menu['group'][$i]['category'][$k]['product'][$n] as $product) 
					{
						$product = htmlspecialchars ($product);
						
					}
					$n++;
				}//var_dump ($menu['group'][$i]['category'][$k]['product']); die;	
				$k++;
			}
			$i++;
		} */
		//var_dump ($menu['group'][$i]['category']); die;
		$this->_dataMenu = array ();
		$this->_dataMenu = $this->_dataMenu + $menu;
		
		return $this;
	}
	public function getData()
    {
        return $this->_dataMenu;
    }
	
	
}