
<?php  include_once '../includes/db.php';?>

<?php
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $postValueId ){
       $bulk_options = $_POST['bulk_options'];
        
       switch ($bulk_options){
          case 'published':
           $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$postValueId} ";   
           $update_to_publish_status = mysqli_query($conn, $query);
           if(!$update_to_publish_status){
               die("Query Failed" . mysqli_error($conn));
           }
              
              break;
              
           case 'draft':
           $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id= {$postValueId} ";   
           $update_to_draft_status = mysqli_query($conn, $query);
           if(!$update_to_draft_status){
               die("Query Failed" . mysqli_error($conn));
           }
              
              break;
              
           case 'delete':
           $query = "DELETE FROM posts WHERE post_id= {$postValueId} ";   
           $update_to_delete_status = mysqli_query($conn, $query);
           if(!$update_to_delete_status){
               die("Query Failed" . mysqli_error($conn));
           }
              
              break;
              
          case 'clone':
          $query = "SELECT * FROM posts WHERE post_id= {$postValueId} ";   
          $select_post_query = mysqli_query($conn, $query);
          if(!$select_post_query){
               die("Query Failed" . mysqli_error($conn));
           }
          while ($row= mysqli_fetch_array($select_post_query)){
          
          $post_title = $row['post_title'];
          $post_categories_id = $row['post_categories_id'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_tags = $row['post_tags'];
          $post_content = $row['post_content'];
          }
           $query = "INSERT INTO posts(post_categories_id, post_title, post_status, post_image, post_content, post_tags)";
           $query .= "VALUES('{$post_categories_id}', '{$post_title}', '{$post_status}', '{$post_image}', '{$post_content}', '{$post_tags}')";
    
           $copy_query = mysqli_query($conn, $query);
           
           if(!$copy_query){
               die("Query Failed" . mysqli_error($conn));
           }
           
           
              
              break;
          
       }
       
    }
}



?>




<form action="" method="POST">
<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        
        
    </div>
    
    
                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxses" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                            </thead>
                            <tbody>
<?php
          $query = "SELECT * FROM posts ORDER BY post_id DESC ";
          $select_posts = mysqli_query($conn, $query);
        
          while ($row= mysqli_fetch_assoc($select_posts)){
          $post_id = $row['post_id']; 
          $post_title = $row['post_title'];
          $post_categories_id = $row['post_categories_id'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_tags = $row['post_tags'];
          $post_comment_count = $row['post_comment_count'];
          
          echo "<tr>";
          ?>
                                
          <td><input class='checkBoxses' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id;  ?>"></td>
          
          <?php
          echo "<td>{$post_id}</td>";
          echo "<td>{$post_title}</td>";
          
          $query = "SELECT * FROM categories WHERE cat_id ={$post_categories_id} ";
          $select_cat = mysqli_query($conn, $query);
          if(!$select_cat){
           die("Query failed" .mysqli_error($conn));
          }
        
          while ($row= mysqli_fetch_assoc($select_cat)){
          $cat_id = $row['cat_id']; 
          $cat_title = $row['cat_title'];
          
          
          echo "<td>{$cat_title}</td>";
          }
          
          echo "<td>{$post_status}</td>";
          echo "<td><img width='100' height='100' src='../images/{$post_image}'></td>";
          echo "<td>{$post_tags}</td>";
          echo "<td>{$post_comment_count}</td>";
          echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a> </td>";
          echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a> </td>";
          echo "<td><a onclick=\"javascript: return confirm('Are You sure You Want to Delete?');\"  href='posts.php?delete={$post_id}'>Delete</a> </td>";
          echo "</tr>";
          
          }                     
                                
 ?>
                               
                            </tbody>
                        </table>
    </form>

<?php
if(isset($_GET['delete'])){
     if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'admin'){
    
    $the_post_id = $_GET['delete'];
    
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($conn, $query);
    header("Location: posts.php");
}}}

?>

