<!-- Every page will need to start a session to know the user's state 
     The session variable is: $_SESSION['CurrentUser'] -->
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Books and Tutors SFSU</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo URL . 'css/bootstrap.min.css' ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo URL . 'css/shop-homepage.css' ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="student-warning">SFSU Software Engineering Project, Summer 2016.  For Demonstration Only</div>
            <div class="container">
                <div class="row">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-nav">
                        <a class="navbar-brand">
                            <a href="<?php echo URL; ?>">
                                <img src="<?php echo URL . '/img/logo.png' ?>" />
                            </a>
                        </a>
                        <div class="navbar-header hamburger">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                    <div class="header-search">
                        <form action="<?php echo URL; ?>searchproducts/index" method="GET" class="nav-form">
                            <div class="input-group header-searchbardiv">
                                <div class="form-group has-feedback">
                                    <div>
                                        <input type="text" class="form-control" name="searchinput" placeholder="Search for books, tutors and more!"/>
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                        <select name='category_id'>
                                        <option value="1">Books</option>
                                        <option value="2">Tutors</option>
                                        <option value="3">Electronics</option>
                                        <option value="4">Entertainment</option>
                                        <option value="5">Clothing</option>
                                        <option value="6">Furniture</option>
                                        <option value="7">Other</option>                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="header-buttons">
                            <ul class="nav navbar-nav">                                                      
                                <?php if (isset($_SESSION['CurrentUser'])) : ?>
                                    <li>
                                        <a href="<?php echo URL; ?>products"><span class="glyphicon glyphicon-usd" aria-hidden="true" style="color:#E2AF2D"></span> Sell an Item</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URL; ?>cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color:#E2AF2D"></span> Cart</a>
                                    </li>  
                                    <li>
                                        <div class="dropdown pull-right">
                                            <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                <span class="glyphicon glyphicon-user" aria-hidden="true" style="color:#E2AF2D"></span>
                                                Hello, Name
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu header-dropdown">
                                                <li><a href="<?php echo URL . 'customers/editcustomer/' . htmlspecialchars($_SESSION['CurrentUser'], ENT_QUOTES, 'UTF-8'); ?>">Profile</a></li>
                                                <li><a href="<?php echo URL . 'searchproducts/getuserproducts/' . htmlspecialchars($_SESSION['CurrentUser'], ENT_QUOTES, 'UTF-8'); ?>">Items for Sale</a></li>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo URL; ?>signout/destroySession">Sign Out</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php else : ?>
                                    <li>
                                        <a href="<?php echo URL; ?>signin">Sign In or Register</a>
                                    </li>
                                <?php endif; ?> 
                            </ul>
                        </div>
                        <?php if (isset($_SESSION['CurrentUser'])) : ?>

                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </nav>