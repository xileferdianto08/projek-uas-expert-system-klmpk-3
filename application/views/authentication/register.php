<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>
    <div class="container">
        <?= form_open("Users/doRegister", array('class' => 'login-email')); ?>
        <p style="font-size: 2rem; font-weight:850;">REGISTER</p>
        <div class="input-group">
            <input type="text" placeholder="Nama Lengkap" name="name">
        </div>
        <div class="input-group">
            <input type="number" placeholder="Umur" name="age" min="1">
        </div>

        <div class="input-group">
            <input type="text" placeholder="Email" name="email">
        </div>


        <div class="input-group">
            <input type="password" placeholder="Password" name="password">
        </div>


        <div class="input-group">
            <input type="password" placeholder="ConfirmPassword" name="cppassword">
        </div>
        <p class="login-error-text">
            <?= $this->session->flashdata('confirmPwdMsg'); ?>
        </p>
        <?= form_error('password', '<p class="login-register-text">*', '</p>'); ?>
        <?= form_error('email', '<p class="login-register-text">*', '</p>') ?>
        <p class="login-error-text">
            <?= $this->session->flashdata('msg'); ?>
        </p>
        <div class="input-group">
            <button name="submit" class="btn">Register</button>
        </div>        

        <p class="login-register-text">Have an Account ?
            <a href="<?= base_url("Users"); ?>"> Log In </a>
        </p>
    </div>
</body>

</html>