<!-- Page Content -->
<div class="container">
    <div class="pull-left">
        Showing results 1-10 of whatever
    </div>                        
         <div class="pull-right">
            Sort by 
            <form action="<?php echo URL; ?>home/sort" method="GET" class="nav-form">
            <select name='sortby' class="sort-select">
                <option value="date-old-new">Date: Oldest to Newest</option>
                <option value="date-new-old">Date: Newest to Oldest</option>
                <option value="price-low-high">Price: Lowest to Highest</option>
                <option value="price-high-low">Price: Highest to Lowest</option>
            </select>
            <input type='submit' name='submit_sort' value="Submit" id="searchButton" />
            </form>
        </div>
    <br /><br />
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="row">
                    <?php foreach ($products as $product) { ?>
                        <!--<div class="col-sm-4 col-lg-4 col-md-4">-->
                        <div class="thumbnail">                                                                          
                            <div class="caption">
                                <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">                            
                                    <div class="search-image">
                                        <?php
                                        if (isset($product->img1))
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
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
                                        <span class = "quantity"><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?> available</span>
                                        <!--<br /><br /><input type="button" value="Add to cart" class="btn btn-primary"/>-->
                                    <!--<p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>-->
                                    </div>
                            </div>
                        </div>
                        <!--</div>-->
                    <?php } ?>
                </div>
                <br />
                <div class="pull-right">Page < 1 2 3 4 5 ></div>
            </div>
        </div>
    </div>