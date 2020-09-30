<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>
<div class=" mb-3 p-3 shadow">
  <form method="post" class="none-action-form">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Yeni Kategori Ekle" name="title">
      <?= csrf_field() ?>
      <div class="input-group-append">
        <button class="btn btn-outline-primary add-item-btn"
                type="button"
                data-url="categories/add"
                id="new_category"><i class="fa fa-plus"></i> Ekle</button>
      </div>
    </div>
    <?php if (isset($validation['title'])) : ?>
                <span class="text-danger"><?= $validation['title'] ?></span>
            <?php endif ?>
  </form>
</div>
<table class="table table-bordered shadow content-container">
  <thead>
    <tr>
      <th scope="col" class="text-center">#</th>
      <th scope="col" class="text-center">Kategori</th>
      <th scope="col" class="text-center">Durumu</th>
      <th scope="col" class="text-center">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $category) : ?>
      <?= view_cell('App\Libraries\Blog::category_item', ['category' => $category]) ?>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection() ?>