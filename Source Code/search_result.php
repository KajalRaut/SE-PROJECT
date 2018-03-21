<?php include 'header.php';?>
	  <style>
table, th, td {
    border: 2px solid orange;
   color: white;
   text-align: center;
}
table{
	width: 700px;
  empty-cells: show;
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


$name=$_POST["bname"];

$sql="SELECT * FROM book WHERE bookname LIKE '%".$name."%'";
$result = $conn->query($sql);


if ($result->num_rows  > 0) {
	?>
	<section id="contact">
    <a href="lms.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
 <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>Search result</h3>
          
           <p class="lead"> Visit library to borrow book.  </p>
      </div> 
    </div> <!-- end section-intro -->
	<?php

		echo "<center><table><tr><th>ID</th><th>Book name</th><th>Available Copies</th></tr>";
    // output data of each row
    $i=1;
    while($row = $result->fetch_assoc()) {
     
        echo "<tr><td>".$i."</td><td>".$row["bookname"]."</td><td> ".$row["copies"]."</td></tr>";
       
  }
    echo "</table></center> </section";
  
}

	?>

  <?php include 'footer.php';?>