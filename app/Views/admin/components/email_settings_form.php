<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title"><?= $title ?></h5>
        <div class="form-group">
            <label for="protocol">Protokol:</label>
            <?php if (isset($validation['protocol'])) : ?>
                <span class="text-danger"><?= $validation['protocol'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('protocol') : (isset($item) ? $item->protocol : '') ?>" name="protocol" id="protocol">
        </div>
        <div class="form-group">
            <label for="host">Host:</label>
            <?php if (isset($validation['host'])) : ?>
                <span class="text-danger"><?= $validation['host'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('host') : (isset($item) ? $item->host : '') ?>" name="host" id="host">
        </div>
        <div class="form-group">
            <label for="port">Port:</label>
            <?php if (isset($validation['port'])) : ?>
                <span class="text-danger"><?= $validation['port'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('port') : (isset($item) ? $item->port : '') ?>" name="port" id="port">
        </div>
        <div class="form-group">
            <label for="user_name">Eposta Başlığı:</label>
            <?php if (isset($validation['user_name'])) : ?>
                <span class="text-danger"><?= $validation['user_name'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('user_name') : (isset($item) ? $item->user_name : '') ?>" name="user_name" id="user_name">
        </div>
        <div class="form-group">
            <label for="user">Kullanıcı Eposta:</label>
            <?php if (isset($validation['user'])) : ?>
                <span class="text-danger"><?= $validation['user'] ?></span>
            <?php endif ?>
            <input type="text" class="form-control" value="<?= (isset($validation)) ? set_value('user') : (isset($item) ? $item->user : '') ?>" name="user" id="user">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <?php if (isset($validation['password'])) : ?>
                <span class="text-danger"><?= $validation['password'] ?></span>
            <?php endif ?>
            <input type="password" class="form-control" value="<?= (isset($validation)) ? set_value('password') : (isset($item) ? $item->password : '') ?>" name="password" id="password">
        </div>
        <?= csrf_field() ?>

    </div>
</div>