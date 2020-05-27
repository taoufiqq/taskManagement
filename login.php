<?php
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title>PAGE LOGIN</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css"/>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="loginController.php" method="POST">
				<h1>Create Account</h1>
				<div class="name">
					<div style="padding:0 5px 0 0">
							<input type="text" name="firstname" placeholder="FirstName" required=""/>
					</div>
					<div >
							<input type="text" name="lastname" placeholder="LastName" required=""/>
					</div>
				</div>
				<input type="text" name="username" placeholder="Username" required=""/>
				<input type="email" name="email" placeholder="Email"required="" />
				<input type="password" name="password" placeholder="Password"required="" />
				<input type="password" name="cpassword" placeholder="Confirme your Password"required="" />
				<input type="file" name="image" placeholder="Username" required=""/>
				<button type="submit" name="register">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="loginModel.php" method="POST">
				<h1>Sign in</h1>
				<input type="email" name="email" placeholder="Email" />
				<input type="password" name="password" placeholder="Password" />
				<a href="#">Forgot your password?</a>
				<button type="submit" name="login">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script>
	function readURL(input) {
	if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
					$('#imagePreview').css('background-image', 'url('+e.target.result +')');
					$('#imagePreview').hide();
					$('#imagePreview').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
	}
}
$("#imageUpload").change(function() {
	readURL(this);
});
	</script>
	<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
	</script>




</body>
</html>
