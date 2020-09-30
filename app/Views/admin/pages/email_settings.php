<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>
<form method="post" enctype="multipart/form-data">
    <?= view('/admin/components/email_settings_form', ['title' => 'E posta Servis Ayarları']) ?>
    <div class="border mt-3 p-3 shadow">
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="/admin/settings" class="btn btn-danger">İptal</a>
    </div>
</form>
<?= $this->endSection() ?>