<div class="container">
    <h2>ADD ITEM</h2>
	    <!-- add product form -->                  
    <div class="box">         
        <form action="<?php echo URL; ?>products/addproduct" method="POST">
            <label for='name' >Item<span style="color:red">*</span>: </label>
 	    <input type='text' name='name' id='name' value="" required />
	    <label for='description' >Description<span style="color:red">*</span>: </label>
            <input type='text' name='description' id='description' value="" required />
            <label for='price' >Price<span style="color:red">*</span>:</label>
	    <input type='text' name='price' id='price' value="" required /><br><br>
            <label for='stock_qty' >Stock Quantity<span style="color:red">*</span>: </label>
            <input type='text' name='stock_qty' id='stock_qty' value="" required />
            <label for='category_id' >Category ID<span style="color:red">*</span>: </label>
            <input type='text' name='category_id' id='category_id' value="" required/><br><br>
            <form action="<?php echo URL; ?>upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
            </form><br>
            <input type='submit' name='submit_add_product' value='Submit' />
        </form>
    </div>
        <!-- main content output -->
    <div class="box">
        <h3>List of Items</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
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
</div>
