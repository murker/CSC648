<?php

class ItemModel
{
    public $itemmodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/item.php';
        $this->itemmodel = new ItemModelxl();
    }
 
    public function getProduct($product_id)
    {
        return $this->itemmodel->getProduct($product_id);
    }
}