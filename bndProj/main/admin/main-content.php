<div class="content">
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include('main-content/'. $page . '.php');
  } else {
    include('main-content/viewUserProfileBoundary.php'); // Load a default page if no page is specified
  }
  ?>
</div>
<!-- Add new pages into the main-content folder. -->