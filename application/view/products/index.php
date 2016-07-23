<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <h4 class="title">Sell an Item</h4>
                <form action="<?php echo URL; ?>products/addproduct" method="POST" enctype="multipart/form-data">
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
            <!-- main content output -->
            <div class="box">
                <h3>List of Items <small>Left in for debug</small></h3>
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
        </div>
