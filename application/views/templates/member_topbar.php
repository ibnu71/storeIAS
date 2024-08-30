<!-- header section strats -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href=""><img width="250" src="<?= base_url('assets/'); ?>images/img/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('member'); ?>">Home </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">other</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('member/Orders'); ?>">Orders</a></li>
                            <li><a href="<?= base_url('member/shop'); ?>">shop</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member'); ?>#product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member'); ?>#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member/contact'); ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member'); ?>#blog">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                            <?php if ($user) : ?>
                                <span class="nav-label"><?= $user['name']; ?></span>
                            <?php else : ?>
                                <span class="nav-label"></span>
                            <?php endif; ?>
                            <svg width="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($user) : ?>
                                <li><a class=" dropdown-item" href="<?= base_url('member/member_update'); ?>">Update Profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="<?= base_url('auth'); ?>">Login</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('auth/registration'); ?>">Register</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->

<!-- Modal Update  -->
<?php if (!empty($users)) : ?>
    <?php $no = 0;
    foreach ($users as $user) : $no++; ?>
        <div class="modal fade" id="updateUserModal<?= $user['id']; ?>" tabindex="-1" aria-labelledby="updateUserModalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateUserModalTitle">Update User</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('mem/proses_update/' . $user['id']); ?>" method="post">
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
<?php endif; ?>
<!--end Modal-->