<?php include 'header.php';?>
<style type="text/css">
  #user_login2{
    display: none;;
  }
</style>

<section id="contact">
  <a href="student_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>update database</h3>
           <h1>Remove Student</h1>
        
           <p class="lead">Enter username of student to remove it from database. This student will no longer be able to access library unless until added again.  </p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="remove_std.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="uname" required="true">
                            <input type="submit" value="Remove">
                          </form>
        </div>
      </div>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
        <div class="col-twelve">
          <h1>OR</h1>
           <p class="lead">Remove all students who have graduated and no longer are students of NITK.  </p>
      </div> 
                    <form class="login-form" action="remove_std.php" method="post">
                      <input type="text" class="input" id="user_login2" autocomplete="off" placeholder="Username" name="uname">
                            <input type="submit" value="Remove">
                          </form>
        </div>
      </div>
    </section>

 <?php include 'footer.php';?>