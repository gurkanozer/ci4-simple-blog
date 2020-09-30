  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-tr-dark fixed-top">
    <div class="container">
      <img class="rounded-circle" src="<?= get_image($settings->logo,"exsm","logo") ?>" width="30px" alt="">
      <a class="navbar-brand" href="/">&nbsp;<?= $settings->site_name ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?= ($info['meta_title'] == 'Home')?'active':'' ?>">
            <a class="nav-link" href="/">Ana Sayfa
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item <?= ($info['meta_title'] == 'About')?'active':'' ?>">
            <a class="nav-link" href="/about">Hakkımda</a>
          </li>
          <li class="nav-item <?= ($info['meta_title'] == 'Contact')?'active':'' ?>">
            <a class="nav-link" href="/contact">İletişim</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
