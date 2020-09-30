<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title"><?= $title ?></h5>
        <div class="form-group">
            <label for="title">Başlık:</label>
            <?php if (isset($validation['title'])) : ?>
                <span class="text-danger"><?= $validation['title'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('title') : (isset($post) ? $post->title : '') ?>" name="title" id="title" placeholder="Başlık...">
        </div>
        <div class="form-group">
            <label for="sub_title">Alt Başlık:</label>
            <?php if (isset($validation['sub_title'])) : ?>
                <span class="text-danger"><?= $validation['sub_title'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('sub_title') : (isset($post) ? $post->sub_title : '') ?>" id="text" name="sub_title" placeholder="Alt başlık...">
        </div>
        <!-- Kategoriler için Select eklenecek... -->
        <div class="form-group">
            <label for="categories">Kategoriler:</label>
            <?php if (isset($validation['category_id'])) : ?>
                <span class="text-danger"><?= $validation['category_id'] ?></span>
            <?php endif ?>
            <select class="form-control" id="categories" name="categories">
                <?php foreach ($categories as $category) : ?>
                    <option <?= (isset($post) && $post->category_id == $category->id) ? "selected" : " " ?> value="<?= $category->id ?>"><?= $category->title ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="img">Görsel:</label>
            <?php if (isset($validation['img'])) : ?>
                <span class="text-danger"><?= $validation['img'] ?></span>
            <?php else : ?>
                <span><?= isset($post) ? $post->img : "" ?> </span>
            <?php endif ?>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img">
                <label class="custom-file-label" for="img"><?= isset($post) ? 'Görseli değiştir...' : 'Görsel Seçiniz...' ?></label>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="body">Post İçeriği:</label>
            <?php if (isset($validation['body'])) : ?>
                <span class="text-danger"><?= $validation['body'] ?></span>
            <?php endif ?>
            <textarea class="form-control" name="body" id="body" rows="12"><?= (isset($validation)) ? set_value('body') : (isset($post) ? $post->body : '') ?></textarea>
        </div>
        <?= csrf_field() ?>

    </div>
</div>