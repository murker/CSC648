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
        return $this->productsmodel->addProduct($customer_id, $name, $description, $price, $stock_qty, $category_id, $img1, $img2, $img3, $img4);
    }

    public function deleteProduct($product_id)
    {
        return $this->productsmodel->deleteProduct($product_id);
    }

    public function updateProduct($name, $description, $price, $stock_qty, $category_id, $product_id)
    {
        return $this->productsmodel->updateProduct($name, $description, $price, $stock_qty, $category_id, $product_id);
    }
    public function updateProductImg1($product_id, $img1)
    {
        return $this->productsmodel->updateProductImg1($product_id, $img1);
    }
    public function updateProductImg2($product_id, $img2)
    {
        return $this->productsmodel->updateProductImg2($product_id, $img2);
    }
    public function updateProductImg3($product_id, $img3)
    {
        return $this->productsmodel->updateProductImg3($product_id, $img3);
    }
    public function updateProductImg4($product_id, $img4)
    {
        return $this->productsmodel->updateProductImg4($product_id, $img4);
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