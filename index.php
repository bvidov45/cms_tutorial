<?php include 'includes/db.php';   ?>
<?php include 'includes/header.php';   ?>


      <!-- Navigation -->
    <?php include 'includes/navigation.php';   ?>  
      
      <!-- jumbotron -->
      <div  class="jumbotron">
         <div class="text-center">
            <h3 id="head_title">Crazy things you can buy online!</h3>
        </div>
      </div>
      
    

    <!-- Page Content -->
    <div class="container">

        

        <div class="row">

            <!-- Blog Entries Column -->
            
               <?php
               if(isset($_GET['page'])){
                   $page = $_GET['page'];
               } else {
                   $page = "";
               }
               if($page == "" || $page == 1 ){
                   $page_1 = 0;
               }else{
                   $page_1 = ($page * 10) - 10;
               }
               
               $post_query_count = "SELECT * FROM posts";
               $find_count = mysqli_query($conn, $post_query_count);
               $count = mysqli_num_rows($find_count);
               $count = ceil($count / 9);
               
               
               
               
               
               
               $query = "SELECT * FROM posts ORDER BY RAND() LIMIT $page_1, 9";
               $select_all_posts = mysqli_query($conn, $query);
      
      while ($row = mysqli_fetch_assoc($select_all_posts)){
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'],0,0);
          $post_status = $row['post_status'];
          
          if($post_status == 'published'){
            
              
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
                    <?php }}   ?> 
               
             
                
         </div>
        
        <!-- /.row -->

        <hr>
        <ul class="pager">
         <?php
         for($i = 1; $i<=$count; $i++){
             if($i == $page){
                 
               echo "<li><a class='active_link'  href='index.php?page={$i}'>{$i}</a></li>";
                 
             } else {
                 
               echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
         }}
         
         
         
         ?>
             
            
        </ul>
            </div>

        
        
        <?php include 'includes/footer.php';   ?>

        