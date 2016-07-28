<?php
$subtotal = 0;
$tax = 0.09;
?>
<div class="container">
    <div class="box row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3>Checkout</h3>
            <table>
                <thead style="background-color: #ddd; font-weight: bold;">
                    <tr>
                        <td>Image1</td>                
                        <td>ID</td>
                        <td>Item</td>          
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php if (isset($product->img1) && $product->img1 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="42" width="42" />'; ?></td>                    
                            <td><?php if (isset($product->id)) echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php if (isset($product->name)) echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></td>                   
                            <td><?php
                                if (isset($product->price)) {
                                    $price = htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8');
                                    echo $price;
                                }
                                ?></td>                                       
                            <td align="center"><?php
                                if (isset($product->qty)) {
                                    $quantity = htmlspecialchars($product->qty, ENT_QUOTES, 'UTF-8');
                                    echo $quantity;
                                }
                                ?></td>   
                            <td><?php
                                $total = $price * $quantity;
                                echo number_format((float) $total, 2, '.', '');
                                ?></td>
                            <?php $subtotal += $total; ?>
                        </tr>
                    <?php } ?> 

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Subtotal:</td>
                        <td></td>
                        <td><?php echo number_format((float) $subtotal, 2, '.', '') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Tax:</td>
                        <td></td>
                        <td><?php echo number_format((float) $subtotal * $tax, 2, '.', '') ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td></td>
                        <td><?php echo number_format((float) $subtotal + ($subtotal * $tax), 2, '.', '') ?></td>
                    </tr>
                </tbody>
            </table>
            <form class = "form-horizontal" action="<?php echo URL; ?>payment/createinvoice" method="POST">
                <h4 class="title">Payment</h4>
                <br />
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Card Type</label>
                    <div class="col-sm-6">
                        <input class="form-control" type='text' name='cardtype' id='cardtype' value="Visa" required /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Card Number</label>
                    <div class="col-sm-6">
                        <input class="form-control" type='text' name='cardnumber' id='cardnumber' value="123456789" required />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Expiration Date</label>
                    <div class="col-sm-2">
                        <input class="form-control" type='text' name='expdate' id='expdate' value="07/01" required />
                    </div>
                    <label  class="col-sm-2 control-label">Security Code</label>
                    <div class="col-sm-2">
                        <input class="form-control" type='text' name='securitycode' id='securitycode' value="999" required />
                    </div>
                </div>
                <hr />
                <h4 class="title">Billing information</h4>
                <br />
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Street Address</label>
                    <div class="col-sm-6">
                        <input class="form-control" type='text' name='street' id='street' value="<?php echo htmlspecialchars($customer->street, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">City</label>
                    <div class="col-sm-3">
                        <input class="form-control" type='text' name='city' id='city' value="<?php echo htmlspecialchars($customer->city, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <label  class="col-sm-1 control-label">Zip</label>
                    <div class="col-sm-2">
                        <input class="form-control" type='text' name='zipcode' id='zipcode' value="<?php echo htmlspecialchars($customer->zipcode, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <input type='submit' name='submit_create_invoice' value='Submit' class="btn btn-primary" />
            </form>
        </div>   
    </div>
</div>

