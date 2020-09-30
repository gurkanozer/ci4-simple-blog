<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B10G</title>
    <?= $this->include('includes/styles') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand" href="#">B10G</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/user">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/settings">Ayarlar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/posts">Postlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/add_post">Post Ekle</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
    <?= $this->include('includes/scripts') ?>
</body>

</html>