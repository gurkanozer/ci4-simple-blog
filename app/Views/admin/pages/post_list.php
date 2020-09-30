<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>
<?php if (!empty($result)) : ?>
  <table class="table table-bordered shadow content-container">
    <thead>
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">Başlık / Alt Başlık</th>
        <th scope="col" class="text-center">Görsel</th>
        <th scope="col" class="text-center">Durumu</th>
        <th scope="col" class="text-center">İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $post) : ?>
        <?= view('admin/components/post', ['post' => $post]) ?>
      <?php endforeach ?>
    </tbody>
  </table>
<?php else : ?>
  <div class="alert alert-danger text-center">
    Kayıt bulunamadı.
  </div>
<?php endif ?>
<?= $this->endSection() ?>