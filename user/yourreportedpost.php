<?php include "inc/header.php"; ?>


		<div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All <b class="text-danger">REPORTED</b> Post</h4>
                        <h6 class="card-subtitle">Review post here.</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Title</th>
                                        <th class="border-top-0">Thumbnail</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Author</th>
                                        <th class="border-top-0">Category</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $userID = $id;
                                        //$query = "SELECT DISTINCT * FROM blog,report WHERE post_id = blog_id ORDER BY post_id DESC";
                                        $selrepPst = "SELECT * FROM report,blog WHERE blog_id = post_id AND aut_id = '$userID' GROUP BY blog_id ORDER BY COUNT(blog_id) DESC";
                                        $select_rep_pst = mysqli_query($connection, $selrepPst);
                                        $i = 0;
                                        while ( $row = mysqli_fetch_assoc($select_rep_pst) )
                                        {
                                          $post_id          = $row['post_id'];
                                          $post_title       = $row['post_title'];
                                          $post_desc        = $row['post_desc'];
                                          $post_thumb       = $row['post_thumb'];
                                          $post_date        = $row['post_date'];
                                          $post_author      = $row['post_author'];
                                          $post_category    = $row['post_category'];
                                          $post_status      = $row['post_status'];
                                          $i++;
                                        ?>
                                            <tr class="bg-danger text-white">
                                              <th scope="row"><?php echo $i; ?></th>
                                              <td><?php echo $post_title; ?></td>
                                              <td><img src="../user/img/posts/<?php echo $post_thumb; ?>" width="150"></td>
                                              <td><?php echo $post_date; ?></td>
                                              <td><?php echo $post_author; ?></td>
                                              <td><?php echo $post_category; ?></td>
                                              <td>
                                                <div class="btn-group">
                                                  <a href="viewfullpost.php?view_post=<?php echo $post_id; ?>" class="btn btn-success btn-sm">View</a>
						                          <a href="update_post.php?update=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Update</a>
						                          <a href="view-all-post.php?delete=<?php echo $post_id; ?>" class="btn btn-warning btn-sm">Delete</a>
						                        </div>
                                              </td>
                                            </tr>

                                            <?php

                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <?php

        if ( isset($_GET['delete']) ){
          $post_id  = $_GET['delete'];
          $query    = "DELETE FROM blog WHERE post_id='$post_id'";

          $delete_post = mysqli_query($connection, $query);

          if ( !$delete_post ){
            die("Query Failed ". mysqli_error($connection));
          }
          else{
            header("Refresh:0");
          }
        }

      ?>
<?php include "inc/footer.php"; ?>