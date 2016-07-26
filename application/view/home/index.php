<!-- Page Content -->
<div class="container">
    <div class="pull-left">
        Showing results 1-10 of whatever
    </div>
    <div class="pull-right">
        Sort by

        <select class="sort-select" onchange='this.form.submit()'>
            <form action="<?php echo URL; ?>home/sortbyoldNew" method="POST">
                <option  name='submit_sortbyprice_product' value="date-old-new">Date: Oldest to Newest</option>
            </form>
            <form action="<?php echo URL; ?>home/sortbynewOld" method="POST">
                <option name='submit_sortbyprice_product' value="date-new-old">Date: Newest to Oldest</option>
            </form>
            <form input = 'submit' action="<?php echo URL; ?>home/sortbypriceAsc" method="POST">
                <option name='submit_sortbyprice_product' value="price-low-high">Price: Lowest to Highest</option>
            </form>
            <form action="<?php echo URL; ?>home/sortbypriceDesc" method="POST">
                <option name='submit_sortbyprice_product' value="price-high-low">Price: Highest to Lowest</option>
            </form>
        </select>       
    </div>
    <br /><br />
    <div class="row">
        <div class="col-sm-2">
            <div class="list-group">   
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">
                    <input type='submit' class="list-group-item" name='submit_sortbyBooks' value="Books" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">                  
                    <input type='submit' class="list-group-item" name='submit_sortbyTutors' value="Tutors" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">                    
                    <input type='submit' class="list-group-item" name='submit_sortbyElectronics' value="Electronics" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">
                    <input type='submit' class="list-group-item" name='submit_sortbyEntertainment' value="Entertainment" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">
                    <input type='submit' class="list-group-item" name='submit_sortbyClothing' value="Clothing" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">
                    <input type='submit' class="list-group-item" name='submit_sortbyFurniture' value="Furniture" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="GET">
                    <input type='submit' class="list-group-item" name='submit_sortbyOther' value="Other" />
                </form>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-9">

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
                                    <!--<br /><br /><input type="button" value="Add to cart" class="btn btn-primary"/>-->
                                <!--<p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>-->
                                    <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                                    <?php if (isset($_SESSION['CurrentUser'])) : ?>
                                        <form action="<?php echo URL; ?>cart/additem" method="POST">
                                    <?php else : ?>
                                        <form action="<?php echo URL; ?>signin" method="GET">
                                    <?php endif; ?> 
                                            <label for='qty' >Quantity: </label>
                                            <input type='text' name='qty' id='quantity' value="1" required />              
                                            <label for='stock_qty' >available: </label>
                                            <?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>                                               
                                            <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />                
                                            <input type="button" name="submit_buyitnow_item" value="Buy It Now" class = "btn btn-primary"/>
                                            <input type="submit" name="submit_add_item" value="Add to cart" class = "btn btn-primary" />                 
                                        </form>                                                                                                                                                        
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