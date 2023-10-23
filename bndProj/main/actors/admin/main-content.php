<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include('boundaries/'. $page . '.php');
  } else {
    include('boundaries/viewUserProfileBoundary.php'); // Load a default page if no page is specified
  }