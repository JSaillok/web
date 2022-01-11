<?php 
include_once 'header.php'
?>
<head>
   <title>Profile Page</title>
</head>
<body>
   <div class="container">
      <form accept-charset="utf-8">
         <div class="form-content">
            <div class="profile_form">
         <div class="title">Profile Management</div>
         <div id="error"></div>
         <div class="input-boxes">
            <div  class="input-box">
               <label for="username"> </label>
               <input type="text" name="username" placeholder="New Username..." required>
            </div>
            <div class="input-box">
            <label for="password"></label>
            <input type="password" name="oldPassword" placeholder="Enter Old password..." required>
            </div>
            <div class="input-box">
               <label for="password"></label>
               <input type="password" name="newPassword" placeholder="Enter New Password..." required>
            </div>
            <div class="input-box">
               <label for="password"></label>
               <input type="password" name="newPassword2" placeholder="Confirm New Password..." required>
            </div>
            <div class="input-box">
               <button class = "btn" type="submit"  name="sumbit-new" onclick = "profile_manage()">Submit</button>
            </div>
            </div>
         </div>
         </div>
      </form>
   </div>
   <script src="scripts/profileManage.js"></script>
</body>

<?php 
include_once 'footer.php'
?>