<?php 
    $page_title = "Dashboard";
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
                <?php 
                    $newcode = rand(10000, 99999);
                    echo $newcode;
                ?>
            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

<?php include "inc/footer.php"; ?>
