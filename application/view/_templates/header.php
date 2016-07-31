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
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="col-sm-3">
                        <a class="" href="<?php echo URL; ?>">
                            <img src="<?php echo URL . '/img/logo.png' ?>" class="header-logo img-responsive"/>
                        </a>
                    </div>
                    <div class="col-sm-6 header-search">
                        <div class="row">
                            <form action="<?php echo URL; ?>searchproducts/index" method="GET">
                                <select name='category_id' class="col-xs-2 col-xs-offset-1">
                                    <option value="0">All</option>
                                    <option value="1">Books</option>
                                    <option value="2">Tutors</option>
                                    <option value="3">Electronics</option>
                                    <option value="4">Entertainment</option>
                                    <option value="5">Clothing</option>
                                    <option value="6">Furniture</option>
                                    <option value="7">Other</option>                                        
                                </select>
                                <input type="text" class="col-xs-7" name="searchinput" placeholder="Search for books, tutors and more!"/>
                                <div class="col-xs-2"></div>
                                <button action class="btn col-xs-1" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12 header-buttons collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php if (isset($_SESSION['CurrentUser'])) : ?>
                            <div class="dropdown pull-right header-buttons">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true" style="color:#E2AF2D"></span>
                                    Hello, <?php echo htmlspecialchars($_SESSION['UserName']); ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu header-dropdown">
                                    <li><a href="<?php echo URL . 'customers/editcustomer/' . htmlspecialchars($_SESSION['CurrentUser'], ENT_QUOTES, 'UTF-8'); ?>">Profile</a></li>
                                    <li><a href="<?php echo URL . 'searchproducts/getuserproducts/' . htmlspecialchars($_SESSION['CurrentUser'], ENT_QUOTES, 'UTF-8'); ?>">Items for Sale</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo URL; ?>signout/destroySession">Sign Out</a></li>
                                </ul>
                            </div>
                            <div class="header-buttons" style="clear:both">
                                <ul class="nav navbar-nav pull-right">   
                                    <li>
                                        <a href="<?php echo URL; ?>products"><span class="glyphicon glyphicon-usd" aria-hidden="true" style="color:#E2AF2D"></span> Sell</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URL; ?>cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color:#E2AF2D"></span> Cart</a>
                                    </li> 
                                </ul>
                            </div>
                        <?php else : ?>
                            <form action="<?php echo URL; ?>signin" class="pull-right">
                                <button>Sign In or Register</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (isset($_SESSION['CurrentUser'])) : ?>

                <?php endif; ?> 
                <div class="header-slogan">Providing students with an easy place to buy and sell books, tutors, and more!
                    <span class="pull-right">SFSU Software Engineering Project, Summer 2016.  For Demonstration Only</span>
                </div>
            </div>
        </nav>