	<?php include 'header.php';?>
	<?php
	if (isset($_GET['name'])) {
    $name=$_GET['name'];
?>

  <!-- contact
   ================================================== -->
   <section id="contact">
   	<a href="online.php"  style="position: relative;left: 30px;color: white;">   
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
<h1><?php echo $name;?></h1>
       </div> <!-- end col-full -->
    </div> <!-- end row -->
        <center><embed src="pdf/<?php echo $name;?>.pdf" width="1000px" height="600px" /></center>

	</section> <!-- end contact -->
<?php


  }
  ?>

  <?php include 'footer.php';?>