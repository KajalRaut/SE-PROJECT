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

$file=$_POST['file'];

//$sql="mysqldump ---user root ---password=''  
//lms > .\\".$file.".sql";
/*$sql="mysqldump -u root -p lms > ".$file.".sql";
$result=$conn->query($sql);
if ($result==NULL) {
  echo "error";
  
}*/


define("BACKUP_PATH", "C:/xampp/htdocs/SE_/");

$server_name   = "localhost";
$username      = "root";
$password      = "";
$database_name = "lms";
$date_string   = date("Ymd");

$cmd = "\"C:/xampp/mysql/bin/mysqldump.exe\" --opt --skip-extended-insert --complete-insert --host=".$server_name." --user=".$username." --password=".$password." ".$database_name." >".$file.".sql";

//$cmd = "\"C:/xampp/mysql/bin/mysqldump.exe\" --routines -h {$server_name} -u {$username} -p {$password} {$database_name} > " . BACKUP_PATH . "".$file.".sql";
if(!exec($cmd))
{
  ?>
<section id="contact">

  <a href="backup.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Backup kept in the file <?php echo $file.".sql"?></h3>
          <h3 style="color: white;">Please remember the file name to restore database back correctly</h3> 
          
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
}

else{
  ?>
<section id="contact">

  <a href="backup.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Something went wrong while keeping backup.</h3>
          <h3 style="color: white;"><a href="backup.php">Try again.</a></h3> 
          
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
}

?>



 <?php include 'footer.php';?>