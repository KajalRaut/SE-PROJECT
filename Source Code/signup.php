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

$email=$_POST['email'];
$username=$_POST['uname'];
$passwd=$_POST['passwd'];
$passyear=$_POST['passyear'];

$email2 = $email;
if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
  ?>
  <section id="contact">

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Invalid email.</h3>
          
           <h3><a href="register.php"> Try Again</a></h3>
       </div> <!-- end col-full -->
    </div> <!-- end row -->
</section>
  <?php
}
else{


  $sql="SELECT * FROM user WHERE username='".$username."'";
$result=$conn->query($sql);
$row_cnt = $result->num_rows;
// echo $row_cnt;
$row2 = $result->fetch_assoc() ;
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
  else{

    if($row2["email"]!=NULL){
?>
  <section id="contact">

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Student already signed up.</h3>
          
           <h3><a href="register.php"> Log in</a></h3>
       </div> <!-- end col-full -->
    </div> <!-- end row -->
</section>
  <?php
    }
    else{

      //echo "inside  ";
    $sql="SELECT * from institute WHERE username='".$username."'";
   $result2= $conn->query($sql);
   $row = $result2->fetch_assoc() ;
    $sql="UPDATE user SET email='".$email."' , passwd='".$passwd."' , passyear='".$row["passyear"]."' WHERE username='".$username."'";
    $result=$conn->query($sql);
    if ($result!=NULL) {
      /*?>
  <section id="contact">

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Registered successfully</h3>
          <h3><a href="index.php"> HOME</a></h3>
           
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
    
    

  
 }

}


?>
   
	

  <?php include 'footer.php';?>