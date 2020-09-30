<div class="tab-pane fade show active p-3" id="basic" role="tabpanel">
    <div class="form-group">
        <label for="site_name">Site Adı:</label>
        <?php if (isset($validation['site_name'])) : ?>
            <span class="text-danger"><?= $validation['site_name'] ?></span>
        <?php endif ?>
        <input type="text" class="form-control" name="site_name" id="site_name" placeholder="Site adı..."
        value="<?= (isset($validation)) ? set_value('site_name') : (isset($result->site_name) ? $result->site_name : '') ?>"
        >
    </div>
    <div class="form-group">
        <label for="site_name">Slogan:</label>
        <?php if (isset($validation['slogan'])) : ?>
            <span class="text-danger"><?= $validation['slogan'] ?></span>
        <?php endif ?>
        <input type="text" class="form-control" name="slogan" id="slogan" placeholder="Slogan..."
        value="<?= (isset($validation)) ? set_value('slogan') : (isset($result->slogan) ? $result->slogan : '') ?>"
        >
    </div>
    <div class="form-group mb-3">
        <label for="home_banner">Ana Sayfa Görseli:</label>
        <?php if (isset($validation['home_banner'])) : ?>
            <span class="text-danger"><?= $validation['home_banner'] ?></span>
        <?php endif ?>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="home_banner" name="home_banner">
            <label class="custom-file-label" for="home_banner" >Ana sayfa görseli...</label>
        </div>
    </div>
    <div class="form-group">
        <?php if(isset($result->home_banner)): ?>
        <img src="<?= get_image($result->home_banner, "exsm", "home") ?>" alt="<?= $result->home_banner ?>">
        <?php endif ?>
    </div>
    <div class="form-group mb-3">
        <label for="logo">Site Logosu:</label>
        <?php if (isset($validation['logo'])) : ?>
            <span class="text-danger"><?= $validation['logo'] ?></span>
        <?php endif ?>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="logo" name="logo">
            <label class="custom-file-label" for="logo" >Logo...</label>
        </div>
    </div>
    <div class="form-group">
        <?php if(isset($result->logo)): ?>
        <img src="<?= get_image($result->logo, "exsm", "logo") ?>" alt="<?= $result->logo ?>">
        <?php endif ?>
    </div>
    <?= csrf_field() ?>
</div>