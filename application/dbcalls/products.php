<?php

class ProductsModelxl
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    function __construct()
    {
        $this->openDatabaseConnection();
    }
    
    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }
    public function addProduct($customer_id, $name, $description, $price, $stock_qty, $category_id, $img1, $img2, $img3, $img4)     
    {
        $sql = "INSERT INTO product (customer_id, name, description, price, stock_qty, category_id, img1, img2, img3, img4) VALUES (:customer_id, :name, :description, :price, :stock_qty, :category_id, :img1, :img2, :img3, :img4)";
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id, ':name' => $name, ':description' => $description, ':price' => $price, ':stock_qty' => $stock_qty, ':category_id' => $category_id, ':img1' => $img1, ':img2' => $img2, ':img3' => $img3, ':img4' => $img4);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM product WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id);
        // useful for debugging: you can see the SQL behind above construction by using:
       // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function updateProduct($name, $description, $price, $stock_qty, $category_id, $product_id)
    {
        $sql = "UPDATE product SET name = :name, description = :description, price = :price , stock_qty = :stock_qty, category_id = :category_id  WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':description' => $description, ':price' => $price, ':stock_qty' => $stock_qty, ':category_id' => $category_id, ':product_id' => $product_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    public function updateProductImg1($product_id, $img1)
    {
        $sql = "UPDATE product SET img1 = :img1 WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id, ':img1' => $img1);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    public function updateProductImg2($product_id, $img2)
    {
        $sql = "UPDATE product SET img2 = :img2 WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id, ':img2' => $img2);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    public function updateProductImg3($product_id, $img3)
    {
        $sql = "UPDATE product SET img3 = :img3 WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id, ':img3' => $img3);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    public function updateProductImg4($product_id, $img4)
    {
        $sql = "UPDATE product SET img4 = :img4 WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id, ':img4' => $img4);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function getAllProducts()
    {
        $sql = "SELECT id, name, description, price, stock_qty, img1, img2, img3, img4, category_id FROM product";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function getProduct($product_id)
    {
        $sql = "SELECT id, name, description, price, stock_qty, img1, img2, img3, img4, category_id FROM product WHERE id = :product_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':product_id' => $product_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }
}