        
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

//    public function Invoice($cId, $sId, $carId) {
//        $this->customer_Id = $cId;
//        $this->shipping_Id = $sId;
//        $this->cart_Id = $carId;
//    }

    public function createInvoice() {
        echo($this->customer_Id);
    }


    public function index() {
        
        // getting all songs and amount of songs
        $cart_items = $this->cartmodel->getCartItems("666"); //$cid Hardcoded to 666
        //$amount_of_items = $this->cartmodel->getAmountOfItems();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/cart/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addItem() {
        if (isset($_POST["submit_add_item"])) {
            $this->cartmodel->addCartItem($_POST["cid"], $_POST["pid"],  $_POST["qty"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'cart/index');
        
    }

    public function removeItem() {
        // if we have an id of a song that should be deleted
        if (isset($_POST["submit_delete_item"])) {
            // do deleteSong() in model/cartModel.php
            $this->cartmodel->deleteCartItem($_POST["cid"], $_POST["pid"]);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'cart/index');
        
    }

    public function calculateTotal() {
        $this->total = $this->subTotal;
        $this->total += $this->subTotal * $this->tax;
        $this->total += $this->shippingCost;
        return $this->total;
    }

}

//$myInvoice = new Invoice(1, 2, 3);
//$myInvoice->createInvoice();
?>
