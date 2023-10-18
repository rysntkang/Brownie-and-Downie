<div class="content">
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include($page . '.php');
  } else {
    include('main-content/default.php'); // Load a default page if no page is specified
  }
  ?>
</div>