<?php 
    $page_title = "Posts Page";
    include "inc/header.php";
    include "inc/functions.php"; 
    include "inc/navbar.php"; 
    $posts = "active";
?>

    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10">
                <div class="posts">

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
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Author</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $number = 0;
                        foreach (get_posts() as $post) { $number++;  ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $number; ?></th>
                                <td class="text-center"><?php echo $post['datetime']; ?></td>
                                <td class="title">
                                    <?php 
                                    if (strlen($post['title']) > 50){
                                        echo substr($post['title'], 0, 50) . "  [...]";
                                    }else {
                                        echo $post['title'];
                                    }
                                    ?>
                                </td>
                                <td class="content">
                                    <?php 
                                    if (strlen($post['content']) > 100){
                                        echo substr($post['content'], 0, 100) . "  [...]";
                                    }else {
                                        echo $post['content'];
                                    }
                                    ?>
                                </td>                                
                                <td class="text-center">
                                    <?php if(! empty($post['image'])) { ?>
                                    <img width="100" src="uploads/posts/<?php echo $post['image'] ?>" alt="Post Banner">
                                    <?php }else { echo "No Image"; } ?>
                                </td>
                                <td>
                                        <?php if(get_post_comments(1,$post['id'])) {
                                            echo "<span style='float:left;' class='badge badge-success'>". get_post_comments(1,$post['id']) ."</span>";
                                        }  ?>
                                        <?php if(get_post_comments(0,$post['id'])) {
                                            echo "<span style='float:right;' class='badge badge-warning'>". get_post_comments(0,$post['id']) ."</span>";
                                        }  ?>                                        
                                </td>
                                <td class="text-center"><?php echo $post['author']; ?></td>
                                
                                <td class="action-links text-center">
                                    <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Are You Sure ?');" action="deletepost.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletepost">
                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                        </table> 
                        <a class="btn btn-primary float-right" href="post.php">Add New Post</a>
                    </div>                   
                </div>




            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

<?php include "inc/footer.php"; ?>
