<div class="container">
    <!--    <h3>SIGN IN</h3>-->
    <!-- add sign in form -->       
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="login-title">
            <h4 class="title">Registered Customers</h4>
            <div id="loginbox" class="loginbox">         
                <form action="<?php echo URL; ?>signin/signincustomer" method="POST">
                    <fieldset class="input">
                        <div class="form-group">
                            <p id="login-form-username">
                            <div class="col-sm-3">
                                <label for='email' >Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='text' name='email' id='email' value="" required />
                            </div>
                            </p>
                            <p id="login-form-password">
                            <div class="col-sm-3">
                                <label for='password' >Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type='password' name='password' id='password' value="" required />
                            </div>
                            </p>
                            <h6 style="visibility: hidden">hax</h6>
                            <div class="remember">
                                <?php
                                if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                                    echo "<p><font color='red'>You entered an invalid SF State ID or Password.</font></p>";
                                }
                                ?>
                                <p id="login-form-remember">
                                    <label for="modlgn_remember"><a href="#">Forget Your Password? </a></label>
                                </p>
                                <input type="submit" name="signincustomer" value="Login" class="btn btn-default">
                                <div class="clear"></div>                                       
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <hr>
        <div class="login-page">
            <h4 class="title">New Customers</h4>
            <p>By Registering, you agree that you've read and accepted our  <a title="link opens in new window" href="#" target="_blank">User Agreement</a>, 
                you're at least 18 years old, and you consent to our <a title="link opens in new window" href="#" target="_blank">Privacy Notice</a>.</p>
            <div class="button1">                
                <a href="<?php echo URL; ?>customers"><input type="submit" name="Submit" value="Create an Account" class="btn btn-default"></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>