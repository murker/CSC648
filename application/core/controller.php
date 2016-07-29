<?php

class Controller
{
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
     * Whenever controller is created load the models".
     */
    function __construct()
    {        
        $this->loadCartModel();
        $this->loadCustomerModel();
        $this->loadhomeModel();
        $this->loadproductsModel();
        $this->loadsearchproductsModel();
        $this->loadsigninModel();       
        $this->loaditemModel();
        $this->loadinvoiceModel();
    }
    
    public function loadCartModel()
    {
        require APP . 'model/cart.php';
        // create new "model" 
        $this->cartmodel = new CartModel();
    }
    public function loadcustomerModel()
    {
        require APP . 'model/customers.php';
        // create new "model" 
        $this->customermodel = new CustomerModel();
    }
    public function loadhomeModel()
    {
        require APP . 'model/home.php';
        // create new "model" 
        $this->homemodel = new HomeModel();
    }
    public function loadproductsModel()
    {
        require APP . 'model/products.php';
        // create new "model" 
        $this->productsmodel = new ProductsModel();
    }
    public function loadsearchproductsModel()
    {
        require APP . 'model/searchproducts.php';
        // create new "model" )
        $this->searchproductsmodel = new SearchProductsModel();
    }
    public function loadsigninModel()
    {
        require APP . 'model/signin.php';
        // create new "model" 
        $this->signinmodel = new SigninModel();
    }    
    public function loaditemModel()
    {
        require APP . 'model/item.php';
        // create new "model" 
        $this->itemmodel = new ItemModel();
    }
     public function loadinvoiceModel()
    {
        require APP . 'model/invoice.php';
        // create new "model" 
        $this->invoicemodel = new InvoiceModel();
    }
}
