<?php include 'header.php';?>
<style type="text/css">
  #user_login2{
    display: none;;
  }
</style>

<section id="contact">
  <a href="index.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>update database</h3>
           <h1>Online pdf books</h1>
        
           <p class="lead">Enter book name and upload pdf version of book. If the book already exists, it will discard the file. </p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="add_online.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Book name" name="bname" required="true">
                             <input type="file" name="my_file" required="true" style="color: white;">
                            <input type="submit" value="Upload">
                          </form>
                          <a href="online.php"><input type="submit" value="List of available pdf books"></a>
        </div>

      </div>

     
    </section>

 <?php include 'footer.php';?>