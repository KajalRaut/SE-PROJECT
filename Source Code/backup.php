<?php include 'header.php';?>
<section id="contact">
  <a href="index.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h1>Backup Database</h1>
        
           <p class="lead">Keep backup of database for safety which can be restored later. Beware , once the backup is restored , it might some loose information.</p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
      	<div class="col-twelve">
          <h3>keep Backup </h3>
        
           <p class="lead">Enter file name to keep backup. Database backup will be kept in this file.</p>
      </div> 
                    <form class="login-form" action="keep_backup.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="File name" name="file" required="true">
                            <input type="submit" value="Keep Backup" name="keep">
                          </form>
        </div>
      </div>


      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
      	<div class="col-twelve">
          <h3>restore Backup </h3>
        
           <p class="lead">Enter file name to restore backup. Database backup will be restored from this file.</p>
      </div> 
                    <form class="login-form" action="restore_backup.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="File name" name="file" required="true">
                            <input type="submit" value="Restore Backup" name="restore">
                          </form>
        </div>
      </div>


      
    </section>

 <?php include 'footer.php';?>