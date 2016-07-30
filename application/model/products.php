<?php

class ProductsModel
{
    public $productsmodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/products.php';
        $this->productsmodel = new ProductsModelxl();
    }
    public function addProduct($customer_id, $name, $description, $price, $stock_qty, $category_id, $img1, $img2, $img3, $img4)     
    {
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

    public function deleteProduct($product_id)
    {
        return $this->productsmodel->deleteProduct($product_id);
    }

    public function updateProduct($name, $description, $price, $stock_qty, $category_id, $product_id)
    {
        $parameters = array(':name' => $name, 
            ':description' => $description, 
            ':price' => $price, 
            ':stock_qty' => $stock_qty, 
            ':category_id' => $category_id, 
            ':product_id' => $product_id);

        
        return $this->productsmodel->updateProduct($parameters);
    }
    public function updateProductImg1($product_id, $img1)
    {
        $parameters = array(':product_id' => $product_id, ':img1' => $img1);
        return $this->productsmodel->updateProductImg1($parameters);
    }
    public function updateProductImg2($product_id, $img2)
    {
        $parameters = array(':product_id' => $product_id, ':img2' => $img2);
        return $this->productsmodel->updateProductImg2($parameters);
    }
    public function updateProductImg3($product_id, $img3)
    {
        $parameters = array(':product_id' => $product_id, ':img3' => $img3);
        return $this->productsmodel->updateProductImg3($parameters);
    }
    public function updateProductImg4($product_id, $img4)
    {
        $parameters = array(':product_id' => $product_id, ':img4' => $img4);
        return $this->productsmodel->updateProductImg4($parameters);
    }

    public function getAllProducts()
    {
        return $this->productsmodel->getAllProducts();
    }

    public function getProduct($product_id)
    {
        return $this->productsmodel->getProduct($product_id);
    }
}