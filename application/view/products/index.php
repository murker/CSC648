<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <h4 class="title">Sell an Item</h4>
                <form action="<?php echo URL; ?>products/addproduct" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="customer_id" value= "<?php echo htmlspecialchars($_SESSION['CurrentUser'], ENT_QUOTES, 'UTF-8'); ?>" />
                    <div class="col-sm-3">
                    <label for='name' >Item</label>
                    </div>
                    <div class="col-sm-9">
                    <input type='text' name='name' id='name' value="" required />
                    </div>
                    <div class="col-sm-3">
                    <label for='description' >Description</label>
                    </div>
                    <div class="col-sm-9">
                    <input type='text' name='description' id='description' value="" required />
                    </div>
                    <div class="col-sm-3">
                    <label for='price' >Price</label>
                    </div>
                    <div class="col-sm-9">
                    <input type='text' name='price' id='price' value="" required />
                    </div>
                    <div class="col-sm-3">
                    <label for='stock_qty' >Stock Quantity</label>
                    </div>
                    <div class="col-sm-9">
                    <input type='text' name='stock_qty' id='stock_qty' value="" required />
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
                        <option value="7">Misc</option>
                    </select>
                    </div>
                    <h6 style="visibility: hidden">hax</h6>
                    <div class="col-sm-12">
                    <label for='image1' >Image 1</label>
                    <input type="file" name="imageToUpload1" id="imageToUpload1" required />
                    <br />
                    <label for='image2' >Image 2 <span style="color:blue">(Optional)</span></label>
                    <input type="file" name="imageToUpload2" id="imageToUpload2">
                    <br />
                    <label for='image3' >Image 3 <span style="color:blue">(Optional)</span></label>
                    <input type="file" name="imageToUpload3" id="imageToUpload3">
                    <br />
                    <label for='image4' >Image 4 <span style="color:blue">(Optional)</span></label>
                    <input type="file" name="imageToUpload4" id="imageToUpload4">
                    <br />
                    <input type='submit' name='submit_add_product' value='Submit' class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>