<?php 
    include "inc/header.php";
    include "inc/navbar.php"; 
     
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
            <div class="col-sm-10">
                Hello in posts page <br>
                <?php include "inc/connect.php"; ?>
            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

<?php include "inc/footer.php"; ?>
