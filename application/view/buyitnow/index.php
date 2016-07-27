<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <form action="<?php echo URL; ?>payment/finishtransaction" method="POST">
                    <h4 class="title">Payment</h4>
                    <div id="loginbox" class="loginbox">  
                        <div>
                            <div class="col-sm-3">
                                <label>Credit card type:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='cardtype' id='cardtype' value="" required /> 
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Credit card number:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='cardnumber' id='cardnumber' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Expiration date:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='expdate' id='expdate' value="" required />
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-3">
                                <label>Security code:</label>
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
                    <h4 style="visibility: hidden">hax</h4>
                    <h4 class="title">Billing information</h4>
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
                        <input type='submit' name='submit_payment' value='Submit' class="btn btn-primary" />
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>