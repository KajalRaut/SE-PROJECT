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

$sql="SELECT * FROM user";
$result = $conn->query($sql);
/*
$renew= date('Y-m-d', strtotime("+30 days"));
echo $renew;
$date = new DateTime($renew);
$r = $date->format('Y-m-d H:i:s');
echo $r;
echo date_format($date,"Y/m/d H:i:s");
*/
if ($result->num_rows -1 > 0) {
	?>
	<section id="contact">

   	<a href="student_db.php"  style="position: relative;left: 30px;color: white;">		
		   		   	
		   	<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
		   		Back
			</a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>Edit database</h3>
           <h1>Borrow Book</h1>
        
           <p class="lead">Enter student username and book name to add book to borrowed list in student database.  </p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="borrow.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="uname" required="true">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Book name" name="bname" required="true">
                            <input type="submit" value="Borrow">
                          </form>
                          
        </div>
</div>
         <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          
           <h1>Return Book</h1>
        
           <p class="lead">Enter student username and book name to remove book from borrowed list in student database.  </p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="return.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="uname" required="true">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Book name" name="bname" required="true">
                            <input type="submit" value="Return">
                          </form>
                          
        </div>

      </div>
      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3>Student list</h3>
           
       </div> <!-- end col-full -->
    </div> <!-- end row -->

	<?php
  
	echo "<center><table><tr><th>ID</th><th>Username</th><th>Passing Year</th><th>Borrowed Books</th></tr>";
    // output data of each row
    $i=1;
    while($row = $result->fetch_assoc()) {
    	if($row["id"]==1)
    		continue;
      $sql="SELECT * FROM borrowed_book WHERE username='".$row["username"]."'";
      $result2 = $conn->query($sql);
        echo "<tr><td>".$i."</td><td>".$row["username"]."</td><td> ".$row["passyear"]."</td>";
        if($result2->num_rows==0) 
          echo "<td>-</td></tr>";
        else
        {
          echo "<td>";
    while($row2 = $result2->fetch_assoc()) {
      
           echo  $row2["bookname"]."<br>";
      
        }
        echo "</td></tr>";
        $i=$i+1;
    }
  }
    echo "</table></center> </section";
} else {
    ?>
  <section id="contact">

  <a href="student_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Students list is empty.</h3>
          <h3 style="color: white;"><a href="student_add.php">Add students</a></h3> 
          
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
}
   	?>
	

  <?php include 'footer.php';?>