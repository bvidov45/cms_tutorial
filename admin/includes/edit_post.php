<?php  include_once '../includes/db.php';?>


<?php

          if(isset($_GET['p_id'])){
              $the_post_id = $_GET['p_id'];
                  
           }   
          

          $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
          $select_posts_by_id = mysqli_query($conn, $query);
        
          while ($row= mysqli_fetch_assoc($select_posts_by_id)){
          $post_id = $row['post_id']; 
          $post_title = $row['post_title'];
          $post_categories_id = $row['post_categories_id'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
          
          $post_tags = $row['post_tags'];
          $post_comment_count = $row['post_comment_count'];

          }
          if(isset($_POST['update_post'])){
           
    $post_title = $_POST['title'];
    $post_categories_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_content_slashes = addslashes($post_content);
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($select_image)){
            $post_image = $row['post_image'];
        }
    }
 
    
    
   
    $query = "UPDATE posts SET ";
    $query .="post_title = '{$post_title}', ";
    $query .="post_categories_id = '{$post_categories_id }', ";
    $query .="post_status = '{$post_status}', ";
    $query .="post_image = '{$post_image}', ";
    $query .="post_tags = '{$post_tags}', ";
    $query .="post_content = '{$post_content_slashes}' ";
    $query .= "WHERE post_id = {$the_post_id} ";
    
    $update_post = mysqli_query($conn, $query);
       
     if(!$update_post){
        die("Query failed" .mysqli_error($conn));
    }
    echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>  Edit More Posts</a></p>";
}
    
 
    
           



?>
<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Post Title</label> 
        <input value="<?php echo $post_title ;?>" type="text" class="form-control" name="title">
    </div>
   <div class="form-group">
       <label for="title">Post Category</label><br>
        <select name="post_category" id="">
       <?php
          $query = "SELECT * FROM categories";
          $select_categories = mysqli_query($conn, $query);
           if(!select_categories){
        die("Query failed" .mysqli_error($conn));
    }
          
         while ($row= mysqli_fetch_assoc($select_categories)){
          $cat_id = $row['cat_id']; 
          $cat_title = $row['cat_title'];
           
         if($cat_id == $post_categories_id){
              
            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
          }else{
              echo "<option value='{$cat_id}'>{$cat_title}</option>";
          }
          
          
          }
            
       ?>
        </select>
        
    </div>
    <div class="form-group">
    <select name="post_status" id="">
        <option value='<?php echo $post_status;  ?>'><?php echo $post_status;  ?></option>
        <?php
        if($post_status == 'published'){
           
            echo "<option value='draft'>Draft</option>";
        } else {
            echo "<option value='published'>Published</option>";
        }
        
        ?>
        
    </select>
    </div>

    
    <div class="form-group">
        <label for="post_image">Post Image</label> 
        <input type="file"  name="image">
        <img width="100" src="../images/<?php echo $post_image;  ?>" alt="">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label> 
        <input value="<?php echo $post_tags ;  ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label> 
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ;?>
        
       </textarea><br>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_post" value="Update Post"> 
        </div>
    </div>
        
</form>