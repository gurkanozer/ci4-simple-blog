<div class="tab-pane fade show p-3 " id="about" role="tabpanel">
    <div class="form-group mb-3">
        <label for="about_banner">Hakkımızda Sayfası Görseli:</label>
        <?php if (isset($validation['about_banner'])) : ?>
            <span class="text-danger"><?= $validation['about_banner'] ?></span>
        <?php endif ?>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="about_banner" name="about_banner">
            <label class="custom-file-label" for="about_banner">Hakkımızda sayfası görseli...</label>
        </div>
    </div>
    <div class="form-group">
        <?php if (isset($result->about_banner)) : ?>
            <img src="<?= get_image($result->about_banner, "exsm", "about") ?>" alt="<?= $result->about_banner ?>">
        <?php endif ?>
    </div>
    <div class="form-group mb-3">
        <label for="about">Hakkımızda:</label>
        <?php if (isset($validation['about'])) : ?>
            <span class="text-danger"><?= $validation['about'] ?></span>
        <?php endif ?>
        <textarea class="form-control" name="about" id="about" rows="10"><?= (isset($validation['about'])) ? set_value('about') : (isset($result->about) ? $result->about : '') ?></textarea>
    </div>
</div>