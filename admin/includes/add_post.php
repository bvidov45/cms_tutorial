<?php include '../includes/db.php';   ?>
<?php 
if(isset($_POST['create_post'])){
   
    $post_title = $_POST['title'];
    $post_categories_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_content_slashes = addslashes($post_content);
    
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $stmt = mysqli_prepare($conn, "INSERT INTO posts(post_categories_id, post_title, post_status, post_image, post_content, post_tags) VALUES(?,?,?,?,?,?)" );
    mysqli_stmt_bind_param($stmt, 'isssss', $post_categories_id, $post_title, $post_status, $post_image, $post_content, $post_tags);
    mysqli_stmt_execute($stmt);
    
  
           if(!$stmt){
        die("Query failed" .mysqli_error($conn));
    }
     $the_post_id = mysqli_insert_id($conn);
     echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>  Edit More Posts</a></p>";
}


?>


<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Post Title</label> 
        <input type="text" class="form-control" name="title">
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
          
          echo "<option value='{$cat_id}'>{$cat_title}</option>";
          
          
          }
            
       ?>
        </select>
        
    </div>
    
    
    <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="">
            <option value="draft">Select Options</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_image">Post Image</label> 
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label> 
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label> 
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea><br>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post"> 
        </div>
    </div>
        
</form>