<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Your Order</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_section layout_padding">
    <div class="container">
        <div class="row md-4 ">
            <?php if ($user) : ?>
                <?php if (!empty($selected_product)) : ?>
                    <h2>Selected Product(s):</h2>
                    <div class="selected-product">
                        <img src="<?= base_url('assets/images/' . $selected_product['image_01']); ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt="">
                        <h5><?= $selected_product['name']; ?></h5>
                        <span class="badge rounded-pill bg-success">Rp<?= $selected_product['price']; ?>,-</span>
                    </div>
                    <div class="conatiner-fluid content-inner mt-5 py-0">
                        <div>
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h2 class="fw-bold mb-2"><span class="text-secondary">Order</span></h2>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="new-user-info">
                                                <form action="<?= base_url('OrderController/place_order'); ?>" method="post" enctype="multipart/form-data">
                                                    <div class="flex">
                                                        <div class="inputBox">
                                                            <span>name :</span>
                                                            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
                                                        </div>
                                                        <div class="inputBox">
                                                            <span>phone:</span>
                                                            <input type="number" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
                                                        </div>
                                                        <div class="inputBox">
                                                            <span> email :</span>
                                                            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
                                                        </div>
                                                        <div class="inputBox">
                                                            <span>payment method :</span>
                                                            <select name="method" class="box" required>
                                                                <option value="cash on delivery">cash on delivery</option>
                                                                <option value="paytm">Virtual Account</option>
                                                            </select>
                                                        </div>
                                                        <div class="inputBox">
                                                            <span>address :</span>
                                                            <input type="text" name="address" placeholder="enter your address" class="box" maxlength="50" required>
                                                        </div>
                                                        <input type="hidden" name="total_products" value="<?= $total_products; ?>">
                                                        <input type="hidden" name="total_price" value="<?= $total_price; ?>">
                                                        <input type="submit" name="order" value=" order">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <h2>Product not found.</h2>
                <?php endif; ?>
            <?php else : ?>
                <h2>Please login to place an order.</h2>
            <?php endif; ?>
        </div>
    </div>
</section>