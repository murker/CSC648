<?php

class ItemModel {

    public $itemmodel = null;

    function __construct() {
        include_once APP . 'dbcalls/sqlcalls.php';
        $this->itemmodel = new Sqlcalls();
    }

    public function getProduct($product_id) {
        $parameters = array(':product_id' => $product_id);
        return $this->itemmodel->getProduct($parameters);
    }

}
