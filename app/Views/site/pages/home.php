<?= $this->extend('site/index') ?>
<?= $this->section('content') ?>
<!-- Blog Entries Column -->
<div class="col-md-8">

  <h1 class="my-4"><?= $info['page_title'] ?>
    <small><?= $info['page_subtitle'] ?></small>
  </h1>
  <div class="content-container">
    <!-- Blog Post -->
    <?php foreach ($posts as $p) : ?>
      <?= view("site/components/post_sneak", ['post_sneak' => $p]) ?>
    <?php endforeach ?>
    <!-- Get More Posts -->
    <div class="text-center">
      <button class="btn btn-outline-primary more-posts" data-count="<?= $info['post_count'] ?>">Daha Fazla</button>
    </div>
  </div>
</div>
<?= $this->endSection() ?>