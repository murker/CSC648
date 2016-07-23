<div class="container">
    <!--    <h3>SIGN IN</h3>-->
    <!-- add sign in form -->                  
    <div class="col-md-6">
        <div class="login-title">
            <h4 class="title">Registered Customers</h4>
            <div id="loginbox" class="loginbox">         
                <form action="<?php echo URL; ?>signin/signincustomer" method="POST">
                    <fieldset class="input">
                        <p id="login-form-username">
                            <label for='email' >Email*</label>
                            <input type='text' name='email' id='email' value="" required />
                        </p>
                        <p id="login-form-password">
                            <label for='password' >Password* </label>
                            <input type='password' name='password' id='password' value="" required />
                        </p>
                        <?php
                        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                            echo "<font color='red'>You entered an invalid SF State ID or Password.</font>";
                        }
                        ?>
                        <div class="remember">
                            <p id="login-form-remember">
                                <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
                            </p>
                            <div class="button1">
                            <input type="submit" name="signincustomer" value="Login">
                            </div>
                            <div class="clear"></div>                                       
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="login-page">
            <h4 class="title">New Customers</h4>
            <p>By Registering, you agree that you've read and accepted our  <a title="link opens in new window" href="#" target="_blank">User Agreement</a>, 
                you're at least 18 years old, and you consent to our <a title="link opens in new window" href="#" target="_blank">Privacy Notice</a>.</p>
            <div class="button1">                
                <a href="<?php echo URL; ?>customers"><input type="submit" name="Submit" value="Create an Account"></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>