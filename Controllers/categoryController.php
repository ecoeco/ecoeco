<?phpclass categoryController{		public function showCategory()	{		$cat = intval ($_GET['cat']);		 		$category = new CategoryModel();        $category->load($cat);		$category->getRelatedCategories();		$category->menuFotoProduct—urrentCategory();				$view = new CategoryView();        $view->set($category);        $view->renderHtml();	}}