<?php

if (!isset($_SESSION)) {
    session_start();
}
?>

<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $products = $this->homemodel->getAllProducts();
        $_SESSION['searchword'] = "";
        $_SESSION['category_id'] = 0;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function sort()            
    {
        $searchword = $_SESSION['searchword'];
        $category_id = $_SESSION['category_id'];
        $sortby = $_GET["sortby"];  
        
        if ($sortby == "best-match") {         
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortbyBestmatch();
            }elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyBestmatchW($searchword);
            }elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyBestmatchWc($searchword, $category_id);
            }                
        }
        if ($sortby == "date-old-new"){          
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortbyOldestNewest();
            }elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyOldestNewestW($searchword);
            }elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyOldestNewestWc($searchword, $category_id);
            }
        }
        if ($sortby == "date-new-old"){
             if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortbyNewestOldest();
            }elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyNewestOldestW($searchword);
            }elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyNewestOldestWc($searchword, $category_id);
            }
        }
        if ($sortby == "price-low-high"){
             if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortbyPriceAsc();
            }elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyPriceAscW($searchword);
            }elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyPriceAscWc($searchword, $category_id);
            }
        }
        if ($sortby == "price-high-low"){
             if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortbyPriceDesc();
            }elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyPriceDescW($searchword);
            }elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyPriceDescWc($searchword, $category_id);
            }
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function sortbyCategory()
    {
        $category = 0;
        if (isset($_GET["submit_sortbyBooks"])){
        $category = 1;
        }else if (isset($_GET["submit_sortbyTutors"])){
        $category = 2;
        }else if (isset($_GET["submit_sortbyElectronics"])){
        $category = 3;
        }else if (isset($_GET["submit_sortbyEntertainment"])){
        $category = 4;
        }else if (isset($_GET["submit_sortbyClothing"])){
        $category = 5;
        }else if (isset($_GET["submit_sortbyFurniture"])){
        $category = 6;
        }else if (isset($_GET["submit_sortbyOther"])){
        $category = 7;
        }
        $products = $this->homemodel->sortbyCategory($category);
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }     
}
