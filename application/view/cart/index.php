<div class="container">

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
                <h3>Shopping Cart</h3>
            <?php foreach ($products as $product) { ?>
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
                                <form action="<?php echo URL; ?>cart/itemButton" method="POST">
                                    <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                                    <br />
                                    <label for='pid' >Quantity </label>
                                    <input type='text' class="quantity-text" name='qty' id='qty' value=<?php echo $product->qty; ?> required />
                                    <br />
                                    <input type="hidden" name="pid" value=<?php echo $product->id; ?>>
                                    <input type="submit" name='Update' value="Update Qty" class="btn btn-default"/>
                                    <input type="submit" name='Delete' value="Delete" class="btn btn-danger"/>
                                </form>
                      <!--<p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>-->
                            </div>
                    </div>
                </div>
                <!--</div>-->
            <?php } ?>

        <br />
        <form action="<?php echo URL; ?>payment" method="GET">
            <input type='submit' name='payment' value="Checkout" class="btn btn-primary" />
        </form>
                </div>
    </div>
    <!-- cart testing -->
    <h2>DEBUG INTERFACE</h2>
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
    <div class="box">         
        <form action="<?php echo URL; ?>cart/createInvoice" method="POST">
            <input type='submit' name='submit_create_invoice' value='Create Invoice' />
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
</div>