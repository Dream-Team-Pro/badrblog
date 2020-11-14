<?php 
    $page_title = "Comments Page";
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
                <div class="approved-comments">

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


                    <h4>Approved Comments</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Datetime</th>
                                <th scope="col">Username</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $number = 0;
                        foreach (get_all_comments(1) as $comment) { $number++;  ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $number; ?></th>
                                <td class="text-center"><?php echo $comment['datetime']; ?></td>
                                <td class="text-center"><?php echo $comment['commenter_name']; ?></td>

                                <td class="text-center">
                                    <?php 
                                    if (strlen($comment['comment']) > 100){
                                        echo substr($comment['comment'], 0, 100) . "  [...]";
                                    }else {
                                        echo $comment['comment'];
                                    }
                                    ?>
                                </td>

                                <td class="text-center">
                                    <?php   $post_id = $comment['post_id'];
                                            $post_title = get_posts($post_id)['title'];
                                            if (strlen($post_title) > 50){
                                                echo substr($post_title, 0, 50) . "  [...]";
                                            }else {
                                                echo $post_title;
                                            }
                                    ?>
                                </td>
                                
                                <td class="action-links text-center">
                                    <a href="comment.php?id=<?php echo $comment['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Are You Sure ?');" action="deletecomment.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $comment['id']; ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletecomment">
                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                        <a class="btn btn-primary float-right" href="comment.php">Add New Comment</a>
                    </div>                   
                </div>

                <div class="unapproved-comments">

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


                    <h4>Unapproved Comments</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Datetime</th>
                                <th scope="col">Username</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $number = 0;
                        foreach (get_all_comments(0) as $comment) { $number++;  ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $number; ?></th>
                                <td class="text-center"><?php echo $comment['datetime']; ?></td>
                                <td class="text-center"><?php echo $comment['commenter_name']; ?></td>

                                <td class="text-center">
                                    <?php 
                                    if (strlen($comment['comment']) > 100){
                                        echo substr($comment['comment'], 0, 100) . "  [...]";
                                    }else {
                                        echo $comment['comment'];
                                    }
                                    ?>
                                </td>

                                <td class="text-center">
                                    <?php   $post_id = $comment['post_id'];
                                            $post_title = get_posts($post_id)['title'];
                                            if (strlen($post_title) > 50){
                                                echo substr($post_title, 0, 50) . "  [...]";
                                            }else {
                                                echo $post_title;
                                            }
                                    ?>
                                </td>
                                
                                <td class="action-links text-center">
                                    <a href="comment.php?id=<?php echo $comment['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Are You Sure ?');" action="deletecomment.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $comment['id']; ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletecomment">
                                        <input class="btn btn-info btn-sm" type="submit" value="Approve" name="approvecomment">
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
