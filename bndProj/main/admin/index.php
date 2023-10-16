<!DOCTYPE html>

<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/f2f42d264c.js" crossorigin="anonymous"></script>
</head>

<style>
    #main-content {
        margin-left: 260px;
        padding: 20px;
    }
</style>

<html lang="en" class="" style="height: auto;">
<body>
        <?php include('topBar.php'); ?>

        <div class="row">
            <div class="col-md-2">
                <?php include('sideNavBar.php'); ?>
            </div>

            <div class="col-md-10" id="main-content">
                <?php include('main-content.php'); ?>
            </div>
</body>