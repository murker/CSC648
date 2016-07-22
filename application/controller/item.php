<?php
/**
 * Class Item
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Item extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/products/index
     */
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/item/index.php';
        require APP . 'view/_templates/footer.php';
    }
}