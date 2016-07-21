<div class="container">
    <h2>SIGN IN</h2>
    <!-- add sign in form -->                  
    <div class="box">         
        <form action="<?php echo URL; ?>signin/signincustomer" method="POST">
            <label for='email' >Email Address*:</label>
            <input type='text' name='email' id='email' value="" required />
            <label for='password' >Password*: </label>
            <input type='password' name='password' id='password' value="" required />
            <input type='submit' name='signincustomer' value='Submit' />
            <br>
            <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
            echo "<font color='red'>You entered an invalid SF State ID or Password.</font>";
            } ?>
        </form>
    </div>
</div>
