<!DOCTYPE html>
<html lang="en">

<?= view("site/partials/head") ?>

<body>
  <?= view("site/partials/navigation") ?>
  <?= view("site/partials/pageHeader") ?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <?= $this->renderSection('content') ?>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <?= view("site/widgets/searchWidget") ?>
        <?= view("site/widgets/categoriesWidget") ?>
        <?= view("site/widgets/sideWidget") ?>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <!-- Social Media Accounts -->
  <?= view("site/partials/social") ?>

  <?= view("site/partials/footer") ?>
  <!-- Bootstrap core JavaScript -->
  <?= $this->include('site/includes/scripts') ?>
</body>

</html>