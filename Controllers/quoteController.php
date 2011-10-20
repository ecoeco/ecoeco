<?php
class quoteController
{
    public function showQuote()
    {
		$id = 1;
		$quote = new QuoteModel();
		$quote->processingUpdatesQuote();
        if (isset ($_POST['order_buy'])) {
			$quote->load();
			$quote->acceptanceOfAnOrder();
		}
		if (isset($_SESSION['username'])) {
			$quote->load();
		}
		
		
        $view = new QuoteView();
        $view->setQuote($quote);
        $view->renderHtml();
    }
}