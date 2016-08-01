 

<?php

class Payment extends Controller {

    public function index() {
        if (!isset($_SESSION)) {
            session_start();
        }              
        $customer = $this->customermodel->getCustomer('customer', $_SESSION['CurrentUser']);
        $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']);
        $products = array();
        foreach ($cart_items as $item) {
            $nextProduct = $this->itemmodel->getProduct($item->product_id);
            if ($nextProduct->stock_qty >= $item->item_qty) {
                $nextProduct->qty = $item->item_qty;
            } else {
                $nextProduct->qty = $nextProduct->stock_qty;
                $item->item_qty = $nextProduct->stock_qty;
                $this->cartmodel->updateCartItem($_SESSION['CurrentUser'], $item->product_id, $nextProduct->stock_qty);
            }
            array_push($products, $nextProduct);
        }
        require APP . 'controller/cart.php';
        $invoiceData = Cart::calcInvoice($cart_items, $this);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/payment/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function createInvoice() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["submit_create_invoice"])) {
            $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']);
            
            require APP . 'controller/cart.php';                    
            $invoiceData = Cart::calcInvoice($cart_items, $this);

            if ($invoiceData['total'] > 0) {
                //TODO: create notice that cart is empty
                $this->cartmodel->createInvoice($_SESSION['CurrentUser'], $invoiceData);
            }
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/invoice/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function updateInventory() {
        
    }

}
?>
