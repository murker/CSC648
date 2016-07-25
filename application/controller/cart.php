        
<?php

class Cart extends Controller {

    //Invoice variables
    public $subTotal;
    public $tax;
    public $shippingCost;
    public $total;
    public $id;
    //Cart variables
    public $customer_Id;
    public $shipping_Id;
    public $cart_Id;

    public function index() {
        require APP . 'view/_templates/header.php';
        $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']); //$cid Hardcoded to 666
        $products = array();
        foreach ($cart_items as $item) {
            array_push($products, $this->itemmodel->getProduct($item->product_id));
        }
        require APP . 'view/cart/index.php';
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

    public function addItem() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["submit_add_item"])) {
            $this->cartmodel->addCartItem($_SESSION['CurrentUser'], $_POST["pid"], $_POST["qty"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'cart/index');
    }

    public function removeItem() {
        if (!isset($_SESSION)) {
            session_start();
        }
        // if we have an id of a song that should be deleted
        if (isset($_POST["submit_delete_item"])) {
            // do deleteSong() in model/cartModel.php
            $this->cartmodel->deleteCartItem($_SESSION['CurrentUser'], $_POST["pid"]);
        }

        // where to go after song has been deleted
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

}

//$myInvoice = new Invoice(1, 2, 3);
//$myInvoice->createInvoice();
?>
