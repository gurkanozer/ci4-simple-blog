<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Kullanıcı Bilgileri</h5>
            <div class="form-group">
                <label for="fullname">Ad Soyad:</label>
                <?php if (isset($validation['fullname'])) : ?>
                    <span class="text-danger"><?= $validation['fullname'] ?></span>
                <?php endif ?>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $item->fullname ?>">
            </div>
            <div class="form-group">
                <label for="email">Eposta adresi:</label>
                <?php if (isset($validation['email'])) : ?>
                    <span class="text-danger"><?= $validation['email'] ?></span>
                <?php endif ?>
                <input type="email" class="form-control" id="email" name="email" value="<?= $item->email ?>">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Şifre değiştir</span>
                    <div class="input-group-text">
                        <input type="checkbox" name="is_password_change">
                    </div>
                </div>
                <input type="password" name="password" placeholder="Şifre" class="form-control">
                <input type="password" name="re_password" placeholder="Şifre tekrar" class="form-control">
            </div>
            <?php if (isset($validation['password'])) : ?>
                <span class="text-danger"><?= $validation['password'] ?></span>
            <?php endif ?>
            <?php if (isset($validation['re_password'])) : ?>
                <span class="text-danger"><?= $validation['re_password'] ?></span>
            <?php endif ?>
        </div>
    </div>
    <div class="border mt-3 p-3 shadow">
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="/admin" class="btn btn-danger">İptal</a>
    </div>
</form>
<?= $this->endSection() ?>