<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <form action="<?php echo URL; ?>customers/updatecustomer" method="POST">
                    <h3 class="title">Your Profile</h3>
                    <div id="loginbox" class="loginbox">  
                        <div>
                            <div class="col-sm-3">
                                <label>First Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="firstname" value="<?php echo htmlspecialchars($customer->firstname, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <div class="col-sm-3">
                                <label>Last Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="lastname" value="<?php echo htmlspecialchars($customer->lastname, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <div class="col-sm-3">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="email" value="<?php echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?>" />
                            </div>
                            <div class="col-sm-3">
                                <label>Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" name="password" value="<?php echo htmlspecialchars($customer->password, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <div class="col-sm-3">
                                <label>Phone Number</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="phone" value="<?php echo htmlspecialchars($customer->phone, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <div class="col-sm-3">
                                <label>Street Address</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="street" value="<?php echo htmlspecialchars($customer->street, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <div class="col-sm-3">
                                <label>City</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="city" value="<?php echo htmlspecialchars($customer->city, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <div class="col-sm-3">
                                <label>Zip Code</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="zipcode" value="<?php echo htmlspecialchars($customer->zipcode, ENT_QUOTES, 'UTF-8'); ?>" required />
                            </div>
                            <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?>" />
                            <h4 style="visibility: hidden">hax</h4>
                            <input type="submit" name="submit_update_customer" value="Update" class="btn btn-primary"/>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>