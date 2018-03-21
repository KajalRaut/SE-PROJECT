    <?php include 'header.php';?>
 
          <!-- LOGIN MODULE -->
             <section id="contact">
                 <a href="index.php"  style="position: relative;left: 30px;color: white;">    
              
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
          Back
      </a>
      
 <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">
        <div class="login">
            <div class="wrap">
                <!-- TOGGLE -->
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                
               

                <!-- SLIDER -->
                <div class="content">
                    <!-- LOGO -->
                    
                    <!-- SLIDESHOW -->
                    <div id="slideshow">
                        <div class="one">
                            <h2><span>WORK</span></h2>
                            <p>Always do your best. What you plant now, you will harvest later.</p>
                        </div>
                        <div class="two">
                            <h2><span>LEARNING</span></h2>
                            <p>Education is the most powerful weapon which you can use to change the world.</p>
                        </div>
                        <div class="three">
                            <h2><span>GROUPS</span></h2>
                            <p>If everyone is moving forward together, then success takes care of itself.</p>
                        </div>
                        <div class="four">
                            <h2><span>SHARING</span></h2>
                            <p>Power is gained by sharing knowledge and not hoarding it.</p>
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                    <!-- ACTIONS
                    <div class="actions">
                        <a class="help" href="#signup-tab-content">Sign Up</a><a class="faq" href="#login-tab-content">Login</a>
                    </div>
                    -->
                    <div class="form-wrap">
                        <!-- TABS -->
                    	<div class="tabs">
                            <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Login</span></a></h3>
                    		<h3 class="signup-tab"><a class="sign-up" href="#signup-tab-content"><span>Sign Up</span></a></h3>
                    	</div>
                        <!-- TABS CONTENT -->
                    	<div class="tabs-content">
                            <!-- TABS CONTENT LOGIN -->
                    		<div id="login-tab-content" class="active">
                    			<form class="login-form" action="login.php" method="post">
                    				<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="uname" required="true">
                    				<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="passwd" required="true">
                    				<input type="checkbox" class="checkbox" checked id="remember_me">
                    				<label for="remember_me">Remember me</label>
                    				<input id="login" type="submit" value="Login">
                    			</form>
                    			
                    		</div>
                            <!-- TABS CONTENT SIGNUP -->
                    		<div id="signup-tab-content">
                    			<form class="signup-form" action="signup.php" method="post">
                    				<input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email" name="email" required="true">
                    				<input type="text" class="input" id="user_name" autocomplete="off" placeholder="Username" name="uname" required="true">
                    				<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="passwd" required="true">
                                    <input type="text" class="input" id="user_pass" autocomplete="off" placeholder="Passing year" name="passyear">
                    				<input id="signup" type="submit" value="Sign Up">
                    			</form>
                    		
                    		</div>
                    	</div>
                	</div>
                </div>
            </div>
        </div>
</section>
 <?php include 'footer.php';?>
  

