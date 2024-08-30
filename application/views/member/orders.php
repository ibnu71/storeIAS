<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Your List Order</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="conatiner-fluid content-inner mt-5 py-0">
    <div?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body px-0">
                        <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row align-items-center">
                                <div class="bd-example table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>Placed on</th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Address</th>
                                                <th>Total Product</th>
                                                <th>Total Price</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $order) : ?>
                                                <tr class="light">
                                                    <td><?= date('d F Y', strtotime($order['placed_on'])); ?></td>
                                                    <td><?= $order['name']; ?></td>
                                                    <td><?= $order['number']; ?></td>
                                                    <td><?= $order['address']; ?></td>
                                                    <td><?= $order['total_products']; ?></td>
                                                    <td><?= $order['total_price']; ?></td>
                                                    <td><?= $order['method']; ?></td>
                                                    <td>
                                                        <?php if ($order['payment_status'] == 'completed') : ?>
                                                            <p class="h4"><span class="badge rounded-pill bg-success">Completed</span></p>
                                                        <?php elseif ($order['payment_status'] == 'pending') : ?>
                                                            <p class="h4"><span class="badge rounded-pill bg-warning text-dark"><?= $order['payment_status']; ?></span></p>
                                                        <?php endif; ?>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>