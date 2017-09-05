<?php include 'includes/db.php';   ?>
<?php include 'includes/header.php';   ?>


    <!-- Navigation -->
    <?php include 'includes/navigation.php';   ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
                 
                if(isset($_POST['submit'])){
                 $search = $_POST['search'];
                 
                 $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                 $search_query = mysqli_query($conn, $query);
                 if(!$search_query){
                     die("Query Failed". mysqli_error($conn));
                 }
                 $count = mysqli_num_rows($search_query);
                 if($count==0){
                     echo "<h2>No result!</h2>";
                 }else{
                    
      
      while ($row = mysqli_fetch_assoc($search_query)){
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'],0,0);?>
                
         

                <!-- First Blog Post -->
                <div id="post_title" class="text-center">
                <h2>
                    <a id="a_post_title" href="#"><?php echo $post_title;  ?></a>
                </h2>
                </div>
               <hr>
               <img class="img-responsive" src="images/<?php echo $post_image;   ?>" alt="">
                <hr>
                <p><?php echo $post_content;  ?></p>
                <?php
                if(isset($_GET['p_id'])){
                 $the_post_id = $_GET['p_id'];
                }
                 ?>
                   
              <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;  ?>">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
               
                
                
                <hr>    
                
          
            <?php }   ?>
            <?php   }
                 
                }?>
                
        
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php';   ?>
            

        </div>
        <!-- /.row -->

    </div>
        
        <?php include 'includes/footer.php';   ?>

        