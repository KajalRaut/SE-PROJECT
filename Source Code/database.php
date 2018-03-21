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

$sql="SHOW TABLES LIKE 'institute'";
$result=$conn->query($sql);
 $row_cnt = $result->num_rows;
 //echo $row_cnt;
if($row_cnt==0)
{
	$sql ="CREATE TABLE institute (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
passyear VARCHAR(50) NOT NULL
)";

$result=$conn->query($sql);
$sql="insert into institute values(1,'156686','2019'),(2,'156445','2019'),(3,'156888','2019'),(4,'165488','2020'),(5,'166686','2020')";
	$result=$conn->query($sql);
}



$sql="SHOW TABLES LIKE 'user'";
$result=$conn->query($sql);
 $row_cnt = $result->num_rows;
 //echo $row_cnt;
if($row_cnt==0)
{
	$sql ="CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
passwd VARCHAR(50) NOT NULL,
passyear VARCHAR(50) NOT NULL,
loggedin INT NOT NULL
)";

$result=$conn->query($sql);
$sql="insert into user values(1,'admin','admin@gmail.com','admin',0,0)";
	$result=$conn->query($sql);
}
else{

	$sql="select id from user where username='admin'";
	$result=$conn->query($sql);
	if($result->num_rows==0){
	$sql="insert into user values(1,'admin','admin@gmail.com','admin',0,0)";
	$result=$conn->query($sql);
	}
	
}


$sql="SHOW TABLES LIKE 'borrowed_book'";
$result=$conn->query($sql);
 $row_cnt = $result->num_rows;
 //echo $row_cnt;
if($row_cnt==0)
{
	$sql ="CREATE TABLE borrowed_book (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
bookname VARCHAR(50) NOT NULL,
username VARCHAR(30) NOT NULL,
renewDate TIMESTAMP NOT NULL,
fine FLOAT NOT NULL
)";
//echo "inside borrowed_book";
$result=$conn->query($sql);
//echo $result;
}



$sql="SHOW TABLES LIKE 'book'";
$result=$conn->query($sql);
 $row_cnt = $result->num_rows;
 //echo $row_cnt;
if($row_cnt==0)
{
	$sql ="CREATE TABLE book (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
bookname VARCHAR(50) NOT NULL,
copies INT(6) NOT NULL
)";

$result=$conn->query($sql);
//echo $result;
}


$sql="SHOW TABLES LIKE 'online'";
$result=$conn->query($sql);
 $row_cnt = $result->num_rows;
 //echo $row_cnt;
if($row_cnt==0)
{
	$sql ="CREATE TABLE online (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(50) NOT NULL
)";

$result=$conn->query($sql);
//echo $result;
}

$conn->close();
?>

