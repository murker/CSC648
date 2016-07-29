<?php

if (!isset($_SESSION)) {
    session_start();
}
?>



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
        return $this->homemodel->sortbyCategory($category);
    }

    public function sortbyPriceAsc() {
        return $this->homemodel->sortbyPriceAsc();
    }

    public function sortbyPriceDesc() {
        return $this->homemodel->sortbyPriceDesc();
    }

    public function sortbyOldestNewest() {
        return $this->homemodel->sortbyOldestNewest();
    }

    public function sortbyNewestOldest() {
        return $this->homemodel->sortbyNewestOldest();
    }
    public function sortbysortbyBestmatch() {
        return $this->homemodel->sortbysortbyBestmatch();
    }

}
