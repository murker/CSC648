<?php

class SigninModel {

    public $signinmodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->signinmodel = new Sqlcalls();
    }

//    public function signinCustomer($email, $password) {
//        $parameters = array(':email' => $email, ':password' => $password);
//        return $this->signinmodel->signinCustomer($parameters);
//    }
    
    public function signinCustomer($email, $password) {               
        $target = array(':email' => $email, ':password' => $password);
        return $this->signinmodel->getEntry("customer", $target);
    }

}
