        
<?php

class Invoice extends Controller {

    public function index() {      
        if(!isset($_SESSION)) {
            session_start();
        }       
        require APP . 'view/_templates/header.php';
        require APP . 'view/invoice/index.php';
        require APP . 'view/_templates/footer.php';
        $invoice = $this->invoicemodel->getInvoice($_SESSION['CurrentUser']);
        $products = $this->productsmodel->getAllProducts();
    }
}

?>
