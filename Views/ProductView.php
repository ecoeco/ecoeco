<?php
class ProductView
{
    private $_product;

    function setProduct($product)
    {
        $this->_product = $product;
        return $this;
    }
	
    function getProductData()
    {
        return $this->_product
		->getData();
    }

    function renderHtml()
    {
		$cat = $product = $this->getProductData();
        include_once '/templates/Product/view.php';
		
    }
}

