<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="login-title row">
                <h4 class="title">Update an Item</h4>  
                <form action="<?php echo URL; ?>products/updateproduct" method="POST">
                    <div class="col-sm-3">
                        <label for='name' >Item</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <div class="col-sm-3">
                        <label for='description' >Description</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="description" value="<?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <div class="col-sm-3">
                        <label for='price' >Price</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="price" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <div class="col-sm-3">
                        <label for='stock_qty' >Quantity</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="stock_qty" value="<?php echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <div class="col-sm-3">
                        <label for='category_id' >Category</label>
                    </div>
                    <div class="col-sm-9">
                        <select name='category_id' required>
                            <option value="1">Books</option>
                            <option value="2">Tutors</option>
                            <option value="3">Electronics</option>
                            <option value="4">Entertainment</option>
                            <option value="5">Clothing</option>
                            <option value="6">Furniture</option>
                            <option value="7">Other</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                    <h6 style="visibility: hidden">hax</h6>
                    <div class="col-sm-3">
                        <input type="submit" name="submit_update_product" value="Update" class="btn btn-primary" />
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                </form>
                <hr>
                <div class="col-sm-12">
                    <form action="<?php echo URL; ?>products/updateproductImg1" method="POST" enctype="multipart/form-data">
                        <label for='image1' >Image 1</label>
                        <input type="file" name="imageToUpload1" id="imageToUpload1"required />
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" name="submit_update_productImg1" value="Update" class = "btn btn-warning btn-xs img-update" />
                    </form>
                    <br />
                    <form action="<?php echo URL; ?>products/updateproductImg2" method="POST" enctype="multipart/form-data">
                        <label for='image2' >Image 2 <span style="color:blue">(Optional)</span></label>
                        <input type="file" name="imageToUpload2" id="imageToUpload2">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" name="submit_update_productImg2" value="Update" class = "btn btn-warning btn-xs img-update" />
                    </form>
                    <br />
                    <form action="<?php echo URL; ?>products/updateproductImg3" method="POST" enctype="multipart/form-data">
                        <label for='image3' >Image 3 <span style="color:blue">(Optional)</span></label>
                        <input type="file" name="imageToUpload3" id="imageToUpload3">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" name="submit_update_productImg3" value="Update" class = "btn btn-warning btn-xs img-update" />
                    </form>
                    <br />
                    <form action="<?php echo URL; ?>products/updateproductImg4" method="POST" enctype="multipart/form-data">
                        <label for='image4' >Image 4 <span style="color:blue">(Optional)</span></label>
                        <input type="file" name="imageToUpload4" id="imageToUpload4">
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" name="submit_update_productImg4" value="Update" class = "btn btn-warning btn-xs img-update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
