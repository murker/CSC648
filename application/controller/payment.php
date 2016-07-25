        
<?php

class Payment extends Controller {

    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/payment/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function finishTransaction(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/invoice/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function createInvoice() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["submit_create_invoice"])) {
            $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']);
            $invoiceData = $this->calcInvoice($cart_items);

            if ($invoiceData['total'] > 0) {
                //TODO: create notice that cart is empty
                $this->cartmodel->createInvoice($_SESSION['CurrentUser'], $invoiceData);
            }
        }
        header('location: ' . URL . 'cart/index');
    }
    public function calcInvoice($cart_items) {
        $time_stamp = date("Y-m-d H:i:s");
        $invoice_data = array("date" => $time_stamp, "total" => 0, "shipping" => 0, "tax" => 0, "g_total" => 0);
        foreach ($cart_items as $item) {
            //TODO: check if item is out of stock, decriment
            //TODO: need to update shipping cost
            $invoice_data["shipping"] = 1;

            //Add up item costs
            $product = $this->itemmodel->getProduct($item->product_id);
            $invoice_data["total"] += $product->price * $item->item_qty;
        }

        //TODO: check proper tax value
        $invoice_data["tax"] = $invoice_data["total"] * 0.07;
        $invoice_data["g_total"] = $invoice_data["total"] + $invoice_data["shipping"] + $invoice_data["tax"];

        return $invoice_data;
    }

    public function sendbuyerConfirmation() {
        
    }

    public function sendSellerConfirmation() {
       
    }
    
    public function updateInventory(){
        
    }

}

?>
