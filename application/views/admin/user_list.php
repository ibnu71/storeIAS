<div class="conatiner-fluid content-inner mt-5 py-0">
    <div>
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
                            <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                <thead>
                                    <tr class="light">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $user['name']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td>
                                                <span class="badge rounded-pill bg-info text-dark"><?= date('d F Y', $user['date_created']); ?></span>
                                            <td>
                                                <?php foreach ($user_role as $role) : ?>
                                                    <?php if ($user['role_id'] == $role['id']) : ?>
                                                        <?php if ($role['id'] == 1) : ?>
                                                            Administrator
                                                        <?php elseif ($role['id'] == 2) : ?>
                                                            Member
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>

                                            <td>
                                                <?php if ($user['role_id'] == 1) : ?>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateUserModal<?= $user['id']; ?>"> Update</button>
                                                    <a href="<?= base_url('admin/delete_user/') . $user['id']; ?>" class="btn btn-danger">Delete</a>
                                                <?php elseif ($user['role_id'] == 2) : ?>
                                                    <a href="<?= base_url('admin/delete_user/') . $user['id']; ?>" class="btn btn-danger">Delete</a>

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


<!-- Modal Update  -->
<?php $no = 0;
foreach ($users as $user) : $no++; ?>
    <div class="modal fade" id="updateUserModal<?= $user['id']; ?>" tabindex="-1" aria-labelledby="updateUserModalTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserModalTitle">Update User</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/proses_update/' . $user['id']); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
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