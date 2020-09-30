<div class="card mb-4">
    <img class="card-img-top" src="<?= get_image($post_sneak->img,"sneak","posts") ?>" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title"><?= $post_sneak->title ?></h2>
      <p class="card-text"><?= character_limiter($post_sneak->body,200)?> </p>
      <a href="post/<?= $post_sneak->url ?>" class="btn btn-outline-dark">Devamı &rarr;</a>
    </div>
    <div class="px-3 pb-4 text-muted">
      <?= $post_sneak->created_at ?>
      <a href="/categories/<?= $post_sneak->category_title ?>"><?= $post_sneak->category_title ?></a>,
      <a href="/about"><?= $user->fullname ?></a>
    </div>
  </div>