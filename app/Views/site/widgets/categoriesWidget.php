        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header bg-success text-light">Kategoriler</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <?php foreach ($categories as $key => $category) : ?>
                  <a href="/categories/<?= $category->title ?>"><?= $category->title ?></a>
                  <?php if ($key !== array_key_last($categories)) echo "-"; ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>