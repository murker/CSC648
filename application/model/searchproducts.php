<?php

class SearchProductsModel {

    public $searchproductsmodel = null;

    function __construct() {
        require APP . 'dbcalls/searchproducts.php';
        $this->searchproductsmodel = new SearchProductsModelxl();
    }

    public function searchProductW($searchword) {
        $parameters = array(':searchword' => $searchword);
        return $this->searchproductsmodel->searchProductW($parameters);
    }

    public function searchProductWc($searchword, $category_id) {
        $parameters = array(':searchword' => $searchword,
            ':category_id' => $category_id);
        return $this->searchproductsmodel->searchProductWc($parameters);
    }

    public function getuserProducts($user_id) {
        $parameters = array(':user_id' => $user_id);
        return $this->searchproductsmodel->getuserProducts($parameters);
    }
}
