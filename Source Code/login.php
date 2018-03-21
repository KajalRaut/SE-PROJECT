	<?php include 'header.php';?>
  <!-- contact


   ================================================== -->

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

$username=$_POST['uname'];
$passwd=$_POST['passwd'];


$sql="SELECT id FROM user WHERE username='".$username."'";
$result=$conn->query($sql);
$row_cnt = $result->num_rows;
// echo $row_cnt;
 if($row_cnt==0){
 	?>
 	<section id="contact">

 	 	<div class="row narrow section-intro with-bottom-sep animate-this">
   		<div class="col-full">
   			
   				<h3 style="color: white;">You are not a student of NITK</h3>
   				<h3>For help <a href="contact.php">contact administrator </a></h3>
   				<h3><a href="register.php"> Try Again</a></h3>
   			   
   	   </div> <!-- end col-full -->
   	</div> <!-- end row -->
</section>
 	<?php
}

$sql="SELECT id FROM user WHERE username='".$username."' and passwd='".$passwd."'";
$result=$conn->query($sql);
$row_cnt = $result->num_rows;
// echo $row_cnt;
 if($row_cnt==0){
 	?>
 	<section id="contact">

 	 	<div class="row narrow section-intro with-bottom-sep animate-this">
   		<div class="col-full">
   			
   				<h3 style="color: white;">Invalid user name or password</h3>
   				<h3><a href="register.php"> Try Again</a></h3>
   			   
   	   </div> <!-- end col-full -->
   	</div> <!-- end row -->
</section>
 	<?php
 }
 else{
 	$sql="SELECT passwd FROM user WHERE username='".$username."'";
 	$result=$conn->query($sql);
	$row_cnt = $result->num_rows;
	$row = $result->fetch_assoc();
	if ($row["passwd"]===$passwd) {
		
	/*	?>
	<section id="contact">

 	 	<div class="row narrow section-intro with-bottom-sep animate-this">
   		<div class="col-full">
   			
   				<h3 style="color: white;">Logged in successfully</h3>
   				<h3><a href="index.php"> HOME </a></h3>
   			   
   	   </div> <!-- end col-full -->
   	</div> <!-- end row -->
	</section>

		<?php*/
		$sql="UPDATE user SET loggedin=1 WHERE username='".$username."'";
		$result=$conn->query($sql);

		header("Location: index.php");
   		exit;
	}
 }

?>
   
	

  <?php include 'footer.php';?>