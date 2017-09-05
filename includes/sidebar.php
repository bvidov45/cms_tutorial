<?php include 'db.php';  ?>
<div class="col-md-4">
    
      

                <!-- Blog Categories Well -->
                <div id="sidebar_well" class="well">
                    
                    <?php
                   $query = "SELECT * FROM categories";
                   $select_categories_sidebar = mysqli_query($conn, $query);
                      ?>
                    
                    <h4 class="text-center">All Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                    <?php
                             while ($row= mysqli_fetch_assoc($select_categories_sidebar)){
                             $cat_title = $row['cat_title'];
                             $cat_id = $row['cat_id']; ?>
                                
                                 
                                <button class="button_sidebar"><a href ='category.php?category=<?php echo $cat_id; ?>'><?php echo $cat_title; ?></a></button><br><br>
                                
                             
                           <?php   } ?>
                 
                            </ul>
                        </div>
                  
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
             <!--   <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>-->
                

            </div>