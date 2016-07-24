<div class="container">
    <h2>CART</h2>
    <!-- cart testing -->                  
    <div class="box">         
        <form action="<?php echo URL; ?>cart/addItem" method="POST">
            <label for='pid' >Item PID: </label>
            <input type='text' name='pid' id='pid' value="" required />
            <label for='qty' >Item Quantity: </label>
            <input type='text' name='qty' id='qty' value="" required />
            <input type='submit' name='submit_add_item' value='Submit' />
        </form>
    </div>
    <div class="box">         
        <form action="<?php echo URL; ?>cart/removeItem" method="POST">
            <label for='pid' >Item PID: </label>
            <input type='text' name='pid' id='pid' value="" required />
            <input type='submit' name='submit_delete_item' value='DeleteItem' />
        </form>
    </div>
    <!-- cart listing -->
    <div class="box">
        <h3>List of items in cart of user id# <?php if (isset($_SESSION['CurrentUser'])) echo $_SESSION['CurrentUser']; ?></h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Cart Id</td>
                    <td>Item Id</td>
                    <td>Qty</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $cart_item) { ?>
                    <tr>
                        <td><?php if (isset($cart_item->cart_id)) echo htmlspecialchars($cart_item->cart_id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($cart_item->product_id)) echo htmlspecialchars($cart_item->product_id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($cart_item->item_qty)) echo htmlspecialchars($cart_item->item_qty, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <?php foreach ($products as $product) { ?>
            <!--<div class="col-sm-4 col-lg-4 col-md-4">-->
            <div class="thumbnail">                                                                          
                <div class="caption">
                    <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">                            
                        <div class="search-image">
                            <?php
                            if (isset($product->img1))
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
                            ?>                                   
                        </div>
                        <div class="search-data">
                            <h4>
                                <?php
                                if (isset($product->name))
                                    echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                                ?></a></h4>
                            <h5>
                                <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                            </h5>
                            <!--<br /><br /><input type="button" value="Add to cart" class="btn btn-primary"/>-->
                        <!--<p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>-->
                        </div>
                </div>
            </div>
            <!--</div>-->
        <?php } ?>
    </div>
</div>