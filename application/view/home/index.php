<!-- Page Content -->
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <p class="lead">Category</p>
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

        <div class="col-md-9">
            
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <!--<div class="col-sm-4 col-lg-4 col-md-4">-->
                    <div class="thumbnail">                                                                          
                        <div class="caption">
                            <h4>
                                <div class="search-image">
                                    <?php
                                    if (isset($product->img1))  
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($product->img1).'" />';
                                    else
                                    echo '<img src="<' . URL . '/img/imagenotfound.png" />';                   
                                    ?>                                   
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
