<div class="container">
    <!--    
        <div class="search-image">
    <?php
    if (isset($product->img1))
        echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
    else
        echo '<img src="<' . URL . '/img/imagenotfound.png" />';
    ?>                                   
        </div>
        <div class="search-data">
            <h4>
    
        </div>-->
    <div class="row">
        <div class="col-sm-4">
            <?php
            if (isset($product->img1))
                echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" class = "img-thumbnail img-responsive"/>';
            ?>  
        </div>
        <div class ="col-sm-7">
            <h4><?php
                if (isset($product->name))
                    echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                ?>
            </h4>
            <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
            <form>
                <label for='quantity' >Quantity: </label>
                <input type='text' name='quantity' id='quantity' value="1" required />
                <label for='stock_qty' >available: </label>
                <?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>
                <h5>
                    <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                </h5>
                <input type="button" value="Buy It Now" class = "btn btn-primary"/></br>
                <input type="button" value="Add to cart" class = "btn btn-primary" />
            </form>                                    
        </div>
    </div>
</div>