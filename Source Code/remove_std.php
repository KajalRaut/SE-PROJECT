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

$username=$_POST["uname"];

if($username=="")
{
  $curr=date("Y");


$sql="SELECT * FROM user WHERE passyear<".$curr." and passyear!=0";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row["id"]==1)
        continue;
        $sql="DELETE FROM user WHERE id=".$row["id"];
        $conn->query($sql);
    }


?>
  <section id="contact">

  <a href="student_remove.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Students data removed.</h3> 
         <h3 style="color: white;"><?php echo $result->num_rows -1  ?> students removed successfully.</h3>    
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php


}
else{
?>
  <section id="contact">

  <a href="student_remove.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          
         <h3 style="color: white;">All Done</h3>
         <h3 style="color: white;">Couldn't find students.</h3>     
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php

}
}
else{
  $sql="SELECT id FROM user WHERE username=".$username;
$result=$conn->query($sql);
if ($result->num_rows!=0) {
/*?>
  <section id="contact">

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Logged out successfully</h3>
          <h3><a href="index.php"> HOME </a></h3>
           
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
<?php
header("Location: index.php");
   exit;*/


$sql="DELETE FROM user WHERE username=".$username;
$result=$conn->query($sql);
if ($result!=NULL) {
  ?>
  <section id="contact">

  <a href="student_remove.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Student data removed successfully.</h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
}
else{
  ?>
  <section id="contact">
  <a href="student_remove.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Couldn't find student with this username</h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
}
}


?>

 <?php include 'footer.php';?>