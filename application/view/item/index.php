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
            <h3><?php
                if (isset($product->name))
                    echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                ?>
            </h3>
            <h4>
                <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
            </h4>
            <form action="<?php echo URL; ?>cart/additem" method="POST">
                <span class = "quantity"><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?> available</span>
                <br /> <br />
                <label for='qty' >Quantity: </label>
                <input type='text' name='qty' value="1" class="quantity-text" required />
                <br />
                <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                <input type="submit" name="submit_add_item" value="Add to cart" class = "btn btn-warning" />     
                <input type="button" value="Buy It Now" class = "btn btn-primary"/>
                <h6 style="visibility: hidden">-</h6>
                <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
            </form>        
        </div>
    </div>
</div>