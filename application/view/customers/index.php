<div class="container">
    <form action="<?php echo URL; ?>customers/addcustomer" method="POST">
        <div class="register-top-grid">
            <h3>PERSONAL INFORMATION</h3>
            <div>
                <span>First Name<label>*</label></span>
                <input type='text' name='firstname' id='firstname' value="" required /> 
            </div>
            <div>
                <span>Last Name<label>*</label></span>
                <input type='text' name='lastname' id='lastname' value="" required />
            </div>
            <div>
                <span>Phone Number<label>*</label></span>
                <input type='text' name='phone' id='phone' value="" required />
            </div>
            <div>
                <span>Email Address<label>*</label></span>
                <input type='text' name='email' id='email' value="" required /> 
                </div>
                <span>Password<label>*</label></span>
                <input type='password' name='password' id='password' value="" required />
            <div class="clear"> </div>
            <a class="news-letter" href="#">
                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
            </a>
            <div class="clear"> </div>
        </div>
        <div class="register-bottom-grid">
            <h3>SHIPPING INFORMATION</h3>
            <div>
                <span>Street Address<label>*</label></span>
                <input type='text' name='street' id='street' value="" required />
            </div>
            <div>
                <span>City<label>*</label></span>
                <input type='text' name='city' id='city' value="" required />
            </div
            <div>
                <span>Zip Code<label>*</label></span>
                <input type='text' name='zipcode' id='zipcode' value="" required />
            </div>
            <div class="clear"> </div>
        <input type='submit' name='submit_add_customer' value='Submit' />
        </div>   
    </form>
</div>





<div class="container">
    <!-- main content output -->
    <div class="box">
        <h3>List of customers</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Email</td>
                <td>Password</td>
                <td>phone</td>
		<td>Street</td>
                <td>city</td>
                <td>zipcode</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer) { ?>
                <tr>
                    <td><?php if (isset($customer->id)) echo htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?></td>
		    <td><?php if (isset($customer->firstname)) echo htmlspecialchars($customer->firstname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->lastname)) echo htmlspecialchars($customer->lastname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->password)) echo htmlspecialchars($customer->password, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->phone)) echo htmlspecialchars($customer->phone, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->street)) echo htmlspecialchars($customer->street, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->city)) echo htmlspecialchars($customer->city, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($customer->zipcode)) echo htmlspecialchars($customer->zipcode, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'customers/deletecustomer/' . htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'customers/editcustomer/' . htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
