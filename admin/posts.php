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
                <div class="posts">
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
                                <td>
                                    <?php 
                                    if (strlen($post['content']) > 200){
                                        echo substr($post['content'], 0, 200) . "  [...]";
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
                                <td class="text-center"><?php echo $post['author']; ?></td>
                                
                                <td class="action-links text-center">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="deletepost.php" method="post">
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
