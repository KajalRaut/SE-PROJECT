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

$bname=$_POST["bname"];
$bname=strtolower($bname);
$copies=$_POST["copies"];

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
$sql="SELECT * from book WHERE bookname='".$bname."'";
$result=$conn->query($sql);
  if($result->num_rows!=0)
  {

    $row = $result->fetch_assoc();

    $sql="UPDATE book SET copies=".($row["copies"]+$copies)." WHERE id=".$row["id"];
    $result=$conn->query($sql);
if ($result!=NULL) {
  ?>
  <section id="contact">

  <a href="book_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Book information updated successfully.</h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }

else{
  
    ?>
  <section id="contact">
  <a href="book_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">  
          <h3 style="color: white;">Couldn't update book information.</h3> 
              
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }

  
}

else{

  $sql="INSERT INTO book(bookname,copies) VALUES('".$bname."',".$copies.")";
  $result=$conn->query($sql);
  if($result!=NULL)
  {
    ?>
  <section id="contact">
  <a href="book_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">  
          <h3 style="color: white;">Book information added successfully.</h3> 
              
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
  else
  {
    ?>
  <section id="contact">
  <a href="book_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">  
          <h3 style="color: white;">Couldn't add book information.</h3> 
              
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
}



?>

 <?php include 'footer.php';?>