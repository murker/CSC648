<?php

class InvoiceModel {

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getInvoice($customer_id) {
       
        $sql = "SELECT customer_id, cart_id, order_date, total, shipping_cost, tax, grand_total FROM invoice WHERE id = :customer_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
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
    

}
