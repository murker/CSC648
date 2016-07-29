<?php

if (!isset($_SESSION)) {
    session_start();
}
?>



<?php

class HomeModel {

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

    public function getAllProducts() {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function sortbyCategory($category) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product where category_id = :category";
        $query = $this->db->prepare($sql);
        $parameters = array(':category' => $category);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function sortbyPriceAsc() {
        if ($_SESSION['searchword'] != "") {
            if ($_SESSION['category_id'] == 0) {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name like :searchword ORDER BY price ASC";
                $parameters = array(':searchword' => $_SESSION['searchword']);
            } else {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name like :searchword ORDER BY price ASC";
                $parameters = array(':searchword' => $_SESSION['searchword'], ':category_id' => $_SESSION['category_id']);
            }
            $query = $this->db->prepare($sql);
            $query->execute($parameters);

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        } else {
            $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product ORDER BY price ASC";
            $query = $this->db->prepare($sql);
            $query->execute();

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        }
    }

    public function sortbyPriceDesc() {
        if ($_SESSION['searchword'] != "") {
            if ($_SESSION['category_id'] == 0) {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name like :searchword ORDER BY price DESC";
                $parameters = array(':searchword' => $_SESSION['searchword']);
            } else {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name like :searchword ORDER BY price DESC";
                $parameters = array(':searchword' => $_SESSION['searchword'], ':category_id' => $_SESSION['category_id']);
            }
            $query = $this->db->prepare($sql);
            $query->execute($parameters);

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        } else {
            $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product ORDER BY price DESC";
            $query = $this->db->prepare($sql);
            $query->execute();

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        }
    }

    public function sortbyOldestNewest() {
        if ($_SESSION['searchword'] != "") {
            if ($_SESSION['category_id'] == 0) {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name like :searchword ORDER BY id ASC";
                $parameters = array(':searchword' => $_SESSION['searchword']);
            } else {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name like :searchword ORDER BY id ASC";
                $parameters = array(':searchword' => $_SESSION['searchword'], ':category_id' => $_SESSION['category_id']);
            }
            $query = $this->db->prepare($sql);
            $query->execute($parameters);

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        } else {
            $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product ORDER BY id ASC";
            $query = $this->db->prepare($sql);
            $query->execute();

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        }
    }

    public function sortbyNewestOldest() {
        if ($_SESSION['searchword'] != "") {
            if ($_SESSION['category_id'] == 0) {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name like :searchword ORDER BY id DESC";
                $parameters = array(':searchword' => $_SESSION['searchword']);
            } else {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name like :searchword ORDER BY id DESC";
                $parameters = array(':searchword' => $_SESSION['searchword'], ':category_id' => $_SESSION['category_id']);
            }
            $query = $this->db->prepare($sql);
            $query->execute($parameters);

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        } else {
            $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product ORDER BY id DESC";
            $query = $this->db->prepare($sql);
            $query->execute();

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        }
    }
    public function sortbysortbyBestmatch() {
        if ($_SESSION['searchword'] != "") {
            if ($_SESSION['category_id'] == 0) {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name LIKE :searchword ORDER BY LOCATE(:searchword, name)";
                $parameters = array(':searchword' => $_SESSION['searchword']);
            } else {
                $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name LIKE :searchword ORDER BY LOCATE(:searchword, name)";
                $parameters = array(':searchword' => $_SESSION['searchword'], ':category_id' => $_SESSION['category_id']);
            }
            $query = $this->db->prepare($sql);
            $query->execute($parameters);

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        } else {
            $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product ORDER BY id ASC";
            $query = $this->db->prepare($sql);
            $query->execute();

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
            return $query->fetchAll();
        }
    }

}
