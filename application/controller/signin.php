<!-- Every page will need to start a session to know the user's state 
     The session variable is: $_SESSION['CurrentUser'] -->
<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<?php

/**
 * Class SignIn
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class SignIn extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/customers/index
     */
    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/signin/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: signinCustomer
     * This method handles what happens when customer signs in
     */
public function signinCustomer() {
        if (isset($_POST["signincustomer"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $match = $this->signinmodel->signinCustomer($email, $password);

            // if user fails to login, send them to sign in page
            if ($match->email == $email) {
                $_SESSION['CurrentUser'] = $email;  // create session for user             
                header('location: ' . URL . 'home');
            } else {
                echo "Wrong credentials"; // still doesnt work. may need to create a js script for alert message
                header('location: ' . URL . 'signin');
            }
        }
        
        // i want to call this to terminate session
        if(isset($_GET['logout'])) {
            session_unset();
            session_destroy();
        }
    }

}
?>
