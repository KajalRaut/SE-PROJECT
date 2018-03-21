<?php include 'header.php';?>
<section id="contact">
  <a href="student_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>update database</h3>
           <h1>Add Student</h1>
        
           <p class="lead">Enter username (registration number) of student to add it database. This student will be able to access library system. To add multiple students at a time , separate student usernames by comma. </p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="add_std.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="uname" required="true">
                            <input type="submit" value="Add">
                          </form>
        </div>
      </div>

      
    </section>

 <?php include 'footer.php';?>