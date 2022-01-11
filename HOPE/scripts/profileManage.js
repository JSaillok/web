const btn = document.querySelector(".btn");

function profile_manage(){
    let username = $("input[name = username]").val();
    let old_password = $("input[name = oldPassword]").val();
    let new_password = $("input[name = newPassword]").val();
    let new_password2 = $("input[name = newPassword2]").val();
    
  console.log(username);

  if (new_password!= new_password2){
      document.getElementById("error").textContent = "Passwords don't match!";
  }
  else{
    // $("input[name=username]").val();
		// $("input[name=oldPassword]").val();
		// $("input[name=newPassword]").val();

    const change = $.ajax({
      url:'includes/profileCheck.inc.php',
      type: 'POST',
      dataType:'Text',
      data: {username:username, oldPassword: old_password, newPassword:new_password}
    });
    change.done(onsuccess);

  $('form').on('submit', function(event) {
    event.preventDefault();
  });
}
function onsuccess(response){
    if (response == "shit" ){
      console.log(response);
        document.getElementById("error").innerHTML = "Passwords must be...!";
        //check for password format !!!!!!
    // window.location.assign("profile.php");
    }
    else if(response == 'Done'|| response == 'Password changed'){
      console.log(response);
      document.getElementById("error").innerHTML = "Successfull change of credentials!";
      // window.location.assign("index.php");
    }
    else{
      console.log(response);
      document.getElementById("error").textContent = "Something went wrong please try again.";
      // window.location.assign("profile.php");
    }
}
}
