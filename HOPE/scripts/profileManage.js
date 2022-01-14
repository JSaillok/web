const btn = document.querySelector(".btn");

function check(password){

    let pwdflag = false;

		for(var j=0;j<password.length;j++){

      if(password.match(/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/))
      {
      pwdflag = true;
      }
		}
    return pwdflag;
}

function change_info(){

  event.preventDefault();

    let username = $("input[name = username]").val();
    let old_password = $("input[name = oldPassword]").val();
    let new_password = $("input[name = newPassword]").val();
    let new_password2 = $("input[name = newPassword2]").val();
    
  console.log(username);


 if (new_password!= new_password2){
      document.getElementById("error").innerHTML = "Passwords don't match!";
  }
  else if (!check(new_password)){
  document.getElementById("error").innerHTML = "Try another password! Minimum 8 chars, 1 capital, 1 digit, 1 special character.";
  }
  else{
    
    const change = $.ajax({
      url:'includes/profileCheck.inc.php',
      type: 'POST',
      dataType:'Text',
      data: {username:username, oldPassword: old_password, newPassword:new_password}
    });
    change.done(onsuccess);

    $('#form').submit(function(event) {
    event.preventDefault();
    });

}
function onsuccess(response){
    if (response == "Old Password Wrong" ){
      console.log(response);
        document.getElementById("error").innerHTML = "Old Password Error";
        //check for password format !!!!!!
    // window.location.assign("profile.php");
    }
    else if(response == 'Old Password Match'|| response == 'Password changed'){
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
