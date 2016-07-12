<div class="container">
    <h2>SIGN IN</h2>
    <!-- add customer form -->                  
    <div class="box">         
        <form action="<?php echo URL; ?>signin/signincustomer" method="POST">
            <label for='email' >Email Address*:</label>
            <input type='text' name='email' id='email' value="" required />
            <label for='password' >Password*: </label>
            <input type='text' name='password' id='password' value="" required />
            <input type='submit' name='signincustomer' value='Submit' />
        </form>
    </div>
</div>
