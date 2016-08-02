<?php

class CartModel {

    public $cartmodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->cartmodel = new Sqlcalls();
    }

    public function createInvoice($usr_id, $invoice_data) {

        return $this->cartmodel->createInvoice($usr_id, $invoice_data);
    }

    public function getUserCart($usr_id) {
        return $this->cartmodel->getUserCart($usr_id);
    }

    public function addCartItem($uid, $pid, $qty) {
        return $this->cartmodel->addCartItem($uid, $pid, $qty);
    }

    public function deleteCartItem($uid, $pid) {
        $cid = $this->cartmodel->getUserCart($uid);       
        $pars = array(":cart_id" => $cid, ":product_id" => $pid);
        return $this->cartmodel->deleteEntry("cart_item", $pars);
    }

    public function getCartItems($uid) {
        return $this->cartmodel->getCartItems($uid);
    }

    public function getCartItemsCID($cid) {       
        $val = array(':cart_id', ':product_id', ':item_qty');
        $target = array(':cart_id' => $cid);
        return $this->cartmodel->getAllEntries("cart_item", $val, $target);
    }

    public function getAmountOfCartItems($cid) {
        return $this->cartmodel->getAmountOfCartItems($cid);
    }

    public function updateCartItem($uid, $pid, $qty) {        
        $cid = $this->cartmodel->getUserCart($uid);
        $target = array(":cart_id" => $cid, ":product_id" => $pid);
        $val = array(":item_qty" => $qty);
        return $this->cartmodel->updateEntry("cart_item", $val, $target);
    }

}
