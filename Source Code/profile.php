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

$sql="SELECT * FROM user WHERE loggedin=1";
$result=$conn->query($sql);

$row = $result->fetch_assoc();

?>

  <!-- contact
   ================================================== -->
   <section id="contact">
   	<a href="index.php"  style="position: relative;left: 30px;color: white;">   
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h1>PROFILE</h1>
          
      </div> 
    </div> <!-- end section-intro -->
	<div class="row narrow section-intro with-bottom-sep animate-this">
	   		<div class="col-twelve">

	   			<h3>User Name: <span style="color: white;"><?php echo $row["username"]; ?></span> </h3>
	   		</div>
	   	</div>
	   		<div class="row narrow section-intro with-bottom-sep animate-this">

	   			<div class="col-twelve">
	   			<h3>Email ID : <span style="color: white;"><?php echo $row["email"]; ?></span> </h3>

	   		</div>
	   	</div>
	   	<div class="row narrow section-intro with-bottom-sep animate-this">

	   			<div class="col-twelve">
		   			<h3>
		   				List of borrowed books
		   			</h3>
<br>
	   				
		   			<?php

$sql="SELECT * FROM borrowed_book WHERE username='".$row["username"]."'";
$result2 = $conn->query($sql);

//$row = $result2->fetch_assoc();
if ($result2->num_rows > 0) {
	

	echo "<center><table><tr><th>No.</th><th>Book name</th><th>Renew Date</th><th>Fine</th><th></th></tr>";
    // output data of each row
    $i=1;
    while($row = $result2->fetch_assoc()) {
        echo "<tr><td>".$i."</td><td>".$row["bookname"]."</td><td>".$row["renewDate"]."</td><td>".$row["fine"]."</td><td><a href='renew.php?id=".$row["id"]."''>Renew</a></td></tr>";
        $i=$i+1;
    }
    echo "</table></center> </section";
} else {
	?>
	   			<h3><span style="color: white;">No borrowed books</span> </h3>
<?php

}
    ?>   			
	   		</div>   		
	   	</div> <!-- end row section-intro -->

	</section> <!-- end contact -->
<?php

/*if($row["id"]==1){
	header("Location: admin_profile.php");
   exit;
}
else{
	header("Location: student_profile.php");
   exit;
}*/


  ?>
  
<?php include 'footer.php';?>
  