<?php
$subtotal = 0;
$tax = 0.09;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div clss="box">
                <h3>Your items for sale</h3>
                <table>
                    <thead style="background-color: #ddd; font-weight: bold;">
                        <tr>
                            <td>Item</td>                
                            <td></td> 
                            <td></td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?php if (isset($product->img1) && $product->img1 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="42" width="42" />'; ?></td>                    
                                <td><?php if (isset($product->name)) echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></td>                   
                                <td><?php if (isset($product->price)) {
                            $price = htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8');
                            echo $price;
                        } ?></td>                                       
                                <td><?php if (isset($product->qty)) {
                                $quantity = htmlspecialchars($product->qty, ENT_QUOTES, 'UTF-8');
                                echo $quantity;
                            } ?></td>   
                                <td><?php $total = $price * $quantity;
                            echo number_format((float) $total, 2, '.', ''); ?></td>
    <?php $subtotal += $total; ?>
                            </tr>
<?php } ?> 

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight:bold">Subtotal:</td>
                            <td></td>
                            <td><?php echo number_format((float) $subtotal, 2, '.', '') ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight:bold">Tax:</td>
                            <td></td>
                            <td><?php echo number_format((float) $subtotal * $tax, 2, '.', '') ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="font-weight:bold">Total:</td>
                            <td></td>
                            <td><?php echo number_format((float) $subtotal + ($subtotal * $tax), 2, '.', '') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br />
            <div class="row">
                <form action="<?php echo URL; ?>payment/finishtransaction" method="POST">
                    <h4 class="title">Payment</h4>
                    <div id="loginbox" class="loginbox">  
                        <div>
                            <div class="col-sm-3">
                                <label>Credit Card Type</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='cardtype' id='cardtype' value="" required /> 
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Credit Card Number</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='cardnumber' id='cardnumber' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Expiration Date</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='expdate' id='expdate' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Security Code</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='securitycode' id='securitycode' value="" required />
                            </div>
                        </div>
                        <div class="clear"> </div>
                        <!--                    <a class="news-letter" href="#">
                                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                                            </a>-->
                        <div class="clear"> </div>
                    </div>
                    <h4 style="visibility: hidden">-</h4>
                    <h4 class="title">Billing Information</h4>
                    <div>
                        <div class="col-sm-3">
                            <label>Street Address</label>
                        </div>
                        <div class="col-sm-9">
                            <input type='text' name='street' id='street' value="<?php echo htmlspecialchars($customer->street, ENT_QUOTES, 'UTF-8'); ?>" required />
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-3">
                            <label>City</label>
                        </div>
                        <div class="col-sm-9">
                            <input type='text' name='city' id='city' value="<?php echo htmlspecialchars($customer->city, ENT_QUOTES, 'UTF-8'); ?>" required />
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Zip Code</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='zipcode' id='zipcode' value="<?php echo htmlspecialchars($customer->zipcode, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                        </div>
                        <div class="clear"> </div>
                        <h4 style="visibility: hidden">-</h4>
                        <input type='submit' name='submit_payment' value='Submit' class="btn btn-primary" />
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>