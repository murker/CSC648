<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
            <?php
            if (isset($product->img1) && $product->img1 != "")
                echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" class = "img-thumbnail img-responsive pull-left"/>';
            ?>
            <?php if ($product->category_id != 2) : ?>
                <?php
                if (isset($product->img2) && $product->img2 != "")
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img2) . '" class = "img-thumbnail img-responsive sub-image" style="clear:left" />';
                ?>
                <?php
                if (isset($product->img3) && $product->img3 != "")
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img3) . '" class = "img-thumbnail img-responsive sub-image"/>';
                ?>
                <?php
                if (isset($product->img4) && $product->img4 != "")
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img4) . '" class = "img-thumbnail img-responsive sub-image"/>';
                ?>
            <?php endif; ?>
        </div>
        <div class ="col-sm-6">
            <h3><?php
                if (isset($product->name))
                    echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                ?>
            </h3>
            <h4>
                <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>            
            <?php if ($product->category_id == 2) : ?>
            / hour
            <?php endif ; ?></h4>
            <?php if (isset($_SESSION['CurrentUser'])) : ?>
                <form action="<?php echo URL; ?>cart/additem" method="POST">
                <?php else : ?>
                    <form action="<?php echo URL; ?>signin" method="GET">
                    <?php endif; ?>                    
                    <?php if ($product->category_id != 2) : ?> 
                        <span class = "quantity"><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?> available</span>
                        <br /> <br />
                        <label for='qty' >Quantity: </label>
                        <input type='text' name='qty' value="1" class="quantity-text" required />
                        <br />
                        <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" name="submit_add_item" value="Add to cart" class = "btn btn-warning" />     
                        <input type="submit" name="submit_buyitnow" value="Buy It Now" class = "btn btn-primary"/>
                    <?php endif; ?> 
                    <br /><br />
                    <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                </form> 
                <?php if ($product->category_id == 2) : ?>                    
                    <br />
                    <h4>Contact</h4>
                    <p>Please use the form below to contact this tutor</p>
                    <form class="form-horizontal" name="contactform" method="POST" action="<?php echo URL; ?>item/emailtutor">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input  class="form-control" type="text" name="first_name" maxlength="50" size="30" value = "<?php if (isset($customer->firstname)) echo htmlspecialchars($customer->firstname, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input  class="form-control" type="text" name="last_name" maxlength="50" size="30" value = "<?php if (isset($customer->lastname)) echo htmlspecialchars($customer->lastname, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input  class="form-control" type="text" name="email" maxlength="80" size="30" value = "<?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-8">
                                <input  class="form-control" type="text" name="telephone" maxlength="30" size="30" value = "<?php if (isset($customer->phone)) echo htmlspecialchars($customer->phone, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Comments</label>
                            <div class="col-sm-8">
                                <textarea  class="form-control" name="comments" maxlength="1000" cols="25" rows="6" required></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">   
                    </form>           
                <?php endif; ?>
        </div>
    </div>
</div>