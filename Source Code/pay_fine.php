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

$sql="SELECT * FROM borrowed_book WHERE id=".$id;
$result=$conn->query($sql);
 $row = $result->fetch_assoc();
     $renew= date('Y-m-d', strtotime("+30 days"));
     $date = new DateTime($renew);
      $r = $date->format('Y-m-d H:i:s');
 $date_expire = $row["renewDate"]; 
$sql = "UPDATE borrowed_book SET fine=0,renewDate=TIMESTAMP '".$r."' WHERE id=".$id;
 $result2=$conn->query($sql);

}




?>


    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Fine Paid successfully </h3>
          <h3>Go<a href="student_list.php">back</a> to return book.</h3>
                 
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>


 <?php include 'footer.php';?>