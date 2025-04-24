<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<div class="container">

    <form method="post" action="<?= base_url('auth/check') ?>" autocomplete="off">
        <?= csrf_field(); ?>
        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>
        <?php  if(!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>

        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Login Panel
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <div class="form-group">
                            <label class="form-control-label">USERNAME</label>
                            <input type="text" class="form-control" name="userName" value="<?= set_value('userName'); ?>">
                            <span class="text-danager"><?= isset($validation) ? display_error($validation, 'userName') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">email</label>
                            <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                            <span class="text-danager"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" class="form-control" name="password">
                            <span class="text-danager"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div>

                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                                <!-- Error Message -->
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">Login</button>
                            </div>

                            <div class="col-lg-6 login-btm login-text">> 
                                <a href="<?= base_url('auth/register') ?>">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </form>
</body>
</html>