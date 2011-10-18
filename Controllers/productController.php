<?php
class productController
{
    public function showProduct()
    {
		$id = intval ($_GET['id']);

        $product = new ProductModel();
        $product->load($id);
		$product->getRelatedProducts();
		$product->printRalProduct();
		$product->selectColorQuoteProduct();
		//var_dump($_SERVER); die;
		
        $view = new ProductView();
        $view->setProduct($product);
        $view->renderHtml();
    }
}

