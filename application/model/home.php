
<?php

class HomeModel {

    public $homemodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->homemodel = new Sqlcalls();
    }

    public function getAllProducts() {        
        return $this->homemodel->getAllProducts();
    }
    
//    public function getAllProducts() {     
//        $customer_id = "";
//        $name = "";
//        $description = "";
//        $price = "";
//        $stock_qty = "";
//        $category_id = "";
//        $img1 = "";
//        $img2 = "";
//        $img3 = "";
//        $img4 = "";
//        $val = array(':customer_id' => $customer_id,
//            ':name' => $name,
//            ':description' => $description,
//            ':price' => $price,
//            ':stock_qty' => $stock_qty,
//            ':category_id' => $category_id,
//            ':img1' => $img1,
//            ':img2' => $img2,
//            ':img3' => $img3,
//            ':img4' => $img4);  
//        $target = array();
//        return $this->homemodel->getAllEntries("product", $val, $target);
//    }

    public function sortbyCategory($category) {
        $parameters = array(':category' => $category);
        return $this->homemodel->sortbyCategory($parameters);
    }

    public function sortby($column, $order) {
        return $this->homemodel->sortby($column, $order);
    }

    public function sortbyW($column, $order, $searchword) {
        $parameters = array(':searchword' => $searchword);
        return $this->homemodel->sortbyW($column, $order, $parameters);
    }

    public function sortbyWc($column, $order, $searchword, $category_id) {
        $parameters = array(':searchword' => $searchword,
            ':category_id' => $category_id);
        return $this->homemodel->sortbyWc($column, $order, $parameters);
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
