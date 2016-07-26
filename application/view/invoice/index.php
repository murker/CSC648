<td><form action="<?php echo URL; ?>invoice/getinvoice" method="GET">
                   <input type='submit' name='getInvoice' value="show invoice" id="searchButton" />
                </form></td>
<td><form action="<?php echo URL; ?>invoice/sendbuyerConfirmation" method="GET">
                   <input type='submit' name='sendInvoice' value="send Email" id="searchButton" />
                </form></td>


<div class="container">
    <div>
        <h3>Invoice</h3>       
        <label>Customer_id: </label>
        <?php echo htmlspecialchars($invoice->customer_id, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Cart_id: </label>
        <?php echo htmlspecialchars($invoice->cart_id, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Total: </label>
        <?php echo htmlspecialchars($invoice->total, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Shipping cost: </label>
        <?php echo htmlspecialchars($invoice->order_date, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Shipping cost: </label>
        <?php echo htmlspecialchars($invoice->shipping_cost, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Tax: </label>
        <?php echo htmlspecialchars($invoice->tax, ENT_QUOTES, 'UTF-8'); ?><br>
        <label>Total: </label>
        <?php echo htmlspecialchars($invoice->grand_total, ENT_QUOTES, 'UTF-8'); ?><br>
    </div>
</div>
                
This invoice has been sent to your email(<?php echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?><br>).
Thank you for shopping with us.

