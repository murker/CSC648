<div class="container">
    <!--    
        <div class="search-image">
    <?php
    if (isset($product->img1))
        echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
    else
        echo '<img src="<' . URL . '/img/imagenotfound.png" />';
    ?>                                   
        </div>
        <div class="search-data">
            <h4>
    
        </div>-->
    <div class="row">
        <div class="col-sm-4">
            <?php
            if (isset($product->img1))
                echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" class = "img-thumbnail img-responsive"/>';
            ?>  
        </div>
        <div class ="col-sm-7">
            <h3><?php
                if (isset($product->name))
                    echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                ?>
            </h3>
            <h4>
                <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
            </h4>
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
                        <input type="button" value="Buy It Now" class = "btn btn-primary"/>
                    <?php endif; ?> 
                    <h6 style="visibility: hidden">-</h6>
                    <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                </form> 
                <?php if ($product->category_id == 2) : ?>
                    <h3>Contact</h3>
                    <p>To contact me please use the contact form below.</p>
                    <form name="contactform" method="POST" action="">
                        <table width="450px">
                            <tr>
                                <td valign="top">
                                    <label for="first_name">First Name *</label>
                                </td>
                                <td valign="top">
                                    <input  type="text" name="first_name" maxlength="50" size="30" value = "<?php if (isset($customer->firstname)) echo htmlspecialchars($customer->firstname, ENT_QUOTES, 'UTF-8'); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"">
                                    <label for="last_name">Last Name *</label>
                                </td>
                                <td valign="top">
                                    <input  type="text" name="last_name" maxlength="50" size="30" value = "<?php if (isset($customer->lastname)) echo htmlspecialchars($customer->lastname, ENT_QUOTES, 'UTF-8'); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="email">Email Address *</label>
                                </td>
                                <td valign="top">
                                    <input  type="text" name="email" maxlength="80" size="30" value = "<?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="telephone">Telephone Number *</label>
                                </td>
                                <td valign="top">
                                    <input  type="text" name="telephone" maxlength="30" size="30" value = "<?php if (isset($customer->phone)) echo htmlspecialchars($customer->phone, ENT_QUOTES, 'UTF-8'); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="comments">Comments *</label>
                                </td>
                                <td valign="top">
                                    <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center">
                                    <input type="submit" value="Submit">   
                                </td>
                            </tr>
                        </table>
                    </form>           
                <?php endif; ?>
     </div>
    </div>
</div>