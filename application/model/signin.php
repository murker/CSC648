<?php

class SigninModel
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
