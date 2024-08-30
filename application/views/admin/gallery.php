<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add New Gallery</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/add_gallery'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="instaurl">Image : </label>
                            <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="add_product">Add New Gallery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid content-inner mt-5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Gallery List</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                <thead>
                                    <tr class="light">
                                        <th>id</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gallery as $gallery_item) : ?>
                                        <tr>
                                            <td><?= $gallery_item['id']; ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/gallery/' . $gallery_item['image']); ?>" class="card-img-top" alt="" height="110" alt="">
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/delete_gallery/') . $gallery_item['id']; ?>" class="btn btn-danger">Delete</a>
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