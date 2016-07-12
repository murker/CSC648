<div class="container">
    <h2>EDIT ITEM</h2>
    <!-- add product form -->
    <div>       
        <form action="<?php echo URL; ?>products/updateproduct" method="POST">
            <label>Item</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" />
            <label>Description</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Price</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Stock_qty</label>
            <input type="text" name="stock_qty" value="<?php echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Category_id</label>
            <input type="text" name="category_id" value="<?php echo htmlspecialchars($product->category_id, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_product" value="Update" />
        </form>
    </div>
</div>
