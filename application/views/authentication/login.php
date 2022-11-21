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
        <?= form_open("Users/doLogin", array('class' => 'login-email')); ?>
        <p style="font-size: 2rem; font-weight:850;">Login</p>

            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
                <p class="login-error-text">
                <?php echo $this->session->flashdata('msg'); ?>
                </p>
            <p class="login-register-text">Dont Have an Account ?
                <a href="<?= base_url("Users/Register"); ?>">Register</a>
            </p>
    </div>
</body>

</html>