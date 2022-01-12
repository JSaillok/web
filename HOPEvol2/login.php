<?php include "refs.php";?>
<div class="container">
   <!-- login.inc.php : the user does not see the file, it just has the basic php script that runs-->
      <form action="includes/login.inc.php" method="post">
            <div class="form-content">
               <div class="login-form">
                  <!-- Login Form -->
                  <div class="title">Login</div>
                  <br>
                  <?php include "includes/errors.inc.php"; ?>
                     <div class="input-boxes">
                     <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input type="text" name="usernameOremail" placeholder="Enter username/email"  />
                     </div>
                     <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="password" name="password" placeholder="Enter password"  />
                     </div>
                     <div class="button input-box">
                        <input name="submit" type="submit" placeholder="Submit" />
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