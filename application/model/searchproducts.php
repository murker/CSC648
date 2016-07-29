<?php

class SearchProductsModel {

    public $searchproductsmodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/searchproducts.php';
        $this->searchproductsmodel = new SearchProductsModelxl();
    }

    public function searchProduct($searchword, $category_id) {
        return $this->searchproductsmodel->searchProduct($searchword, $category_id);
    }

    public function getuserProducts($user_id) {
        $parameters = array(':user_id' => $user_id);
        return $this->searchproductsmodel->getuserProducts($parameters);
    }
}
