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
// Name of the file
$filename = "C:/xampp/htdocs/SE_/".$file.'.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'lms_copy2';

// Connect to MySQL server
//mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
//mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
$sql = "CREATE DATABASE IF NOT EXISTS ".$mysql_database;
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
    //echo "Error creating database: " . $conn->error;
}

$sql = "USE ".$mysql_database;
$conn->query($sql);
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    //mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    $conn->query($templine)or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
?>

 <section id="contact">

  <a href="backup.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Backup restored successfully.</h3>
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>

 <?php include 'footer.php';?>



