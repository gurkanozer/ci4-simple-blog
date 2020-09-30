<?= $this->extend('site/index') ?>
<?= $this->section('content') ?>
<!-- Blog Entries Column -->
<div class="col-md-8">

  <h1 class="my-4 text-center"><?= $post->title ?>
  </h1>

  <!-- Blog Post -->
  <?= view('site/components/post_detail') ?>
</div>


<?= $this->endSection() ?>