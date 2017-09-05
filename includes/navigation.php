<?php ob_start();   ?>
<?php include 'db.php'; ?>
<?php session_start();   ?>







<nav  class="navbar navbar-default navbar-fixed-top " role="navigation">
    <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <a id="brand_title" class="navbar-brand" href="../index.php">CrazyThingsOnline</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
        <ul class="dropdown-menu">
              <?php 
              
      $query = "SELECT * FROM categories";
      $select_all_categories = mysqli_query($conn, $query);
      
      while ($row= mysqli_fetch_assoc($select_all_categories)){
          $cat_title = $row['cat_title'];
          $cat_id = $row['cat_id']; ?>
            
          <li><a href ="category.php?category=<?php  echo $cat_id ?>"><?php  echo $cat_title; ?></a></li>
          
           <?php    }  ?>

 
 
       
                   <?php
                    if(isset($_SESSION['user_role'])){
                       if($_SESSION['user_role'] == 'admin'){
                           
                        echo "<li><a href='admin/index.php'>Admin</a></li>"  ;  
    
                    }}
                   ?> 
          
        </ul>
      </li>
    </ul>
    <div class="col-sm-3 col-md-3 navbar-right">
        <form action="search.php" method="POST" class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    
  </div><!-- /.navbar-collapse -->
    </div>
</nav>

