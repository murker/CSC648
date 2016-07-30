
<?php

class HomeModel {

    public $homemodel = null;

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
