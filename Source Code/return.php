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
        

    $sql = "SELECT * FROM borrowed_book WHERE bookname='".$bname."' AND username='".$username."'";
    $result3=$conn->query($sql);
    if ($result3->num_rows > 0) {
      //return starts
      $row = $result3->fetch_assoc();
      //$date=new DateTime();
      $date_expire = $row["renewDate"];  
    // echo   $date_expire;
      $date = new DateTime($date_expire);
      $now = new DateTime();


    //echo $now->diff($date)->format("%d days, %h hours and %i minuts");

      if($date_expire<$now->format('Y-m-d H:i:s'))
      {
        $diff = abs(strtotime($now->format('Y-m-d H:i:s')) - strtotime($date_expire));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$totaldays=365*$years+30*$months+$days;
//printf("%d years, %d months, %d days\n", $years, $months, $days);
        //$fine=$date->diff($now)->format("%d");
        //echo $fine;
        $fine=$totaldays*0.5;
         $sql = "UPDATE borrowed_book SET fine=".$fine.",renewDate= TIMESTAMP '".$date_expire."' WHERE bookname='".$bname."' AND username='".$username."'";
        $result4=$conn->query($sql);
       // $row2 = $result4->fetch_assoc();
        ?>
    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
          <h3 style="color: white;">RS.<?php echo $fine; ?> FINE<br>Pay fine prior to return.</h3>
           <h3 style="color: white;"><a href="pay_fine.php?id=<?php echo $row["id"]; ?>" >PAID</a></h3>
          
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
      }
      else{

        $sql = "DELETE FROM borrowed_book WHERE bookname='".$bname."' AND username='".$username."'";
       $result3=$conn->query($sql);

       $sql = "SELECT * FROM book WHERE bookname='".$bname."'";
      $result4=$conn->query($sql);
      $row0 = $result4->fetch_assoc();
       $sql="UPDATE book SET copies=".($row0["copies"]+1)." WHERE bookname='".$bname."'";
       $conn->query($sql);
        ?>
    <section id="contact">

  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
          <h3 style="color: white;">NO FINE<br>Return is successful.</h3>
                 
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
        
          <h3 style="color: white;">Student didn't borrow this book.</h3>
                 
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
        
          <h3 style="color: white;">This book is not present in database.</h3>
                 
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php


       }


    }
 
  //book exists
else{
    ?>
  <section id="contact">
  <a href="student_list.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">  
          <h3 style="color: white;">Can't return</h3> 
          <h3 style="color: white;">Book doesn't exist in database.</h3>
               
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  }
?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

 <?php include 'footer.php';?>