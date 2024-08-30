      <!-- inner page section -->
      <?= $this->session->flashdata('message'); ?>
      <section class="inner_page_head">
          <div class="container_fuild">
              <div class="row">
                  <div class="col-md-12">
                      <div class="full">
                          <h3>My Product
                            
                          </h3>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- end inner page section -->
      <section id="product" class="product_section layout_padding">
          <div class="container">
              <div class="row md-4 ">
                  <?php foreach ($products as $product) : ?>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="box">
                              <div class="text-center mb-8">
                                  <img src="<?= base_url('assets/images/' . $product['image_01']); ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt="">
                              </div>
                              <div class="detail-box">
                                  <h5>
                                      <?= $product['name']; ?>
                                  </h5>
                              </div>
                              <div class="detail-box">
                                  <h6>
                                      <span class="badge rounded-pill bg-success">Rp<?= $product['price']; ?>,-</span>
                                  </h6>
                              </div>
                              <div class="options">
                                  <form action="<?= base_url('OrderController/checkout'); ?>" method="POST">
                                      <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                      <input type="submit" value="Buy" class="option2">
                                  </form>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>
          </div>
      </section>