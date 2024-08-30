<div class="conatiner-fluid content-inner mt-5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h2 class="fw-bold mb-2"><span class="text-secondary">Add New User</span></h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <form action="<?= base_url('admin/add_admin'); ?>" method="post">
                                <div class=" row">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="uname">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= set_value('name'); ?>">
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="uname">Email:</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pass">Password:</label>
                                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="rpass">Repeat Password:</label>
                                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add New User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>