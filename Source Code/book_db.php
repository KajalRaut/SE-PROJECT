<?php include 'header.php';?>
<style type="text/css">
  #user_login2{
    display: none;;
  }
</style>

<section id="contact">
  <a href="lms_db.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>update database</h3>
           <h1>Book Information</h1>
        
           <p class="lead">Enter book name and number of copies available in library. If the book already exists, number copies will be updated.  </p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="add_book.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Book name" name="bname" required="true">
                            <input type="number" class="input" id="user_login" autocomplete="off" placeholder="Number of copies" name="copies" required="true">
                            <input type="submit" value="Update">
                          </form>
                          <a href="book_list.php"><input type="submit" value="List of available books"></a>
        </div>

      </div>

     
    </section>

 <?php include 'footer.php';?>