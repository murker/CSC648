<?php

class ItemModel
{
    public $itemmodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/item.php';
        $this->itemmodel = new IntemModelxl();
    }
 
    public function getProduct($product_id)
    {
        return $this->itemmodel->getProduct($product_id);
    }
}