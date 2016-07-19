<?php

class CartModel
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function addCartItem($cid, $pid, $qty) {
	$sql = "INSERT INTO cart_item (cart_id, product_id, item_qty) VALUES (:cid, :pid, :iqty)";
	$query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid, ':pid' => $pid, ':iqty' => $qty);

        // useful for debugging: you can see the SQL behind above construction by using:
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function deleteCartItem($cid, $pid)
    {
        $sql = "DELETE FROM cart_item WHERE cart_id = :cid AND product_id = :pid";
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid, ':pid' => $pid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function getCartItems($cid)
    {
        $sql = "SELECT cart_id, product_id, item_qty FROM cart_item"; //WHERE cart_id = :cid
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetchAll();
    }
    
    public function getAmountOfCartItems($cid)
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }

    public function updateCartItem($cid, $pid, $qty)
    {
        $sql = "UPDATE cart_item SET item_qty = :artist WHERE cart_id = :cid AND produc_id = :pid";
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid, ':pid' => $pid, ':qty' => $qty);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }


}