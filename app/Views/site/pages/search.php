<?= $this->extend('site/index') ?>
<?= $this->section('content') ?>
<!-- Blog Entries Column -->
<div class="col-md-8">

  <h1 class="my-4">Arama sonuçları
  </h1>
  <!-- Blog Post -->
  <?php foreach($posts as $p): ?>
    <?= view("site/components/post_card_sm",['post_result'=>$p]) ?>
    <?php endforeach?>
</div>
<?= $this->endSection() ?>