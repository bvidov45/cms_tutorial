<?php include 'includes/db.php';   ?>
<?php include 'includes/header.php';   ?>


    <!-- Navigation -->
    <?php include 'includes/navigation.php';   ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
       

            <!-- Blog Entries Column -->
            <div class="col-md-12">
               <?php
               if(isset($_GET['category'])){
                 $post_category_id = $_GET['category'];
                 $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                 $result = mysqli_query($conn, $query);
                 while($rows = mysqli_fetch_array($result)){  ?>
                    
                <h2 class="text-info"><?php echo  $rows['cat_title'];  ?></h2>
                <hr>      
                    
               <?php  } 
               }
               
               
               $stmt = mysqli_prepare($conn, "SELECT post_id, post_title, post_image, post_content FROM posts WHERE post_categories_id = ? ") ;
              
               mysqli_stmt_bind_param($stmt, 'i', $post_category_id);
               
               mysqli_stmt_execute($stmt);
                
               mysqli_stmt_bind_result($stmt,$post_id, $post_title, $post_image, $post_content );
               
               
              
      
      while (mysqli_stmt_fetch($stmt)){
          $post_content = substr($row['post_content'],0,0);
        ?>
                
              
                

                <!-- First Blog Post -->
              
                      
         <div id="div_post" class="col-md-4">
             <div id="text_post" class="text-center">
                 <div id="title_post" >
                <h2>
                    <a id="main_post" href="post.php?p_id=<?php echo $post_id;  ?>"><?php echo $post_title;  ?></a>
                </h2>
                 </div>
                 <div>
                <a href="post.php?p_id=<?php echo $post_id;  ?>">
                    <img id="main_pic"  class="img-responsive" src="images/<?php echo $post_image;   ?>" alt=""></a>
                    </div>
                    <div>
                <p><?php echo $post_content;  ?></p>
                    </div>
                 
                 <a href="post.php?p_id=<?php echo $post_id;  ?>"><div id="link_div"><p>Click To See More</p></div></a>
                 
                <hr>
                </div>
                </div>
                    <?php }  ?> 
                
            
            </div>

           
            

        </div>
        <!-- /.row -->

    </div>
        
        <?php include 'includes/footer.php';   ?>

        