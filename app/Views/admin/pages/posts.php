<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>
<?= view_cell('App\Libraries\Blog::post_item', ['post' => 'asd']) ?>
<?= $this->endSection() ?>
