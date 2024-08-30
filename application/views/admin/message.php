<div class="conatiner-fluid content-inner mt-5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h2 class="fw-bold mb-2"><span class="text-secondary">Message</span></h2>
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
                                                    <th>User id</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Messege</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($messages as $message) : ?>
                                                    <tr>
                                                        <td><?= $message['user_id']; ?></td>
                                                        <td><?= $message['name']; ?></td>
                                                        <td><?= $message['phone']; ?></td>
                                                        <td><?= $message['email']; ?></td>
                                                        <td><?= $message['message']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/delete_message/') . $message['id']; ?>" class="btn btn-danger">Delete</a>
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