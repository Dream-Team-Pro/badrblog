<?php 
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php";
?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['addcategory'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $creater_name = "";         
            date_default_timezone_set('Asia/Riyadh');
            $datetime   = date('d-m-y h:m', time());            
            
            $error_msg = "";
            if(strlen($name) < 5 || strlen($name) > 50) {
                $error_msg = "Category Name must be between 5 and 50 character";
            }

            if(empty($error_msg)) {
                if(! session_id()){
                    session_start();
                }  
                // Insert Data In Database
                if(insert_category($datetime, $name, $creater_name)) {      
                     $_SESSION['success'] = "Category has been Saved Successfully";
                    redirect("categories.php");
                }else {
                    $_SESSION['error'] = "Unable to Add Category";
                    redirect("categories.php");
                }
            }else {
                if(! session_id()){
                    session_start();
                }                 
                $_SESSION['error'] = $error_msg;
                redirect("categories.php");
            }
        }
    }

?>

    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10">
                <div class="categories">

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


                    <h4>Categories</h4>
                    <form action="categories.php" method="post">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Category Name" autocomplete="off" required>                            
                                </div>
                            </div>
                            <div class="col-sm">
                        <input type="submit" value="Add Category" name="addcategory" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Datetime</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created_by</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $number = 0;
                        foreach (get_categories() as $category) { $number++;  ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $number; ?></th>
                                <td class="text-center"><?php echo $category['datetime']; ?></td>
                                <td class="cat_name">
                                    <?php 
                                        echo $category['name'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $category['creater_name'];
                                    ?>
                                </td>                                
                                
                                <td class="action-links text-center">
                                    <a href="post.php?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Are You Sure ?');" action="deletepost.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletepost">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                    </div>                   
                </div>




            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

<?php include "inc/footer.php"; ?>
