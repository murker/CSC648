<?php

class InvoiceModel {

    public $invoicemodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/invoice.php';
        $this->invoicemodel = new InvoiceModelxl();
    }

    public function getInvoice($customer_id) {
        $parameters = array(':customer_id' => $customer_id);
        return $this->invoicemodel->getInvoice($parameters);
    }
}
