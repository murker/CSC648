<?php

class SearchProductsModel
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
    public function searchProduct($searchword)
    {
        if ($searchword != ""){
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE (name like :searchword or description like :searchword)";
        $query = $this->db->prepare($sql);
        $parameters = array(':searchword' =>  $searchword);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
        }
    }
    public function getuserProducts($user_id)
    {
        $sql = "SELECT id, customer_id, name, description, price, stock_qty, category_id, img1, img2, img3, img4 FROM product WHERE customer_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' =>  $user_id);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }
}
