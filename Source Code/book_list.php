	<?php include 'header.php';?>
  <!-- contact
   ================================================== -->
   <style>
table, th, td {
    border: 2px solid orange;
   color: white;
   text-align: center;
}
table{
	width: 700px;
}
</style>
   
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

$sql="SELECT * FROM book";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	?>
	<section id="contact">

   	<a href="index.php"  style="position: relative;left: 30px;color: white;">		
		   		   	
		   	<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
		   		Back
			</a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Available books</h3>
       </div> <!-- end col-full -->
    </div> <!-- end row -->
	<?php

	echo "<center><table><tr><th>ID</th><th>Book name</th><th>No of copies</th></tr>";
    // output data of each row
    $i=1;
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$i."</td><td>".$row["bookname"]."</td><td> ".$row["copies"]."</td></tr>";
        $i=$i+1;
    }
    echo "</table></center> </section";
} else {
    ?>
  <section id="contact">

  <a href="index.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Book list is empty.</h3>
          <h3 style="color: white;"><a href="book_db.php">Add books</a></h3> 
          
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
}
   	?>
	

  <?php include 'footer.php';?>