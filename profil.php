<?php
session_start();


    $firstname = '';
    if(isset($_SESSION['firstname'])) $firstname = $_SESSION['firstname'];

    $image = '';
    if(isset($_SESSION['image'])) $image = $_SESSION['image'];

    $lastname = '';
    if(isset($_SESSION['lastname'])) $lastname = $_SESSION['lastname'];

    $username = '';
    if(isset($_SESSION['username'])) $username = $_SESSION['username'];

    $email = '';
    if(isset($_SESSION['email'])) $email = $_SESSION['email'];

    $password = '';
    if(isset($_SESSION['password'])) $password = $_SESSION['password'];


?>

<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<title>Page Profil</title>
<link rel="stylesheet" href="profil.css"/>
</head>
<body style="padding-bottom: 15px">
<header>
  <nav class="navbar navbar-light" style="background:linear-gradient(135deg, #0079bf, #5067c5)">
    <div class="wrapper">
        <div class="navbar">
            <div class="left">
              <a class="navbar-brand" href="index.html">
                <img src="logo.png" width="30" height="30" alt="" loading="lazy">
              </a>
              <a href="boarde.php" style="color:white; font-size:20px;">Board</a>
            </div>
            <button type="button" class="btn btn-outline-light"><a href="logout.php">Log out</a></button>
            
          </div>
    </div>
 </nav>
</header>

<section class="profile" style="padding-top:30px">
<div class="container">
<h1>MY PROFILE</h1>

  <div class="row justify-content-center" >
    <div class="col-sm-12">
      <form action="updateUser.php" method="POST">
              <img src="<?php echo $_SESSION['image'] ?>" id="image" name="image" style="width: 250px;height: 250px;border-radius: 50%;margin:auto;display: flex;" />
              <div class="form-group">
                <label for="inputAddress" >Image</label>
                <input type="text" class="form-control" name="image"  placeholder="" id="uploadImage" >
             </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">First Name</label>
                  <input type="text" name="firstname" class="form-control" value="<?php echo $firstname?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Last Name</label>
                  <input type="text" class="form-control" name="lastname"  value="<?php echo $lastname?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Username</label>
                <input type="text" class="form-control" name="username"  placeholder="" value="<?php echo $username?>">
              </div>
              <div class="form-group">
                <label for="inputAddress">Email</label>
                <input type="text" class="form-control" name="email"  placeholder="" value="<?php echo $email?>">
              </div>
              <div class="form-group">
                <label for="inputAddress">Pasword</label>
                <input type="password" class="form-control" name="password"  placeholder="" value="<?php echo $password?>">
              </div>
              <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
  </div>

</div>

</section>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script>
	function readURL(input) {
	if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
					$('#image').css('background-image', 'url('+e.target.result +')');
					$('#image').hide();
					$('#image').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
	}
}
$("#uploadImage").change(function() {
	readURL(this);
});
	</script>




</body>
</html>
