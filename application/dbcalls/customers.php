<?php

class CustomerModelxl
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

     /**
     * Get all customers from database
     */
    public function getAllCustomers()
    {
        $sql = "SELECT id, firstname, lastname, email, password, phone, street, city, zipcode FROM customer";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
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
    public function addCustomer($firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode)
    {
        $sql = "INSERT INTO customer (firstname, lastname, email, password, phone, street, city, zipcode) VALUES (:firstname, :lastname, :email, :password, :phone, :street, :city, :zipcode)";
        $query = $this->db->prepare($sql);
        $parameters = array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':password' => $password, ':phone' => $phone, ':street' => $street, ':city' => $city, ':zipcode' => $zipcode );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a customer in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $customer_id Id of customer
     */
    public function deleteCustomer($customer_id)
    {
        $sql = "DELETE FROM customer WHERE id = :customer_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a customer from database
     */
    public function getCustomer($customer_id)
    {
        $sql = "SELECT id, firstname, lastname, email, password, phone, street, city, zipcode FROM customer WHERE id = :customer_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

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
    public function updateCustomer($firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode, $customer_id)
    {
        $sql = "UPDATE customer SET firstname = :firstname, lastname = :lastname, email = :email , password = :password, phone = :phone, street = :street, city = :city, zipcode = :zipcode WHERE id = :customer_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email,':password' => $password, ':phone' => $phone, ':street' => $street, ':city' => $city, ':zipcode' => $zipcode, ':customer_id' => $customer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/customers.php for more)
     */
    public function getAmountOfCustomers()
    {
        $sql = "SELECT COUNT(id) AS amount_of_customers FROM customer";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_customers;
    }
    public function signinCustomer($email, $password)
    {
        $sql = "SELECT email FROM customer WHERE email = :email AND password = :password";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email, ':password' => $password );
        $query->execute($parameters);
        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

       return $query->fetch();
    }

}
