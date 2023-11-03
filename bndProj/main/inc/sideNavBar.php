<aside class="main-sidebar">
  <a href="index.php" class="brand-link navbar-gray text-sm">
    <span class="brand-text font-weight-light">Brownies and Downies</span>
  </a>


  <?php
  ob_start();
  //ADMIN SIDE BAR
  if($_SESSION["currentUserProfileId"] == 1)
  {
    echo '  
    <div class="sidebar">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat" role="menu">
        <li class="nav-header">User Profiles</li>
        <li class="nav-item">
          <a href="index.php?page=viewUserProfileBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View All User Profiles</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=createUserProfileBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card"></i>
            <p>Create User Profile</p>
          </a>
        </li>
        <li class="nav-header">User Accounts</li>
        <li class="nav-item">
          <a href="index.php?page=viewUserAccountBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View All User Accounts</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=createUserAccountBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card"></i>
            <p>Create User Account</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>';
  }

  //OWNER SIDE BAR
  elseif ($_SESSION["currentUserProfileId"] == 2)
  {
    echo '  
    <div class="sidebar">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat" role="menu">
        <li class="nav-header">Work Slots</li>
        <li class="nav-item">
          <a href="index.php?page=viewWorkslotsBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-briefcase active"></i>
            <p>View Workslots</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=createWorkslotsBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-clock"></i>
            <p>Create Workslots</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>';
  }

  //MANAGER SIDE BAR
  elseif ($_SESSION["currentUserProfileId"] == 3)
  {
    echo '  
    <div class="sidebar">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat" role="menu">
        <li class="nav-header">Cafe Staff</li>
        <li class="nav-item">
          <a href="index.php?page=viewWorkslotsBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View Workslots</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=viewAllCafeStaffBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View All Cafe Staff</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=viewAndOfferWorkSlotBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View And Offer Workslot</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=viewBiddingListBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View Bidding List</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>';
  }

  //CAFE STAFF SIDE BAR
  else
  {
    echo '  
    <div class="sidebar">
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat" role="menu">
        <li class="nav-header">Cafe Staff</li>
        <li class="nav-item">
          <a href="index.php?page=viewAndSearchAvailableBidsBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View Available Bids</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=viewMyBidsBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View My Bids</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=viewMyOffersBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View My Offers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=viewMyWorkslotsBoundary" class="nav-link nav-home">
            <i class="nav-icon fas fa-address-card active"></i>
            <p>View My Assigned Workslots</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>';
  }
  ?>

  <!-- Admin Side Bar -->
</aside>

<!-- For redirect, use this format: href="index.php?page=<YOUR BOUNDARY FILE NAME>"-->