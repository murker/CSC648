<div class="caption">                          
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
            <?php
            if (isset($product->name))
                echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
            ?></a></h4>
        <h5>
            <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
        </h5>
        <br /><br /><input type="button" value="Add to cart" />
    <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
</div>