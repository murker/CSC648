<?php

class SigninModel {

    public $signinmodel = null;

    function __construct() {

        require APP . 'dbcalls/signin.php';
        $this->signinmodel = new SigninModelxl();
    }

    public function signinCustomer($email, $password) {
        $parameters = array(':email' => $email, ':password' => $password);
        return $this->signinmodel->signinCustomer($parameters);
    }

}
