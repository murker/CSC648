<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="pull-right">
            <form action="<?php echo URL; ?>home/sort" method="GET" class="nav-form">
                <label>Sort by</label>
                <select name='sortby' class="sort-select" onchange='this.form.submit()' id="sort_menu">
                    <option <?php if(isset($_GET['sortby']) && $_GET['sortby'] == "best-match"){echo "selected='selected'";}?> value="best-match">Best match</option>
                    <option <?php if(isset($_GET['sortby']) && $_GET['sortby'] == "date-old-new"){echo "selected='selected'";}?> value="date-old-new">Date: Oldest to Newest</option>
                    <option <?php if(isset($_GET['sortby']) && $_GET['sortby'] == "date-new-old"){echo "selected='selected'";}?> value="date-new-old">Date: Newest to Oldest</option>
                    <option <?php if(isset($_GET['sortby']) && $_GET['sortby'] == "price-low-high"){echo "selected='selected'";}?> value="price-low-high">Price: Lowest to Highest</option>
                    <option <?php if(isset($_GET['sortby']) && $_GET['sortby'] == "price-high-low"){echo "selected='selected'";}?> value="price-high-low">Price: Highest to Lowest</option>
                </select>
                <noscript><input type='submit' name='submit_sort' value="Submit" id="searchButton" /></noscript>
            </form>
        </div>
    </div>
    <div class="row">
        <?php foreach ($products as $product) { ?>
            <div class="col-sm-6 col-lg-4">
                <?php if ($product->category_id != 2) : ?>
                    <div class="thumbnail">    
                    <?php else : ?>
                        <div class="thumbnail tutor-back">  
                        <?php endif; ?>
                        <div class="caption">
                            <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">                            
                                <div class="search-image">
                                    <?php
                                    if (isset($product->img1))
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
                                    ?>                                   
                                </div></a>
                            <div class="search-data">
                                <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <h5>
                                        <?php if ($product->category_id == 2) : ?>
                                            <span class="tutor-tag">
                                                Tutor: 
                                            </span>
                                        <?php endif; ?>
                                        <?php
                                        if (isset($product->name))
                                            echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                                        ?></a></h5>
                                <h5>
                                    <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                                    <?php if ($product->category_id == 2) : ?>
                                        / hour</h5>
                                <?php else : ?>
                                    </h5>
                                    <span class = "quantity"><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?> available</span>
                                    <?php if (isset($_SESSION['CurrentUser'])) : ?>
                                        <form action="<?php echo URL; ?>cart/additem" method="POST">
                                        <?php else : ?>
                                            <form action="<?php echo URL; ?>signin">
                                            <?php endif; ?>
                                            <br />
                                            <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                                            <input type="submit" name="submit_buyitnow" value="Buy It Now" class = "btn btn-warning"/>
                                        </form>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br />
        <div style = "visibility: hidden" class="pull-right">Page < 1 2 3 4 5 ></div>
    </div>