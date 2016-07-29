<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $cartmodel = null;
    public $customermodel = null;
    public $homemodel = null;
    public $productsmodel = null;
    public $searchproductsmodel = null;
    public $siginmodel = null;   
    public $itemmodel = null;
    public $invoicemodel = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadCartModel();
        $this->loadCustomerModel();
        $this->loadhomeModel();
        $this->loadproductsModel();
        $this->loadsearchproductsModel();
        $this->loadsigninModel();       
        $this->loaditemModel();
        $this->loadinvoiceModel();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    
    public function loadCartModel()
    {
        require APP . 'dbcalls/cart.php';
        // create new "model" (and pass the database connection)
        $this->cartmodel = new CartModelxl($this->db);
    }
    public function loadcustomerModel()
    {
        require APP . 'dbcalls/customers.php';
        // create new "model" (and pass the database connection)
        $this->customermodel = new CustomerModelxl($this->db);
    }
    public function loadhomeModel()
    {
        require APP . 'dbcalls/home.php';
        // create new "model" (and pass the database connection)
        $this->homemodel = new HomeModelxl($this->db);
    }
    public function loadproductsModel()
    {
        require APP . 'dbcalls/products.php';
        // create new "model" (and pass the database connection)
        $this->productsmodel = new ProductsModelxl($this->db);
    }
    public function loadsearchproductsModel()
    {
        require APP . 'dbcalls/searchproducts.php';
        // create new "model" (and pass the database connection)
        $this->searchproductsmodel = new SearchProductsModelxl($this->db);
    }
    public function loadsigninModel()
    {
        require APP . 'dbcalls/signin.php';
        // create new "model" (and pass the database connection)
        $this->signinmodel = new SigninModelxl($this->db);
    }    
    public function loaditemModel()
    {
        require APP . 'dbcalls/item.php';
        // create new "model" (and pass the database connection)
        $this->itemmodel = new ItemModelxl($this->db);
    }
     public function loadinvoiceModel()
    {
        require APP . 'dbcalls/invoice.php';
        // create new "model" (and pass the database connection)
        $this->invoicemodel = new InvoiceModelxl($this->db);
    }
}
