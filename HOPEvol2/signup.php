<?php include "refs.php";?>
<div class="container">
   <!-- signup.inc : the user does not see the file, it just has the basic php script that runs-->
   <!-- The action attribute specifies where to send the form-data when a form is submitted. -->
      <form action="includes/signup.inc.php" method="post">
         <div class="form-content">
            <div class="signup-form">
               <div class="title">Signup</div>
               <br>
               <?php include "includes/errors.inc.php"; ?>
                  <div class="input-boxes">
                     <div class="input-box">
                        <i class="fas fa-envelope"></i>
                           <input type="text" name="username"  placeholder="Enter username"  />
                     </div>
                     <div class="input-box">
                        <i class="fas fa-user"></i>
                            <input type="text" name="email" placeholder="Enter email" />
                     </div>
                     <div class="input-box">
                        <i class="fas fa-envelope"></i>
                            <input type="password" name="password" placeholder="Enter password" />
                     </div>
                     <div class="input-box">
                        <i class="fas fa-envelope"></i>
                            <input type="password" name="cpassword" placeholder="Confirm password" />
                     </div>
                     <div class="button input-box">
                        <input type="submit" name="submit" onclick=registration() placeholder="Submit" />
                     </div>
                     <div class="text">
                        <p>
                           Already have an account?
                           <a href="login.php">Sign in</a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>

<?php 
include_once 'footer.php';
?>