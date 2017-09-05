
<?php include '../includes/db.php';  ?>
<?php


function users_online(){
 global $conn;   
$session = session_id();
$time = time();
$time_out_in_seconds = 60;
$time_out = $time - $time_out_in_seconds;

$query = "SELECT * FROM users_online WHERE session = '$session' ";
$send_query = mysqli_query($conn, $query);
$count = mysqli_num_rows($send_query);
if($count == NULL){
    mysqli_query($conn, "INSERT INTO users_online (session, time) VALUES('$session', '$time') " );
} else {
     mysqli_query($conn, "UPDATE users_online SET time = '$time' WHERE session = '$session'  " );
}
   $users_online_query = mysqli_query($conn, "SELECT * FROM users_online WHERE time>'$time_out'  " );
   return $count_user = mysqli_num_rows($users_online_query);
}
  

function insert_categories(){
    
         global $conn;
          if(isset($_POST['submit'])){
             if(isset($_SESSION['user_role'])){
                 if($_SESSION['user_role'] == 'admin'){ 
            
              
          $cat_title = $_POST['cat_title'];
          if($cat_title == "" || empty($cat_title)){
              echo "This field should not be empty";
          } 
       
              
              
              
            $stmt = mysqli_prepare($conn, "INSERT INTO categories (cat_title) VALUES (?)");
          mysqli_stmt_bind_param($stmt, 's', $cat_title);
         mysqli_stmt_execute($stmt);
            
             
             if(!$stmt){
                 die('Query Failed' . mysqli_error($conn));
            }
        }
      }else
           header("location: users.php");
   }
}
function findAllCategories(){
         global $conn;
         $query = "SELECT * FROM categories";
          $select_categories = mysqli_query($conn, $query);
        
          while ($row= mysqli_fetch_assoc($select_categories)){
          $cat_id = $row['cat_id']; 
          $cat_title = $row['cat_title'];
          echo "<tr>";
          echo "<td>{$cat_id}</td>";
          echo "<td>{$cat_title}</td>";
          echo "<td><a href='categories.php?delete={$cat_id}'>DELETE<a/></td>";
          echo "<td><a href='categories.php?edit={$cat_id}'>EDIT<a/></td>";
          echo "</tr>";
          } 
}

function deleteCategories(){
    global $conn;
      if(isset($_GET['delete'])){
          
                      if(isset($_SESSION['user_role'])){
                       if($_SESSION['user_role'] == 'admin'){
          
              $the_get_id = $_GET['delete'];
              $query = "DELETE FROM categories WHERE cat_id = {$the_get_id}";
              $delete_query = mysqli_query($conn, $query);
              header("Location: categories.php");
          }
       }else{
           header("location: users.php");
       }
     }
}
function is_admin($username = ''){
    global $conn;
    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
        if(!$result){
            die('Query failed' . mysqli_error);
        }
   $row = mysqli_fetch_array($result);
   if($row['user_role'] == 'admin'){
       return true;
   }else{
       return FALSE;
   }
}




?>