<?php include "inc/header.php" ?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Reported Post</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
            </div>
        </div>
    </div>

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
                                        //$query = "SELECT DISTINCT * FROM blog,report WHERE post_id = blog_id ORDER BY post_id DESC";
                                        $selrepPst = "SELECT * FROM report,blog WHERE blog_id = post_id GROUP BY blog_id ORDER BY COUNT(blog_id) DESC";
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
                                                    <a href="viewpost.php?view_post=<?php echo $post_id; ?>" class="btn btn-warning">View</a>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>


<?php include "inc/footer.php" ?>