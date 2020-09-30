
<?php
$session = session();
if (!empty($session->get('validation')))
    $validation = $session->get('validation');
if (!empty($session->get('alert')))
    $alert = $session->get('alert');
?>

<h3>İletişim</h3>
        <?php if (isset($alert)) : ?>
            <?php if ($alert == 'success') : ?>
                <div class="alert alert-success" role="alert">
                    İşlem başarılı.
                </div>
            <?php elseif ($alert == 'danger') : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Üzgünüz</h4>
                    <p>İşlem sırasında bir hata oluştu.</p>
                </div>
            <?php endif ?>
        <?php endif ?>
        <div class="form-group">
            <label for="fullname">Ad Soyad:</label>
            <?php if (isset($validation['fullname'])) : ?>
                <span class="text-danger"><?= $validation['fullname'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" name="fullname" id="fullname">
        </div>
        <div class="form-group">
            <label for="email">Eposta adresi:</label>
            <?php if (isset($validation['email'])) : ?>
                <span class="text-danger"><?= $validation['email'] ?></span>
            <?php endif ?>
            <input type="email" name="email" class="form-control" id="email">
            <small id="email" class="form-text text-muted">E posta adresiniz herhangi biriyle paylaşılmayacaktır.</small>
        </div>
        <div class="form-group">
            <label for="subject">Konu:</label>
            <?php if (isset($validation['subject'])) : ?>
                <span class="text-danger"><?= $validation['subject'] ?></span>
            <?php endif ?>
            <input type="subject" class="form-control" id="subject" name="subject">
        </div>
        <div class="form-group">
            <label for="message">Mesaj:</label>
            <?php if (isset($validation['message'])) : ?>
                <span class="text-danger"><?= $validation['message'] ?></span>
            <?php endif ?>
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
        </div>
        <?= csrf_field() ?>