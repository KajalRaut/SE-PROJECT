<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>NITK LMS</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
   <link rel="stylesheet" href="css/main.css">  



   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

   <!-- favicons
	================================================== -->
	
</head>
<style type="text/css">
      #profile,#logout,#update,#backup{
         display: none;
      }
   </style>

<header>
<a id="header-menu-trigger" href="#0">
         <span class="header-menu-text">Menu</span>
         <span class="header-menu-icon"></span>
      </a> 

      <nav id="menu-nav-wrap">

         <a href="#0" class="close-button" title="close"><span>Close</span></a>  

         <h3>NITK LMS</h3>  

         <ul class="nav-list">
            <li class="current"><a  href="index.php" title="">Home</a></li>
            <li><a  href="about.php" title="">About</a></li>
            <!--li><a class="smoothscroll" href="#services" title="">Services</a></li>
            <li><a class="smoothscroll" href="#portfolio" title="">Works</a></li-->
            <li id="register"><a  href="register.php" title="" >Register</a></li>
            <li id="profile"><a  href="profile.php" title="" >Profile</a></li>
            <li id="update"><a  href="update.php" title="" >Update</a></li>
            <li id="backup"><a  href="backup.php" title="" >Backup</a></li>
            <li id="contact2"><a  href="contact.php" title="">Contact</a></li> 
            <li ><a  href="help.php" title="" >Help</a></li>   
            <li id="logout"><a  href="logout.php" title="" >Log out</a></li>                 
         </ul>          

         <ul class="header-social-list">
            <li>
            <a href="https://www.facebook.com"><i class="fa fa-facebook-square"></i></a>
           </li>
           <li>
            <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
           </li>
           <li>
            <a href="https://www.instragram.com"><i class="fa fa-instagram"></i></a>
           </li>      
         </ul>    

      </nav>  <!-- end #menu-nav-wrap -->
   </header>



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

$sql="SELECT id FROM user WHERE loggedin=1";
$result=$conn->query($sql);
$row_cnt = $result->num_rows;
$row = $result->fetch_assoc();
if($row_cnt!=0){
   echo "<script type=\"text/javascript\">
   
   var logout=document.getElementById(\"logout\");
        logout.style.display = \"inline\";
    var profile=document.getElementById(\"profile\");
        profile.style.display = \"inline\";
    var register=document.getElementById(\"register\");
        register.style.display = \"none\";
</script>";
if($row["id"]==1){
      echo "<script type=\"text/javascript\">
   var update=document.getElementById(\"update\");
        update.style.display = \"inline\";
    var backup=document.getElementById(\"backup\");
        backup.style.display = \"inline\";
    var profile=document.getElementById(\"profile\");
        profile.style.display = \"none\";
   var contact=document.getElementById(\"contact2\");
        contact.style.display = \"none\";
</script>";
      }
}
else{
   echo "<script type=\"text/javascript\">
   
   var logout=document.getElementById(\"logout\");
        logout.style.display = \"none\";
    var profile=document.getElementById(\"profile\");
        profile.style.display = \"none\";
   var update=document.getElementById(\"update\");
        update.style.display = \"none\";
    var backup=document.getElementById(\"backup\");
        backup.style.display = \"none\";
    var register=document.getElementById(\"register\");
        register.style.display = \"inline\";
    var contact=document.getElementById(\"contact2\");
        contact.style.display = \"inline\";
</script>";

}
/*
$sql="SELECT * FROM user WHERE loggedin=1";
$result0=$conn->query($sql);

$row0 = $result0->fetch_assoc();

$sql="SELECT * FROM borrowed_book WHERE username='".$row0["username"]."'";
$result2=$conn->query($sql);
$row_cnt2 = $result2->num_rows;
if($row_cnt2){
  $i=1;
while($row = $result2->fetch_assoc()) {

        $date_expire = $row["renewDate"];  
        $now = new DateTime();
        $diff = abs(strtotime($now->format('Y-m-d H:i:s')) - strtotime($date_expire));

    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $totaldays=365*$years+30*$months+$days;
    echo "<script type=\"text/javascript\">
  alert('NOTIFICATION".$i." : ".$totaldays." left for nenewal of ".$row["bookname"]."');
    </script>";
    $i=$i+1;
    }

  }
*/

?>