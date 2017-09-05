<?php include 'includes/db.php';   ?>
<?php include 'includes/header.php';   ?>


      <!-- Navigation -->
    <?php include 'includes/navigation.php';   ?>  
    

    <!-- Page Content -->
    <div class="container">

             <!-- login -->
                 <div class="form-group col-md-9">
                     <?php if(isset($_SESSION['user_role'])):  ?>
                       <h4>Logged in as <?php echo $_SESSION['username'] ;   ?></h4>
                       <a href="includes/logout.php" class="btn btn-primary">Logout</a>
                     
                     <?php else:  ?>
                       <div class="col-md-9"> 
                        <h4>Login</h4>
                   <form action="includes/login.php" method="POST">
                   <div class="form-group">
                       <input name="username" type="text" class="form-control" placeholder="Enter Username">
                   </div>
                   <div class="input-group">
                       <input name="password" type="password" class="form-control" placeholder="Enter Password">
                       <span class="input-group-btn">
                           <button class="btn btn-primary" name="login" type="submit">Submit
                           </button>
                       </span>
                   </div>
                   </form> <!--search form-->
                       
                     <?php endif;  ?>
                     
                       </div>  
                   
                    <!-- /.input-group -->
                </div>
      
        
        
        
       