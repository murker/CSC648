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
       
        $sql = "SELECT customer_id, cart_id, order_date, total, shipping_cost, tax, grand_total FROM invoice WHERE customer_id = :customer_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }
}
