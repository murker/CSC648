<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <form action="<?php echo URL; ?>customers/addcustomer" method="POST">
                    <h4 class="title">About You</h4>
                    <div id="loginbox" class="loginbox">  
                        <div>
                            <div class="col-sm-3">
                                <label>First Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='firstname' id='firstname' value="" required /> 
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Last Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='lastname' id='lastname' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Phone Number</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='phone' id='phone' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='email' id='email' value="" required />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Password</label>
                        </div>
                        <div class="col-sm-9">
                            <input type='password' name='password' id='password' value="" required />
                        </div>
                        <div class="clear"> </div>
                        <!--                    <a class="news-letter" href="#">
                                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                                            </a>-->
                        <div class="clear"> </div>
                    </div>
                    <h4 style="visibility: hidden">hax</h4>
                    <h4 class="title">Shipping Information</h4>
                    <div>
                        <div class="col-sm-3">
                            <label>Street Address</label>
                        </div>
                        <div class="col-sm-9">
                            <input type='text' name='street' id='street' value="" required />
                        </div>
                    </div>
                    <div>
                        <div class="col-sm-3">
                            <label>City</label>
                        </div>
                        <div class="col-sm-9">
                            <input type='text' name='city' id='city' value="" required />
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Zip</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='zipcode' id='zipcode' value="" required />
                            </div>
                        </div>
                        <div class="clear"> </div>
                        <h4 style="visibility: hidden">hax</h4>
                        <input type='submit' name='submit_add_customer' value='Submit' class="btn btn-default" />
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <!-- main content output -->
    <div class="box">
        <h3>List of customers <small>Leaving this in for now for debug</small></h3>
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
