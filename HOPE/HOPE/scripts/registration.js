$(document).ready(function(){
  
	$('#myForm').on('submit', function(e){
		e.preventDefault();
		// alert('Clicked');
		let username = $("input[name = username]").val();
		let email = $("input[name = email]").val();
		let password  = $("input[name = password]").val();
		let cpassword  = $("input[name = cpassword]").val();


		$.ajax({
			type:"POST",
			url:"includes/signup.inc.php",
			data: {username:username, email: email, password:password, cpassword:cpassword},
			success: function(response){
				console.log(response);
				let errors = JSON.parse(response);
				console.log(JSON.parse(response));
				
				$(".errors").css("display", "block");

				console.log(errors['message']);

				if (errors['status'] == 1) {
					// $(".errors").css("display", "block");
					$(".errors").html('<p>'+errors.message+'</p>');
					
				}
				else {
					// $('#myForm')[0].reset();
					$(".errors").html('<p>'+errors.message+'</p>');
					window.location.href='login.php';
				}
			}
		})
	});
});