<?= $this->extend('site/index') ?>
<?= $this->section('content') ?>
<!-- Blog Entries Column -->

<div class="col-md-8 my-4 d-flex justify-content-center">
    <form method="post" class="card p-4 col-8">
        <?= view('/site/components/email_send_form') ?>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>


<?= $this->endSection() ?>