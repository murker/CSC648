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
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function sortbypriceAsc()
    {
        $products = $this->homemodel->sortbyPriceAsc();
        require APP . 'view/_templates/header.php';
        require APP . 'view/sort/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function sortbypriceDesc()
    {
        $products = $this->homemodel->sortbyPriceDesc();
        require APP . 'view/_templates/header.php';
        require APP . 'view/sort/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function sortbyCategory()
    {
        $category = 1;
        if (isset($_POST["submit_sortbyCategory"])) {
            if (isset($_POST["submit_sortbyBooks"])){
            $category = 1;
            }
            if (isset($_POST["submit_sortbyTutors"])){
            $category = 2;
            }
            if (isset($_POST["submit_sortbyElectronics"])){
            $category = 3;
            }
            if (isset($_POST["submit_sortbyEntertainment"])){
            $category = 4;
            }
            if (isset($_POST["submit_sortbyClothing"])){
            $category = 5;
            }
            if (isset($_POST["submit_sortbyFurniture"])){
            $category = 6;
            }
            if (isset($_POST["submit_sortbyMisc"])){
            $category = 7;
            }
        }
        $products = $this->homemodel->sortbyCategory($category);
        require APP . 'view/_templates/header.php';
        require APP . 'view/sort/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
