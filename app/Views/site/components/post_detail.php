<div class="card">
    <h3 class="card-header bg-white"><?= $post->sub_title ?></h3>
<div class="card-body">
<p><?= nl2br($post->body) ?></p>
</div>
<div class="card-footer bg-light">
    <p><?= $post->created_at ?>, <a href="/categories/<?= $post->category_title ?>"><?= $post->category_title ?></a>, <a href="/about"><?= $user->fullname ?></a> 
</p>    
</div>
</div>