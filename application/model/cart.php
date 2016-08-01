<?php

class CartModel {

    public $cartmodel = null;

    function __construct() {

        require APP . 'dbcalls/cart.php';
        $this->cartmodel = new CartModelxl();
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
        return $this->cartmodel->deleteCartItem($uid, $pid);
    }

    public function getCartItems($uid) {
        return $this->cartmodel->getCartItems($uid);
    }

    public function getCartItemsCID($cid) {
        return $this->cartmodel->getCartItemsCID($cid);
    }

    public function getAmountOfCartItems($cid) {
        return $this->cartmodel->getAmountOfCartItems($cid);
    }

    public function updateCartItem($uid, $pid, $qty) {
        return $this->cartmodel->updateCartItem($uid, $pid, $qty);
    }

}
