<?php
/**
 * Class Products
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Products extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/products/index
     */
    public function index()
    {

        $products = $this->productsmodel->getAllProducts();

        /// load views. within the views we can echo out $products and $amount_of_customers easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addProduct
     * This method handles what happens when you move to http://yourproject/products/product
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a product" form on products/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to products/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addProduct()
    {
        // if we have POST data to create a new product entry
        if (isset($_POST["submit_add_product"])) {
            // do addProduct() in model/model.php
            $image = file_get_contents($_FILES['imageToUpload']['tmp_name']);
            $image2 = file_get_contents($_FILES['imageToUpload2']['tmp_name1']);
            $image3 = file_get_contents($_FILES['imageToUpload3']['tmp_name2']);
            $image4 = file_get_contents($_FILES['imageToUpload4']['tmp_name3']);
            $this->productsmodel->addProduct($_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock_qty"], $_POST["category_id"], $image, $image2, $image3, $image4);
        }

        // where to go after product has been added
        header('location: ' . URL . 'products/index');
    }

    /**
     * ACTION: deleteProduct
     * This method handles what happens when you move to http://yourproject/products/deleteproduct
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a product" button on products/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to products/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $product_id Id of the to-delete product
     */
    public function deleteProduct($product_id)
    {
        // if we have an id of a customer that should be deleted
        if (isset($product_id)) {
            // do deleteCustomer() in model/model.php
            $this->productsmodel->deleteProduct($product_id);
        }

        // where to go after product has been deleted
        header('location: ' . URL . 'products/index');
    }

     /**
     * ACTION: editProduct
     * This method handles what happens when you move to http://yourproject/products/editproduct
     * @param int $product_id Id of the to-edit customer
     */
    public function editProduct($product_id)
    {
        // if we have an id of a product that should be edited
        if (isset($product_id)) {
            // do getProduct() in model/model.php
            $product = $this->productsmodel->getProduct($product_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $customer easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/products/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to products index page (as we don't have a customer_id)
            header('location: ' . URL . 'products/index');
        }
    }
    
    /**
     * ACTION: updateProduct
     * This method handles what happens when you move to http://yourproject/products/updateproduct
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a product" form on customers/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to products/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateProduct()
    {
        // if we have POST data to create a new Product entry
        if (isset($_POST["submit_update_product"])) {
            // do updateProduct() from model/model.php
            $this->productsmodel->updateProduct($_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock_qty"], $_POST["category_id"], $_POST["product_id"]);
        }

        // where to go after product has been added
        header('location: ' . URL . 'products/index');
    }

}