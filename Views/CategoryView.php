<?php
class CategoryView
{
	private $_category;

    function setCategory($category)
    {
        $this->_category = $category;
        return $this;
    }
	
    function getCategoryData()
    {
        return $this->_category
		->getData();
    }

    function renderHtml()
    {
		$cat = $category = $this->getCategoryData();
        include_once '/templates/Category/view.php';
		
    }
}

