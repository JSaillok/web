<?php include "refs.php";?>
<div class="container">
   <!-- login.inc.php : the user does not see the file, it just has the basic php script that runs-->
      <form action="includes/login.inc.php" id="loginForm" method="post">
            <div class="form-content">
               <div class="login-form">
                  <!-- Login Form -->
                  <div class="title">Login</div>
                  <br>
                  <div id ="errors"></div>
                  <?php include "includes/errors.inc.php"; ?>
                     <div class="input-boxes">
                     <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input type="text" name="usernameOremail"
                        id = "userEmail" placeholder="Enter username/email"  />
                     </div>
                     <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="password" name="password" id= "password" placeholder="Enter password"  />
                     </div>
                     <div class="button input-box">
                        <input name="submit" type="submit" id="submit" placeholder="Submit" />
                     </div>
                     <div class="text">
                        Don't have an account? <a href="signup.php">Sign Up Now</a>
                     </div>
                  </div>
               </div>
            </div>
      </form>
   </div>
<?php 
include_once 'footer.php'
?>
