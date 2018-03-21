<?php include 'header.php';?>
<?php
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

$sql="SELECT id FROM user WHERE loggedin=1";
$result=$conn->query($sql);

$row = $result->fetch_assoc();

$sql="UPDATE user SET loggedin=0 WHERE id=".$row["id"]." ";
$result=$conn->query($sql);
if ($result!=NULL) {
/*?>
  <section id="contact">

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Logged out successfully</h3>
          <h3><a href="index.php"> HOME </a></h3>
           
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
<?php*/
header("Location: index.php");
   exit;
}
?>

 <?php include 'footer.php';?>

