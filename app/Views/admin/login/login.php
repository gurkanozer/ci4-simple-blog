<?php
$session = session();
if (!empty($session->get('alert')))
    $alert = $session->get('alert');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <?= $this->include('admin/includes/styles') ?>
    <?= $this->include('/admin/login/login_styles') ?>
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Lütfen Giriş Yapınız</h1>
        <img class="mb-4 rounded-circle " src="<?= get_image($items->logo, "thumb", "logo") ?>" alt="" width="72" height="72">
        <?php if (isset($alert) && $alert == 'danger') : ?>
            <div class="alert alert-danger" role="alert">
                <p>İşlem başarısız!</p>
                <p>Bilgilerinizi kontrol edin.</p>
            </div>
        <?php endif ?>
        <div class="form-group">
            <label for="email" class="sr-only">Eposta adresi:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Eposta adresi" required autofocus>
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">Şifre:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Şifre" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
        <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y'); ?></p>
    </form>
</body>

</html>