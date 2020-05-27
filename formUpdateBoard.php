<?php
session_start();

$_SESSION['todolist_id'] = $_GET['id'];
?>
<!doctype html>
<html>
<head>
  <meta charset=utf-8>
  <title>page form Update board</title>
  <link rel="stylesheet" href="login.css"/>
  <style>
    input{
      padding:0;
      height: 45px;
    }
  </style>

</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-in-container">
      <form action="updateBoard.php" method="POST">
        <h1>Update Board</h1>
          <input type="color" class="form-control border-0" style="border:none; background:none" name="color" id="color" value="<?php echo $_SESSION['color'] ?>" required="">
          <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" placeholder="Add board title" style="padding:12px 15px">
          <button type="submit" name="register">UPDATE</button>
      </form>
    </div>
    <div class="overlay-container">
			<div class="overlay">

				<div class="overlay-panel overlay-right">
					<h1>You have used 4 of your 10 free Boards</h1>
					<p>For unlimited Boards and Power-Ups, priority support, automation and more, upgrade to Business Class.</p>
					<button class="ghost" id="signUp">Learn More</button>
				</div>
			</div>
		</div>
  </div>


  
</body>
</html>
