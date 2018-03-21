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
$bname=$_POST["bname"];

$sql = "SELECT * FROM user WHERE username='".$username."'";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
$sql = "SELECT * FROM book WHERE bookname='".$bname."'";
$result2=$conn->query($sql);
if ($result2->num_rows > 0) {
  $row = $result2->fetch_assoc();
  if($row["copies"]>0){
    $sql = "SELECT * FROM borrowed_book WHERE bookname='".$bname."' AND username='".$username."'";
    $result3=$conn->query($sql);
    if ($result3->num_rows > 0) {
      ?>
    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Can't borrow <br>Student already borrowed this book.</h3>
                 
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
    }
    else{
     $renew= date('Y-m-d', strtotime("+30 days"));
     $date = new DateTime($renew);
      $r = $date->format('Y-m-d H:i:s');
      //echo $r;
      $sql="INSERT INTO borrowed_book(username,bookname,renewdate,fine) VALUES('".$username."','".$bname."',TIMESTAMP '".$r."',0)";
       $result4=$conn->query($sql);
       if($result4!=NULL){
        $sql="UPDATE book SET copies=copies-1 WHERE bookname='".$bname."'";
        $conn->query($sql);
        ?>
    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Database updated successfully</h3>
                 
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php

       }

       else{

        ?>
    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Something went wrong.<br>Couldn't update database.</h3>
                 
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php


       }


    }


  }
  else{
    ?>
    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Can't borrow <br>0 books available.</h3>
          <h3 style="color: white;"><a href="book_db.php">Update information</a></h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php

  } 
  }
else{
    ?>
  <section id="contact">
  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">  
          <h3 style="color: white;">Can't borrow</h3> 
          <h3 style="color: white;">Book doesn't exist in database.</h3>
          <h3 style="color: white;"><a href="book_db.php">Add book to database</a></h3>     
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
}
else{
    ?>
  <section id="contact">
  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Couldn't find student</h3>  
          <h3 style="color: white;">Student doesn't exist in database</h3>
          <h3 style="color: white;"><a href="student_add.php">Add student to database</a></h3>     
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
  

?>

 <?php include 'footer.php';?>