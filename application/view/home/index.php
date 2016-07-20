<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Category</p>
            <div class="list-group">
                <a href="#" class="list-group-item">Books</a>
                <a href="#" class="list-group-item">Tutors</a>
                <a href="#" class="list-group-item">Electronics</a>
                <a href="#" class="list-group-item">Entertainment</a>
                <a href="#" class="list-group-item">Clothing</a>
                <a href="#" class="list-group-item">Furniture</a>
                <a href="#" class="list-group-item">Other</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <!--<div class="col-sm-4 col-lg-4 col-md-4">-->
                    <div class="thumbnail">
                        <!--                            
                        <?php
                        if (isset($product->img1))
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="320" width="150" />';
                        else
                            echo '<img src="<' . URL . '/img/logo.png" />';
                        ?>
                        -->
                        <div class="caption">
                            <h4>
                                <div class="search-image">
                                    <img src="<?php echo URL . '/img/imagenotfound.png' ?>" />
                                </div>
                                <a href="#"><?php
                                    if (isset($product->name))
                                        echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                                    ?></a></h4>
                            <h4>
                            <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                                 <input type="button" value="Add to cart" /></h4>
                            <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                    <!--</div>-->
                <?php } ?>


            </div>

        </div>

    </div>
