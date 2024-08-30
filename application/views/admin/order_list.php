<div class="conatiner-fluid content-inner mt-5 py-0">
    <div?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h2 class="fw-bold mb-2"><span class="text-secondary">User list</span></h2>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive">
                            <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row align-items-center">
                                    <div class="table-responsive border-bottom my-3">
                                        <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                            <thead>
                                                <tr class="light">
                                                    <th>Placed on</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Address</th>
                                                    <th>Total Product</th>
                                                    <th>Total Price</th>
                                                    <th>Payment Method</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orders as $order) : ?>
                                                    <tr>
                                                        <td><?= date('d F Y', strtotime($order['placed_on'])); ?></td>
                                                        <td><?= $order['name']; ?></td>
                                                        <td><?= $order['number']; ?></td>
                                                        <td><?= $order['address']; ?></td>
                                                        <td><?= $order['total_products']; ?></td>
                                                        <td><?= $order['total_price']; ?></td>
                                                        <td><?= $order['method']; ?></td>
                                                        <td>
                                                            <p class="h4"><span class="badge rounded-pill bg-warning text-dark"><?= $order['payment_status']; ?></span></p>
                                                        </td>
                                                        <td>
                                                            <form action="<?= base_url('admin/update_payment_status/' . $order['id']); ?>" method="post">
                                                                <select name="payment_status" class="form-select">
                                                                    <option value="pending" <?= $order['payment_status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                                    <option value="completed" <?= $order['payment_status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                                                </select>
                                                                <br>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                            <a href="<?= base_url('admin/delete_order/') . $order['id']; ?>" class="btn btn-danger">Delete</a>
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
</div>