<div class="content">
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include('boundaries/'. $page . '.php');
  } else {
    include('boundaries/viewWorkslotsBoundary.php'); // Load a default page if no page is specified
  }
  ?>
</div>
<!-- Add new pages into the boundaries folder. -->