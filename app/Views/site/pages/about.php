<?= $this->extend('site/index') ?>
<?= $this->section('content') ?>
<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="my-4 text-center"><?= $info['page_title'] ?>
    </h1>
    <p class="text-center"><?= $info['page_subtitle'] ?></p>
    <div class="card">
        <div class="card-body">
            <p><?= nl2br($settings->about) ?></p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>