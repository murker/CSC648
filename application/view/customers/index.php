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

                        <div>
                            <div class="col-sm-3">
                                <label>Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='password' name='password' id='password' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Confirm Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='password' name='confirmpw' id='confirmpw' value="" required />
                            </div>
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
                                <label>Zip Code</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='zipcode' id='zipcode' value="" required />
                            </div>
                        </div>
                        <div class="clear"> </div>
                        <h4 style="visibility: hidden">hax</h4>
                        <input type='submit' name='submit_add_customer' value='Submit' class="btn btn-primary" />
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script that validates password -->
<script>
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirmpw");

    function validatePassword() {
        if (password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords does not match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
