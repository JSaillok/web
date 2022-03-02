$(document).ready(function(){
  
	$('#myLogin').on('submit', function(e){
		e.preventDefault();
		// alert('Clicked');
		let username = $("input[name = usernameOremail]").val();
		let password  = $("input[name = password]").val();

		$.ajax({
			type:"POST",
			url:"includes/login.inc.php",
			data: {username:username, password:password},
			success: function(response){
				console.log(response);
				let errors = JSON.parse(response);
				console.log(JSON.parse(response));

				$(".errors").css("display", "block");

				console.log();

				if (errors['status'] == 1) {
					// $(".errors").css("display", "block");
					$(".errors").html('<p>'+errors.message+'</p>');
				}
        else {
					$(".errors").html('<p>'+errors.message+'</p>');
					if(errors['message']=="User!"){
							window.location.href='index.php';
					}
					else{
						window.location.href='adminHome.php';
					}
				}
			}
		})
	});
});