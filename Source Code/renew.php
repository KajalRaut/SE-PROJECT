	<?php include 'header.php';?>
	<?php
	if (isset($_GET['id'])) {
    $id=$_GET['id'];

  // Create connection
$conn = new mysqli("localhost", "root", "", "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS lms";
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
    //echo "Error creating database: " . $conn->error;
}

$sql = "USE lms";
$conn->query($sql);

$renew= date('Y-m-d', strtotime("+30 days"));
     $date = new DateTime($renew);
      $r = $date->format('Y-m-d H:i:s');

$sql="UPDATE borrowed_book SET renewDate=TIMESTAMP '".$r."' WHERE id=".$id;
$result=$conn->query($sql);

if($result!=NULL)
{
?>
  <!-- contact
   ================================================== -->
   <section id="contact">
    <a href="profile.php"  style="position: relative;left: 30px;color: white;">   
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
      <div class="row narrow section-intro with-bottom-sep animate-this">

          <div class="col-twelve">
            <h3>Renewal successful. </h3>
          </div>
        </div>

  </section> <!-- end contact -->
<?php

}
else{

  ?>
  <!-- contact
   ================================================== -->
   <section id="contact">
    <a href="profile.php"  style="position: relative;left: 30px;color: white;">   
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
      <div class="row narrow section-intro with-bottom-sep animate-this">

          <div class="col-twelve">
                <h3>Something went wrong.<br>Couldn't renew.</h3>
              </div>
            </div>

  </section> <!-- end contact -->
<?php

}
}

  ?>

 <?php include 'footer.php';?>