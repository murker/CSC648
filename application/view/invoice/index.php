<td><form action="<?php echo URL; ?>invoice/getInvoice" method="GET">
                   <input type='submit' name='getInvoice' value="show invoice" id="searchButton" />
                </form></td>
<td><form action="<?php echo URL; ?>invoice/sendsellerConfirmation" method="GET">
                   <input type='submit' name='sendsellerConfirmation' value="send seller confirmation Email" id="searchButton" />
                </form></td>
<td><form action="<?php echo URL; ?>invoice/sendbuyerConfirmation" method="GET">
                   <input type='submit' name='sendbuyerConfirmation' value="send buyer confirmation Email" id="searchButton" />
                </form></td>


<div class="container">
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
    This invoice has been sent to your email <?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?><br>
    Thank you for shopping with us.
</div>
                


