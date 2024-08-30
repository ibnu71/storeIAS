<div class="limiter">
    <div class="container-login100" style="background-image: url('./assets/images/bglogin.jpg')">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41"> WELCOME BACK ! </span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="post" action=" <?= base_url('auth');  ?>">
                <?= $this->session->flashdata('message'); ?>
                <div class="wrap-input100 validate-input" data-validate="Enter email">
                    <input type="text" class="input100" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input type="password" class="input100" id="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="container-login100-form-btn m-t-32">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration');  ?>">Create an Account!</a>
                </div>
                <div class="text-center">
                    <a class="small" href="<?= base_url('member');  ?>"> Let's go to our website!</a>
                </div>
        </div>
    </div>
</div>