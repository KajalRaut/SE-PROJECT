<?php include 'header.php';?>
<?php
/*
$target_dir = "/pdf/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.".$_FILES['fileToUpload']['error'];
    }
}
*/

if (($_FILES['my_file']['name']!="")){
// Where the file is going to be stored
    $target_dir = "pdf/";
    $file = $_FILES['my_file']['name'];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $filename=$_POST["bname"];
    $ext = $path['extension'];
    $temp_name = $_FILES['my_file']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
    ?>
 <section id="contact">

  <a href="online_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">File alredy exists.</h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
<?php
 
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);


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
//$copies=$_POST["copies"];

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
$sql="SELECT * from online WHERE filename='".$bname."'";
$result=$conn->query($sql);
  if($result->num_rows!=0)
  {


  ?>
  <section id="contact">

  <a href="online_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        
          <h3 style="color: white;">Book information already exists.</h3>       
       </div> <!-- end col-full -->
    </div> <!-- end row -->
  </section>
  <?php
  
  
}

else{

  $sql="INSERT INTO online(filename) VALUES('".$bname."')";
  $result=$conn->query($sql);
  if($result!=NULL)
  {
    ?>
  <section id="contact">
  <a href="online_db.php"  style="position: relative;left: 30px;color: white;">    
              
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
  <a href="online_db.php"  style="position: relative;left: 30px;color: white;">    
              
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


 
 }
}

?>

<?php include 'footer.php';?>