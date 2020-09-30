<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead" style="background-image: url(
  <?php if (isset($post->title)) {
    echo get_image($post->img, 'full', 'posts');
  } else {
    switch ($info['meta_title']) {
      case 'Home':
        echo get_image($settings->home_banner, 'full', 'home');
        break;
      case 'About':
        echo get_image($settings->about_banner, 'full', 'about');
        break;
      case 'Contact':
        echo get_image($settings->contact_banner, 'full', 'contact');
        break;
    }
  } ?>)">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <h1 class="font-weight-light text-white"><?= (isset($post->title)) ? null : $settings->site_name ?></h1>
        <p class="lead text-white"><?= (isset($post->title)) ? null : $settings->slogan ?></p>
      </div>
    </div>
  </div>
</header>