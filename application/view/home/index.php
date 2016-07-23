<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="list-group">   
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">
                    <input type='submit' class="list-group-item" name='submit_sortbyBooks' value="Books" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">                  
                    <input type='submit' class="list-group-item" name='submit_sortbyTutors' value="Tutors" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">                    
                    <input type='submit' class="list-group-item" name='submit_sortbyElectronics' value="Electronics" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">
                    <input type='submit' class="list-group-item" name='submit_sortbyEntertainment' value="Entertainment" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">
                    <input type='submit' class="list-group-item" name='submit_sortbyClothing' value="Clothing" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">
                    <input type='submit' class="list-group-item" name='submit_sortbyFurniture' value="Furniture" />
                </form>
                <form action="<?php echo URL; ?>home/sortbyCategory" method="POST">
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
                                <br /><br /><input type="button" value="Add to cart" class="btn btn-primary"/>
                            <!--<p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>-->
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                <?php } ?>
            </div>
        </div>
    </div>
</div>