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

$usernames=$_POST["uname"];
$usernames = explode(",", $usernames);
if (sizeof($usernames)!=0) {
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
   $i=0;
   $j=0;
   $r=0;
   $z=0;
foreach ($usernames as $uname) {
  $sql="SELECT id FROM user where username='".$uname."'";
  $result=$conn->query($sql);
  if($result->num_rows!=0)
  {
    $j=$j+1;
    continue;
  }
  if(strlen($uname)!=6){
    $r=$r+1;
    continue;
  }
  $sql="SELECT * from institute WHERE username='".$uname."'";
   $result2= $conn->query($sql);
if($result2->num_rows==0)
  {
    $z=$z+1;
    continue;
  }
  else{
    $row = $result2->fetch_assoc() ;
    $sql="INSERT INTO user(username,passyear) VALUES ('".$uname."','".$row["passyear"]."')";
    $conn->query($sql);
    $i=$i+1;
  }
    
}
if ($i==sizeof($usernames)) {
  ?>
  <section id="contact">

  <a href="student_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;"><?php echo $i ?> Students added successfully.</h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }

else{
  if ($i+$j==sizeof($usernames)) {
    ?>
  <section id="contact">
  <a href="student_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">  
          <h3 style="color: white;"><?php echo $i ?> Students added successfully.</h3> 
          <h3 style="color: white;"><?php echo $j ?> Students already exists in database.</h3>     
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
else{
    ?>
  <section id="contact">
  <a href="student_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Couldn't add all entered students to database</h3>  
          <h3 style="color: white;"><?php echo $i ?> Students added successfully.</h3>
          <h3 style="color: white;"><?php echo $r ?> entries are wrong.</h3>  
          <h3 style="color: white;"><?php echo $z ?> entries doesn't exist in institute database. </h3>   
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
  
}

}

?>

 <?php include 'footer.php';?>