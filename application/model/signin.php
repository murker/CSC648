<?php

class SigninModel
{
    public $signinmodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/signin.php';
        $this->signinmodel = new SigninModelxl();
    }
    
    public function signinCustomer($email, $password)
    {
        return $this->signinmodel->signinCustomer($email, $password);
    }
}
 