<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#basic" role="tab" aria-selected="true">Genel Ayarlar</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#about" role="tab" aria-selected="false">Hakkımızda</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#social" role="tab" aria-selected="false">Sosyal Medya</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-selected="false">İletişim</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" href="settings/email">E posta</a>
  </li>
</ul>
<form method="post" enctype="multipart/form-data">
  <div class="tab-content shadow" id="myTabContent">
    <?= $this->include('admin/pages/settings_tabs/basic') ?>
    <?= $this->include('admin/pages/settings_tabs/about') ?>
    <?= $this->include('admin/pages/settings_tabs/social') ?>
    <?= $this->include('admin/pages/settings_tabs/contact') ?>
  </div>
  <div class="border mt-3 p-3 shadow">
    <button type="submit" class="btn btn-primary">Kaydet</button>
    <a href="/admin" class="btn btn-danger">İptal</a>
  </div>
</form>
<?= $this->endSection() ?>