<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>
<form method="post" enctype="multipart/form-data">
<?= view_cell('App\Libraries\Blog::post_form',['title'=>'Kaydı Düzenle']) ?>
    <div class="border mt-3 p-3 shadow">
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="/admin" class="btn btn-danger">İptal</a>
    </div>
</form>
<?= $this->endSection() ?>