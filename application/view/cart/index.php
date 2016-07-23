<div class="container">
    <h2>CART</h2>
    <!-- cart testing -->                  
    <div class="box">         
        <form action="<?php echo URL; ?>cart/addItem" method="POST">
            <label for='cid' >Cart ID: </label>
            <input type='text' name='cid' id='cid' value="" required />
            <label for='pid' >Item PID: </label>
            <input type='text' name='pid' id='pid' value="" required />
            <label for='qty' >Item Quantity: </label>
            <input type='text' name='qty' id='qty' value="" required />
            <input type='submit' name='submit_add_item' value='Submit' />
        </form>
    </div>
    <div class="box">         
        <form action="<?php echo URL; ?>cart/removeItem" method="POST">
            <label for='cid' >Cart ID: </label>
            <input type='text' name='cid' id='cid' value="" required />
            <label for='pid' >Item PID: </label>
            <input type='text' name='pid' id='pid' value="" required />
            <input type='submit' name='submit_delete_item' value='DeleteItem' />
        </form>
    </div>
    <!-- cart listing -->
    <div class="box">
        <h3>List items in cart</h3>
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