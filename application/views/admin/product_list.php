<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add New Product</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/add_product'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="furl">Product Name (required)</label>
                            <input type="text" class="form-control" required maxlength="100" placeholder="Enter product name" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="turl">Product Price (required)</label>
                            <input type="number" class="form-control" min="0" required max="9999999999" placeholder="Enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="instaurl">Image (required)</label>
                            <input type="file" class="form-control" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lurl">Product Details (required)</label>
                            <input type="text" class="form-control" placeholder="Enter product details" required maxlength="500" cols="30" rows="10" name="details"></input>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="add_product">Add New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 text-center">
    <div class="row justify-content-center">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('assets/images/' . $product['image_01']); ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name']; ?></h5>
                        <p class="card-text">Rp<span><?= $product['price']; ?></span>/-</p>
                        <p class="card-text"><?= $product['details']; ?></p>
                        <div class="flex-btn">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProductModal<?= $product['id']; ?>"> Update</button>
                            <a href="<?= base_url('admin/delete_product/') . $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Delete this product?');">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Update  -->
<?php $no = 0;
foreach ($products as $product) : $no++; ?>
    <div class="modal fade" id="updateProductModal<?= $product['id']; ?>" tabindex="-1" aria-labelledby="updateProductModalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModalTitle">Update product</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/update_product/' . $product['id']); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <div class="form-group">
                            <label class="form-label" for="furl">Product Name (required)</label>
                            <input type="text" class="form-control" required maxlength="100" placeholder="Enter product name" name="name" value="<?= $product['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="turl">Product Price (required)</label>
                            <input type="number" class="form-control" min="0" required max="9999999999" placeholder="Enter Product Price" onkeypress="if(this.value.length == 10) return false;" name="price" value="<?= $product['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="instaurl">Image (required)</label>
                            <input type="file" class="form-control" name="image_01" accept="image/jpg, image/jpeg, image/png, image/gif" class="box" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lurl">Product Details (required)</label>
                            <input type="text" class="form-control" placeholder="Enter Product Details" required maxlength="500" cols="30" rows="10" name="details" value="<?= $product['details']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!--end Modal-->