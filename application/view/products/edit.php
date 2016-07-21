<div class="container">
    <h2>EDIT ITEM</h2>
    <!-- edit product form -->
    <div class="box">         
        <form action="<?php echo URL; ?>products/updateproduct" method="POST">
            <label for='name' >Item<span style="color:red">*</span>:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label for='description' >Description<span style="color:red">*</span>:</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label for='price' >Price<span style="color:red">*</span>:</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required /><br>
            <label for='stock_qty' >Quantity<span style="color:red">*</span>:</label>
            <input type="text" name="stock_qty" value="<?php echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label for='category_id' >Category<span style="color:red">*</span>: </label>
            <select name='category_id' required>
            <option value="1">Books</option>
            <option value="2">Tutors</option>
            <option value="3">Electronics</option>
            <option value="4">Entertainment</option>
            <option value="5">Clothing</option>
            <option value="6">Furniture</option>
            <option value="7">Misc</option>
            </select><br> 
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_product" value="Update" />
        </form>
        <br>
        <form action="<?php echo URL; ?>products/updateproductImg1" method="POST" enctype="multipart/form-data">
            <label for='image1' >Image 1<span style="color:red">*</span>: </label>
            <input type="file" name="imageToUpload1" id="imageToUpload1"required />
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_productImg1" value="Update" />
        </form>
        <form action="<?php echo URL; ?>products/updateproductImg2" method="POST" enctype="multipart/form-data">
            <label for='image2' >Image 2: </label>
            <input type="file" name="imageToUpload2" id="imageToUpload2">
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_productImg2" value="Update" />
        </form>
        <form action="<?php echo URL; ?>products/updateproductImg3" method="POST" enctype="multipart/form-data">
            <label for='image3' >Image 3: </label>
            <input type="file" name="imageToUpload3" id="imageToUpload3">
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_productImg3" value="Update" />
        </form>
        <form action="<?php echo URL; ?>products/updateproductImg4" method="POST" enctype="multipart/form-data">
            <label for='image4' >Image 4: </label>
            <input type="file" name="imageToUpload4" id="imageToUpload4">
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_productImg4" value="Update" />
        </form>
    </div>
</div>
