<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= $this->include('admin/includes/styles') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="#">B10G</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/post/list">Postlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/post/add">Post Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/categories">Kategoriler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/settings">Ayarlar</a>
                    </li>
                </ul>
                <form class="form-inline ml-auto" method="post" action="/admin/post/search" >
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Post Ara..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/admin/user"><i class="fa fa-user-md"></i> Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout"><i class="fa fa-sign-out"></i> Çıkış Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4 col-md-8">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="footer row m-0  justify-content-center border-top p-4">
        <p>Gürkan Özer <strong class="text-primary">&copy</strong> <?= date("Y") ?> | Simple Blog Example</p>
    </div>
    <?= $this->include('admin/includes/scripts') ?>
</body>

</html>