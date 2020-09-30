<div class="tab-pane fade show p-3" id="social" role="tabpanel">
    <div class="form-group">
        <label for="facebook">Facebook:</label>
        <?php if (isset( $validation['facebook'])) : ?>
            <span class="text-danger"><?=  $validation['facebook'] ?></span>
        <?php endif ?>
        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook..."
        value="<?= (isset( $validation)) ? set_value('facebook') : (isset($result->facebook) ? $result->facebook : '') ?>"
        >
    </div>
    <div class="form-group">
        <label for="twitter">Twitter:</label>
        <?php if (isset( $validation['twitter'])) : ?>
            <span class="text-danger"><?=  $validation['twitter'] ?></span>
        <?php endif ?>
        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter..."
        value="<?= (isset( $validation)) ? set_value('twitter') : (isset($result->twitter) ? $result->twitter : '') ?>"
        >
    </div>
    <div class="form-group">
        <label for="instagram">Instagram:</label>
        <?php if (isset( $validation['instagram'])) : ?>
            <span class="text-danger"><?=  $validation['instagram'] ?></span>
        <?php endif ?>
        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram..."
        value="<?= (isset( $validation)) ? set_value('instagram') : (isset($result->instagram) ? $result->instagram : '') ?>"
        
        >
    </div>
</div>