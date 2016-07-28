<!-- main content output -->
<div class="box container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3>Your Items for Sale</h3>
            <br />
            <div class="row">
                <div class="col-sm-7"><h5>Item</h5></div>
                <div class="col-sm-2"><h5>Price</h5></div>
                <div class="col-sm-1"><h5>Qty</h5></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <a href="<?php echo URL . 'products/editproduct/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="col-sm-2">
                            <?php if (isset($product->img1) && $product->img1 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="42" width="42" />'; ?>
                        </div>
                        <div class="col-sm-5">
                            <?php if (isset($product->name)) echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    </a>
                    <div class="col-sm-2">
                        <?php if (isset($product->price)) echo '$' . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                    <div class="col-sm-1">
                        <?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="<?php echo URL . 'products/deleteproduct/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a>
                    </div>
                    <h1 style="visibility: hidden">test</h1>
                <?php } ?>
            </div>
        </div>
    </div>
