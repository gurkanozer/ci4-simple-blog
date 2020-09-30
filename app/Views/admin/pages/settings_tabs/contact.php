<div class="tab-pane fade show p-3" id="contact" role="tabpanel">
<div class="form-group mb-3">
        <label for="contact_banner">İletişim Sayfası Görseli:</label>
        <?php if (isset($validation['contact_banner'])) : ?>
            <span class="text-danger"><?= $validation['contact_banner'] ?></span>
        <?php endif ?>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="contact_banner" name="contact_banner">
            <label class="custom-file-label" for="contact_banner">İletişim sayfası görseli...</label>
        </div>
    </div>
    <div class="form-group">
        <?php if (isset($result->contact_banner)) : ?>
            <img src="<?= get_image($result->contact_banner, "exsm", "contact") ?>" alt="<?= $result->contact_banner ?>">
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="phone">Telefon:</label>
        <?php if (isset($validation['phone'])) : ?>
            <span class="text-danger"><?= $validation['phone'] ?></span>
        <?php endif ?>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">(+90)</span>
            </div>
            <input type="text" class="form-control" name="phone" id="phone"
        value="<?= (isset($validation)) ? set_value('phone') : (isset($result->phone) ? $result->phone : null) ?>"
            >
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="address">Adres:</label>
        <?php if (isset( $validation['address'])) : ?>
            <span class="text-danger"><?= $validation['address'] ?></span>
        <?php endif ?>
        <textarea class="form-control" name="address" id="address" rows="5"><?= (isset( $validation)) ? set_value('address') : (isset($result->address) ? $result->address : '') ?></textarea>
    </div>
</div>