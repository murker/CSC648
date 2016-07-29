<?php

class CustomerModel
{
    public $customermodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/customers.php';
        $this->customermodel = new CustomerModelxl();
    }

     /**
     * Get all customers from database
     */
    public function getAllCustomers()
    {
        return $this->customermodel->getAllCustomers();
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
        return $this->customermodel->addCustomer($firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode);
    }

    /**
     * Delete a customer in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $customer_id Id of customer
     */
    public function deleteCustomer($customer_id)
    {
        return $this->customermodel->deleteCustomer($customer_id);
    }

    /**
     * Get a customer from database
     */
    public function getCustomer($customer_id)
    {
        return $this->customermodel->getCustomer($customer_id);
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
        return $this->customermodel->updateCustomer($firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode, $customer_id);
    }
    
    public function getAmountOfCustomers()
    {
        return $this->customermodel->getAmountOfCustomers();
    }
    
    public function signinCustomer($email, $password)
    {
        return $this->customermodel->signinCustomer($email, $password);
    }

}
