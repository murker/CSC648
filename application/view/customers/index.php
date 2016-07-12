<div class="container">
    <h2>SIGN UP</h2>
    <!-- add customer form -->                  
    <div class="box">         
        <form action="<?php echo URL; ?>customers/addcustomer" method="POST">
            <label for='firstname' >First Name*: </label>
 	    <input type='text' name='firstname' id='firstname' value="" required />
	    <label for='lastname' >Last Name*: </label>
            <input type='text' name='lastname' id='lastname' value="" required />
            <label for='email' >Email Address*:</label>
	    <input type='text' name='email' id='email' value="" required /><br><br>
            <label for='password' >Password*: </label>
            <input type='text' name='password' id='password' value="" required />
            <label for='phone' >Phone*: </label>
            <input type='text' name='phone' id='phone' value="" required />
            <label for='street' >Street Address*: </label>
            <input type='text' name='street' id='street' value="" required /><br><br>
            <label for='city' >City*: </label>
            <input type='text' name='city' id='city' value="" required />
            <label for='zipcode' >Zip code*: </label>
            <input type='text' name='zipcode' id='zipcode' value="" required /><br><br>
            <input type='submit' name='submit_add_customer' value='Submit' />
        </form>
    </div>
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
