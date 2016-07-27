<div class="container">
    <div>
        <td><form action="<?php echo URL; ?>invoice/getInvoice" method="GET">
                <input type='submit' name='getInvoice' value="show invoice" id="searchButton" />
            </form></td>
        <p>Set to my personal sfsu email for testing. It works. To test go to controller and edit email to and from. This buttons will go away once sfsu email checking is implemented.</p>                
        <td><form action="<?php echo URL; ?>invoice/sendsellerConfirmation" method="GET">
                <input type='submit' name='sendsellerConfirmation' value="send seller confirmation Email" id="searchButton" />
            </form></td>
        <td><form action="<?php echo URL; ?>invoice/sendbuyerConfirmation" method="GET">
                <input type='submit' name='sendbuyerConfirmation' value="send buyer confirmation Email" id="searchButton" />
            </form></td>
    </div>
    <div>
        <h3>Invoice</h3>       
        <label>Customer_id: </label>
        <?php if (isset($invoice->customer_id)) echo htmlspecialchars($invoice->customer_id, ENT_QUOTES, 'UTF-8'); ?><br>    
        <label>Cart_id: </label>
        <?php if (isset($invoice->cart_id)) echo htmlspecialchars($invoice->cart_id, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Total: </label>
        <?php if (isset($invoice->total)) echo htmlspecialchars($invoice->total, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Shipping cost: </label>
        <?php if (isset($invoice->order_date)) echo htmlspecialchars($invoice->order_date, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Shipping cost: </label>
        <?php if (isset($invoice->shipping_cost)) echo htmlspecialchars($invoice->shipping_cost, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Tax: </label>
        <?php if (isset($invoice->tax)) echo htmlspecialchars($invoice->tax, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Total: </label>
        <?php if (isset($invoice->grand_total)) echo htmlspecialchars($invoice->grand_total, ENT_QUOTES, 'UTF-8'); ?><br>
    </div>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo URL . '/img/logo.png' ?>" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: July 27, 2016<br>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Books and Tutors, Inc.<br>
                                1600 Holloway Ave<br>
                                San Francisco, CA 94132
                            </td>                                                       
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Asus ubuntu/win10 8gb ram
                </td>
                
                <td>
                    $300.00
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Acer laptop winxp
                </td>
                
                <td>
                    $75.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Database 675 book
                </td>
                
                <td>
                    $10.00
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: $385.00
                </td>
            </tr>
        </table>
    </div>
    This invoice has been sent to your email <?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?><br>
    Thank you for shopping with us.
</div>


