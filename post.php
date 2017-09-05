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
               if(isset($_GET['p_id'])){
                 $the_post_id = $_GET['p_id'];
                   
               }
               
               
               $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
               $select_all_posts = mysqli_query($conn, $query);
      
      while ($row = mysqli_fetch_assoc($select_all_posts)){
          $post_title = $row['post_title'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];?>
                
          

                <!-- First Blog Post -->
                <div id="post_title" class="text-center">
                <h2>
                    <a id="a_post_title" href="#"><?php echo $post_title;  ?></a>
                </h2>
                </div>
               <hr>
               
               <img class="img-responsive" src="images/<?php echo $post_image;   ?>" alt="">
               <hr>
               <div class="content_main">
                <p><?php echo $post_content;  ?></p>
               </div>
                
                

                <hr>  
               
                
                
                
                
          
            <?php }   ?>
                
             
                
                  

                <!-- Posted Comments -->
        
                
                 <div class="col-md-12">
                    
                    <ul class="social-network social-circle">
                        <li><a href="https://www.facebook.com/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://plus.google.com/" class="icoGoogle_plus" title="Goggle-plus"><i class="fa fa-google-plus-official"></i></a></li>
                        <li><a href="https://www.tumblr.com/" class="icoTumbir" title="Tumbir"><i class="fa fa-tumblr"></i></a></li>
                    </ul>				
                </div> 
         </div>
      
               
            

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php';   ?>
            

        </div>
        <!-- /.row -->
    
    </div>
        
        <?php include 'includes/footer.php';   ?>

        