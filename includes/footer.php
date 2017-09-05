<footer class="nb-footer">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="about">
	<img src="images/logo.png" class="img-responsive center-block" alt="">
	<p>Bootstrap Footer example snippets with CSS, Javascript and HTML. Code example of bootstrap-3 footer using HTML, Javascript, jQuery, and CSS. 5 Beautiful and Responsive Footer Templates. Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS.</p>

	<div class="social-media">
		<ul class="list-inline">
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-facebook"></i></a></li>
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-twitter"></i></a></li>
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-google-plus"></i></a></li>
			<li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-linkedin"></i></a></li>
		</ul>
	</div>
</div>
</div>
    
        
              <?php 
              
      $query = "SELECT * FROM categories";
      $select_all_categories = mysqli_query($conn, $query);
      
      while ($row= mysqli_fetch_assoc($select_all_categories)){
          $cat_title = $row['cat_title'];
          $cat_id = $row['cat_id']; ?>

<div class="col-md-3 col-sm-6">
<div class="footer-info-single">
	
	<ul class="list-unstyled">
        <li><a href ="category.php?category=<?php  echo $cat_id ?>" title=""><i class="fa fa-angle-double-right"></i><?php  echo $cat_title; ?></a></li>
	</ul>
</div>
</div>
<?php    }  ?>

</div>
</div>

<section class="copyright">
<div class="container">
<div class="row">
<div class="col-sm-6">
<p>Copyright © 2017. Your Company.</p>
</div>
<div class="col-sm-6"></div>
</div>
</div>
</section>
</footer>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    
  
    
    
    

</body>

</html>
