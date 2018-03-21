	<?php include 'header.php';?>
	 

  <!-- contact
   ================================================== -->
   <section id="contact">
  <a href="index.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>

      <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-twelve">
          <h3>WElcome to Library System</h3>
           <h1>Search Books</h1>
        
           <p class="lead">Enter book name to search book in library database. Search result shows result with similar book names available in library.</p>
      </div> 
    </div> <!-- end section-intro -->

    <div class="row narrow section-intro with-bottom-sep animate-this">
      <div class="col-full">
                    <form class="login-form" action="search_result.php" method="post">
                            <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Book name" name="bname" required="true">
                            <input type="submit" value="Search">
                          </form>
                          <a href="book_list.php"><input type="submit" value="List of available books"></a>
        </div>

      </div>
    </section>


  <?php include 'footer.php';?>