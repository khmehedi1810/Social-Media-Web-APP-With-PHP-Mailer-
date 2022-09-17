<?php include "inc/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View All Your Post</h1>

          <div class="row">
          	<div class="col-md-12">
          	<!-- View All Blog Post inside the Table -->
            
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Post</h6>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">Thumbnail</th>
                      <th scope="col">Date</th>
                      <th scope="col">Author</th>
                      <th scope="col">Category</th>
                      <th scope="col">Post status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                  <?php
                    $userid = $_SESSION['userid'];
                    $query = "SELECT * FROM blog WHERE aut_id = '$userid' ORDER BY post_id DESC";
                    $all_blog = mysqli_query($connection, $query);
                    mysqli_query($connection,'SET CHARACTER SET utf8'); 
                    mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($all_blog)){
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
                          

                      <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $post_title; ?></td>
                      <td><img src="img/posts/<?php echo $post_thumb; ?>" width="150"></td>
                      <td><?php echo $post_date; ?></td>
                      <td><?php echo $post_author; ?></td>
                      <td><?php echo $post_category; ?></td>
                      <td><?php echo $post_status; ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="viewfullpost.php?view_post=<?php echo $post_id; ?>" class="btn btn-success btn-sm">View</a>
                          <a href="update_post.php?update=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Update</a>
                          <a href="view-all-post.php?delete=<?php echo $post_id; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </td>
                    </tr>


                  <?php  }
                  ?>

                    

                  </tbody>
                </table>
              </div>
            </div>


          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php

        if ( isset($_GET['delete']) ){

          $post_id  = $_GET['delete'];


          $delpst    = "DELETE FROM blog WHERE post_id='$post_id'";
          $delCom    = "DELETE FROM comments WHERE blog_id='$post_id'";
          $delRep    = "DELETE FROM report WHERE blog_id='$post_id'";

          $delete_post    = mysqli_query($connection, $delpst);
          $delete_postCom = mysqli_query($connection, $delCom);
          $delete_postRep = mysqli_query($connection, $delRep);

          if ( !$delete_post || !$delete_postCom || !$delete_postRep ){
            die("Query Failed ". mysqli_error($connection));
          }
          else{
            header("Location: view-all-post.php");
          }
        }

      ?>

<?php include "inc/footer.php"; ?>

