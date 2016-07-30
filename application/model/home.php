
<?php

class HomeModel {

    public $homemodel= null;
    
    function __construct() {
        
        require APP . 'dbcalls/home.php';
        $this->homemodel = new HomeModelxl();
    }

    public function getAllProducts() {
        return $this->homemodel->getAllProducts();
    }

    public function sortbyCategory($category) {
        $parameters = array(':category' => $category);
        return $this->homemodel->sortbyCategory($parameters);
    }

    public function sortbyPriceAsc() {
        return $this->homemodel->sortbyPriceAsc();
    }
    
    public function sortbyPriceAscW($searchword) {
        $parameters = array(':searchword' => $searchword);
        return $this->homemodel->sortbyPriceAscW($parameters);
    }
    
    public function sortbyPriceAscWc($searchword, $category_id) {
        $parameters = array(':searchword' => $searchword, 
            ':category_id' => $category_id);
        return $this->homemodel->sortbyPriceAscWc($parameters);
    }
    
    public function sortbyPriceDesc() {
        return $this->homemodel->sortbyPriceDesc();
    }
    
    public function sortbyPriceDescW($searchword) {
        $parameters = array(':searchword' => $searchword);
        return $this->homemodel->sortbyPriceDescW($parameters);
    }
    
    public function sortbyPriceDescWc($searchword, $category_id) {
        $parameters = array(':searchword' => $searchword, 
            ':category_id' => $category_id);
        return $this->homemodel->sortbyPriceDescWc($parameters);
    }

    public function sortbyOldestNewest() {
        return $this->homemodel->sortbyOldestNewest();
    }
    
    public function sortbyOldestNewestW($searchword) {
        $parameters = array(':searchword' => $searchword);
        return $this->homemodel->sortbyOldestNewestW($parameters);
    }
    
    public function sortbyOldestNewestWc($searchword, $category_id) {
        $parameters = array(':searchword' => $searchword, 
            ':category_id' => $category_id);
        return $this->homemodel->sortbyOldestNewestWc($parameters);
    }
    
    public function sortbyNewestOldest() {
        return $this->homemodel->sortbyNewestOldest();
    }
    public function sortbyNewestOldestW($searchword) {
        $parameters = array(':searchword' => $searchword);       
        return $this->homemodel->sortbyNewestOldestW($parameters);
    }
    public function sortbyNewestOldestWc($searchword, $category_id) {
        $parameters = array(':searchword' => $searchword, 
            ':category_id' => $category_id);
        return $this->homemodel->sortbyNewestOldestWc($parameters);
    }
    public function sortbysortbyBestmatch() {
        return $this->homemodel->sortbysortbyBestmatch();
    }    
    public function sortbysortbyBestmatchW($searchword) {
        $parameters = array(':searchword' => $searchword);
        return $this->homemodel->sortbysortbyBestmatchW($parameters);
    }
    public function sortbysortbyBestmatchWc($searchword, $category_id) {
        $parameters = array(':searchword' => $searchword, 
            ':category_id' => $category_id);
        return $this->homemodel->sortbysortbyBestmatchWc($parameters);
    }

}
