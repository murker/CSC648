<?php

class ProductsModel {

    public $productsmodel = null;

    function __construct() {
        include_once APP . 'dbcalls/sqlcalls.php';
        $this->productsmodel = new Sqlcalls();
    }

    public function addProduct($customer_id, $name, $description, $price, $stock_qty, $category_id, $img1, $img2, $img3, $img4) {
        $parameters = array(':customer_id' => $customer_id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':stock_qty' => $stock_qty,
            ':category_id' => $category_id,
            ':img1' => $img1,
            ':img2' => $img2,
            ':img3' => $img3,
            ':img4' => $img4);
        return $this->productsmodel->addProduct($parameters);
    }

    public function deleteProduct($product_id) {
        $parameters = array(':product_id' => $product_id);
        return $this->productsmodel->deleteProduct($parameters);
    }

    public function updateProduct($name, $description, $price, $stock_qty, $category_id, $product_id) {
        $parameters = array(':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':stock_qty' => $stock_qty,
            ':category_id' => $category_id,
            ':product_id' => $product_id);


        return $this->productsmodel->updateProduct($parameters);
    }

    public function updateProductImg($imgnumber, $product_id, $img) {
        $parameters = array(':product_id' => $product_id, ':img' => $img);
        return $this->productsmodel->updateProductImg($imgnumber, $parameters);
    }
    
    public function updateProductQty($product_id, $new_qty) {
        $parameters = array(':product_id' => $product_id, ':stock_qty' => $new_qty);
        return $this->productsmodel->updateProductQty($parameters);
    }

    public function getAllProducts() {
        return $this->productsmodel->getAllProducts();
    }

    public function getProduct($product_id) {
        $parameters = array(':product_id' => $product_id);
        return $this->productsmodel->getProduct($parameters);
    }
}
