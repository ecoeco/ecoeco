<?php

class CategoryModel
{
	public $_dataCat;
	
	//
	//Название текущей категории
	//
	function load($cat)
	{	
		$result = mysql_query(sprintf('SELECT id_category, group_id, name FROM catalog_category WHERE id_category = %d', intval($cat))) or die("Invalid query: " . mysql_error());
		
		if ($category['title'] = mysql_fetch_array($result)){
			foreach($category['title'] as &$category_) 
				{
					$category_ = htmlspecialchars ($category_);
				}
			
				$this->_dataCat = array ();
				$this->_dataCat = $this->_dataCat + $category;
				return $this;
			
		}
	}
	
	//
	// Смежные категории
	//
	function getRelatedCategories ()
		{
			$result_group = mysql_query(sprintf('SELECT id_group, parent_id, name FROM catalog_groups WHERE id_group = %d', $this->_dataCat['title']['group_id'])) or die("Invalid query: " . mysql_error());
			if($group['group'] = mysql_fetch_array($result_group))
			{
				foreach($group['group'] as &$gp_) 
					{
						$gp_ = htmlspecialchars ($gp_);
					}
			}
			
			
			$result_cat = mysql_query(sprintf('SELECT id_category, group_id, name FROM catalog_category WHERE group_id = %d', $this->_dataCat['title']['group_id'])) or die("Invalid query: " . mysql_error());
			while ($group['cat'][] = mysql_fetch_array($result_cat))
				{				
					foreach($group['cat'] as $cat) 
						{
							foreach($cat as $gp_cat) 
							{
								$gp_cat = htmlspecialchars ($gp_cat);
							}
						}	
				}
			$this->_dataCat = $this->_dataCat + $group;
			return $this;
		}
	public function getData()
    {
        return $this->_dataCat;
    }
	
	//
	//Картинки продуктов в текущей категории
	//
	function menuFotoProductСurrentCategory ()
		{
			$result = mysql_query(sprintf('SELECT id_product, name, img_big, img_small_cat FROM catalog_product WHERE id_category = %d', $this->_dataCat['title']['id_category'])) or die("Invalid query: " . mysql_error());
			$product['number'] = mysql_num_rows($result);
			$i=1;
			while ($product['product'][$i] = mysql_fetch_array($result) and $i<$product['number'])
			{
				foreach($product['product'] as $id) 
					{
						foreach($id as $prod) 
						{
							$prod = htmlspecialchars ($prod);
						}
					}
				$i++;
			} 
			$this->_dataCat = $this->_dataCat + $product;
			return $this;
		}
	


}