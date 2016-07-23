<!-- main content output -->
<div class="box">
    <h3>Your items for sale</h3>
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Image1</td>
                <td>Image2</td>
                <td>Image3</td>
                <td>Image4</td>
                <td>ID</td>
                <td>Item</td>
                <td>Description</td>
                <td>Price</td>
                <td>Stock Quantity</td>
                <td>Category ID</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php if (isset($product->img1) && $product->img1 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="42" width="42" />'; ?></td>
                    <td><?php if (isset($product->img2) && $product->img2 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img2) . '"  height="42" width="42" />'; ?></td>
                    <td><?php if (isset($product->img3) && $product->img3 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img3) . '"  height="42" width="42" />'; ?></td>
                    <td><?php if (isset($product->img4) && $product->img4 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img4) . '"  height="42" width="42" />'; ?></td>
                    <td><?php if (isset($product->id)) echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->name)) echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->price)) echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($product->category_id)) echo htmlspecialchars($product->category_id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'products/deleteproduct/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
                    <td><a href="<?php echo URL . 'products/editproduct/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
