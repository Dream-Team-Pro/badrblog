<?php 
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php";
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10">
                <div class="admins">

                <?php
                    if(! session_id()) {
                        session_start();
                    }
                    if(isset($_SESSION['success']) && ! empty($_SESSION['success'])) {
                        echo "<div class='alert alert-success alert-dismissible fade show'>";
                        echo $_SESSION['success'];
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                        $_SESSION['success'] = "";

                    }
                    if(isset($_SESSION['error']) && ! empty($_SESSION['error'])) {
                        echo "<div class='alert alert-danger alert-dismissible fade show'>";
                        echo $_SESSION['error'];
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";   
                        $_SESSION['error'] = "";                 
                    }                                                    
                ?>


                    <h4>Posts</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Datetime</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role Type</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $number = 0;
                        foreach (get_admins() as $admin) { $number++;  ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $number; ?></th>
                                <td class="text-center"><?php echo $admin['datetime']; ?></td>
                                <td class="text-center"><?php echo $admin['username']; ?></td>
                                <td class="text-center"><?php echo $admin['email']; ?></td>
                                <td class="text-center"><?php echo $admin['role_type']; ?></td>
                                
                                <td class="action-links text-center">
                                    <a href="admin.php?id=<?php echo $admin['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Are You Sure ?');" action="deleteadmin.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deleteadmin">
                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                        <a class="btn btn-primary float-right" href="admin.php">Add New Admin</a>
                    </div>                   
                </div>


            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

<?php include "inc/footer.php"; ?>
