<?php

class SearchProductsModel {

    public $searchproductsmodel= null;
    
    function __construct($db) {
        
        require APP . 'dbcalls/searchproducts.php';
        $this->searchproductsmodel = new SearchProductsModelxl();
    }

    public function searchProduct($searchword, $category_id) {
        return $this->searchproductsmodel->searchProduct($searchword, $category_id);
    }

    public function getuserProducts($user_id) {
        return $this->searchproductsmodel->getuserProducts($user_id);
    }
}
