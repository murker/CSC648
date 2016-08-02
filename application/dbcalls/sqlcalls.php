<?php

class Sqlcalls {

    /**
     * @var null Database Connection
     */
    public $db = null;

    function __construct() {
        $this->openDatabaseConnection();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection() {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    //INSERT
    public function createInvoice($usr_id, $invoice_data) {
        $cid = $this->getUserCart($usr_id);

        //add an invoice entry to the invoice table
        $sql = "INSERT INTO invoice (customer_id, cart_id, order_date, total, shipping_cost, tax, grand_total) VALUES (:uid, :cid, :date, :total, :ship, :tax, :g_total)";
        $query = $this->db->prepare($sql);
        $parameters = array(':uid' => $usr_id,
            ':cid' => $cid,
            ':date' => $invoice_data['date'],
            ':total' => $invoice_data['total'],
            ':ship' => $invoice_data['shipping'],
            ':tax' => $invoice_data['tax'],
            ':g_total' => $invoice_data['g_total']);
        $query->execute($parameters);

        //make the cart an invoice
        $sql2 = "UPDATE cart SET name = :invoice WHERE id = :cid";
        $query2 = $this->db->prepare($sql2);
        $parameters2 = array(':invoice' => "invoice", ':cid' => $cid);
        $query2->execute($parameters2);
    }

    public function addCartItem($uid, $pid, $qty) {
        $cid = $this->getUserCart($uid);
        $sql = "INSERT INTO cart_item (cart_id, product_id, item_qty) VALUES (:cid, :pid, :iqty)";
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid, ':pid' => $pid, ':iqty' => $qty);
        $query->execute($parameters);
    }

    /**
     * Add a customer to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
   
    public function addEntry($table, $pars) {
        $first = True;
        $values = "(";
        $dot_values = "(";
        foreach ($pars as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $values = $values . ", ";
                $dot_values = $dot_values . ", ";
            }
            $dot_values = $dot_values . $key;
            $values = $values . ltrim($key, ':');
        }
        $sql = "INSERT INTO " . $table . " " . $values . ") VALUES " . $dot_values . ")";
        //echo $sql; exit();
        $query = $this->db->prepare($sql);
        $query->execute($pars);
    }

    //UPDATE
    /**
     * Update a customer in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $customer_id Id
     */    

    public function updateCartItem($uid, $pid, $qty) {
        $cid = $this->getUserCart($uid);
        $sql = "UPDATE cart_item SET item_qty = :qty WHERE cart_id = :cid AND product_id = :pid";
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid, ':pid' => $pid, ':qty' => $qty);
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }

    public function updateEntry($table, $val, $target) {
        $sql = "UPDATE " . $table . " SET ";
        //Set values
        $first = True;
        foreach ($val as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
        }
        //Set target
        $sql = $sql . " WHERE";
        $first = True;
        foreach ($target as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . " AND ";
            }
            $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
        }
        $query = $this->db->prepare($sql);
        $pars = array_merge($val, $target);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $pars);  exit();
        $query->execute($pars);
    }

    //SELECT
    public function getAllProducts() {
        $sql = "SELECT id, name, description, price, stock_qty, img1, img2, img3, img4, category_id FROM product";
        $query = $this->db->prepare($sql);
        $query->execute();
        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function searchProductW($parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name like :searchword";
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function searchProductWc($parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name like :searchword";
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function getuserProducts($parameters) {
        $sql = "SELECT id, customer_id, name, description, price, stock_qty, category_id, img1, img2, img3, img4 FROM product WHERE customer_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }    

    public function sortbyCategory($parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product where category_id = :category";
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function sortby($column, $order) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product ORDER BY " . $column . " " . $order;
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function sortbyW($column, $order, $parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name like :searchword ORDER BY " . $column . " " . $order;
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function sortbyWc($column, $order, $parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name like :searchword ORDER BY " . $column . " " . $order;
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function sortbysortbyBestmatch() {
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

    public function sortbysortbyBestmatchW($parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE name LIKE :searchword ORDER BY LOCATE(:searchword, name)";
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function sortbysortbyBestmatchWc($parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, category_id, img1 FROM product WHERE category_id = :category_id AND name LIKE :searchword ORDER BY LOCATE(:searchword, name)";
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        return $query->fetchAll();
    }

    public function getInvoice($parameters) {

        $sql = "SELECT customer_id, cart_id, order_date, total, shipping_cost, tax, grand_total FROM invoice WHERE customer_id = :customer_id ORDER BY cart_id DESC LIMIT 1";
        $query = $this->db->prepare($sql);
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
        return $query->fetch();
    }

    public function getProduct($parameters) {
        $sql = "SELECT id, name, description, price, stock_qty, img1, img2, img3, img4, category_id FROM product WHERE id = :product_id LIMIT 1";
        $query = $this->db->prepare($sql);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }
    
    public function getCartItemsCID($cid) {
        $sql = "SELECT cart_id, product_id, item_qty FROM cart_item WHERE cart_id = :cid";
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function getUserCart($usr_id) {
        $sql = "SELECT id FROM cart AS id WHERE name = :current AND customer_id = :usr_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':current' => "current", ':usr_id' => $usr_id);
        $query->execute($parameters);
        $cid = $query->fetch();

        if ($cid == NULL) {
            $sql2 = "SELECT COUNT(id) AS num_carts FROM cart";
            $query2 = $this->db->prepare($sql2);
            $parameters2 = array(':cid' => $cid);
            $query2->execute($parameters2);
            $max_cid = $query2->fetch()->num_carts;

            $cid = $max_cid + 1;

            $sql3 = "INSERT INTO cart (id, customer_id, name) VALUES (:cid, :usr_id, :current)";
            $query3 = $this->db->prepare($sql3);
            $parameters3 = array(':cid' => $cid, ':usr_id' => $usr_id, ':current' => "current");
            $query3->execute($parameters3);
            return $cid;
        } else {
            return $cid->id;
        }
    }

    public function getCartItems($uid) {
        $cid = $this->getUserCart($uid);
        $sql = "SELECT cart_id, product_id, item_qty FROM cart_item WHERE cart_id = :cid";
        $query = $this->db->prepare($sql);
        $parameters = array(':cid' => $cid);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function getEntry($table, $target) {
        $sql = "SELECT *";        
        $sql = $sql . " FROM " . $table;

        if (count($target) > 0) {
            //Set target
            $sql = $sql . " WHERE";
            $first = True;
            foreach ($target as $key => $value) {
                if ($first) {
                    $first = False;
                } else {
                    $sql = $sql . " AND";
                }
                $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
            }
        }
                 
        $query = $this->db->prepare($sql);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $target);  exit();
        $query->execute($target);
        return $query->fetch();
    }
    public function getAllEntries($table, $val, $target) {
        $sql = "SELECT ";
        //Set values
        $first = True;
        foreach ($val as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . ltrim($key, ':');
        }

        $sql = $sql . " FROM " . $table;

        if (count($target) > 0) {
            //Set target
            $sql = $sql . " WHERE";
            $first = True;
            foreach ($target as $key => $value) {
                if ($first) {
                    $first = False;
                } else {
                    $sql = $sql . " AND";
                }
                $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
            }
        }
        $query = $this->db->prepare($sql);
        $pars = array_merge($val, $target);
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $pars);  exit();
        $query->execute($pars);
        return $query->fetchAll();
    }
    

    //DELETE
    
    /**
     * Delete a row in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param string $table, array $pars
     */

    public function deleteEntry($table, $pars) {
        $sql = "DELETE FROM " . $table . " WHERE";
        $first = True;
        foreach ($pars as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . " AND ";
            }
            $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
        }
        $query = $this->db->prepare($sql);
        $query->execute($pars);
    }

}
