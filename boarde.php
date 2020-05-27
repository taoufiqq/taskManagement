<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "mysql";
$dbname = "zentao";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

$id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="boarde.css">
  </head>
  <body id="body">
    <header>
      <nav class="navbar navbar-light" style="background:linear-gradient(135deg, #0079bf, #5067c5)">
        <div class="wrapper">
            <div class="navbar">
                <div class="left">
                  <a class="navbar-brand" href="index.html">
                    <img src="logo.png" width="30" height="30" alt="" loading="lazy">
                  </a>
                </div>
               <div class="dropdown">
                 <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="<?php echo $_SESSION['image'] ?>" alt="admin" style="border-radius: 50%;width: 40px;height: 40px;"><i class="fas fa-angle-down"></i>
                 </a>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"style="margin-left: -104px;margin-top: 17px;height: 146px;">
                   <ul>
                     <li><a href="profil.php" style="color:#000"><i class="fas fa-user"></i> Profile</a></li>
                     <li><a href="#" style="color:#000"><i class="fas fa-sliders-h"></i> Settings</a></li>
                     <li><a href="logout.php"style="color:#000"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
                 </ul>
                 </div>
              </div>
            </div>
        </div>
     </nav>
    </header>

<section style="padding-top:30px" id="blur">
  <div class="container">
      <h3>Your Team Boards</h3>
      <div class="row">
         <div class="col-sm-4">
           <div class="board-tile mod-add" style='border-radius:0;'>
             <div onclick="openForm();">Create new board</div>
           </div>
         </div>
         <?php
         $id = $_SESSION['user_id'];
         $user_id = $_SESSION['user_id'];

        $posts = "SELECT * FROM todolist";
        $all_posts = mysqli_query($conn, $posts);
        while ($row = mysqli_fetch_array($all_posts)) {
          if ($row['user_id'] == $_SESSION['user_id']) {
            echo "
         <div class='col-sm-4'>
           <div class='board-tile mod-add' style='border-radius:0; cursor:pointer;background-color:" . $row['color'] ."'>
              <div class='row'>
              <div class='col-sm-2 d-flex flex-column'>
               <a href='task.php?id=".$row['todolist_id']."'><i class='fa fa-share' style='color:white'></i></a>
               <a href='formUpdateBoard.php?id=".$row['todolist_id']."'><i class='fa fa-edit' style='color:white'></i></a>
               <a href='formDeleteBoard.php?id=".$row['todolist_id']."'><i class='fa fa-close' style='color:white'></i></a>
              </div>
              <div class='col-sm-10'>
               <div style='display: flex;align-items: center;height: 49px;color:white'>". $row['name'] ."</div>
              </div>
              </div>
           </div>
         </div>";
       }

      }
      ?>
     </div>
 </div>

</section>

 <!-- Form Create Borad -->

 <div class="container" id="container">

  <div class="row justify-content-center">
    <div class="col-6 col-md-4" style="margin-top: 12px;background: white;opacity:none:padding: 61px;">
      <div class="popup" style="">
        <div class="form-group" id="overlay">
          <h1>Create Board</h1>
             <form method="POST" action="insertBoard.php">
             <div class="social-containe">
             <input type="color" class="form-control border-0" name="color" id="color" required="" style="background: none;height: 68px;">
             </div>
             <input type="text" name="name"  placeholder="Add board title" style="width: 100%;margin: 0px 10px 10px 0;padding: 11px;">
             <button type="submit"  class="btn btn-primary" onclick="closeForm();" style="margin: auto;display: flex;">Submit</button>
            </form>
        </div>
      </div>

   </div>
  </div>
</div>

<!-- javascript popup -->
<script>
  function toggle(){
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
  }
</script>


<script>
const btn = document.getElementById("color");
const box = document.querySelector(".mod-add");

for (var i = 0; i <btn.length; i++) {
btn[i].addEventListener("click", function(){
  box.style.background = this.getAttribute("data-color");
  this.style.color = this.getAttribute("data-color");
})
}
// open form create new board

function openForm(){
  document.getElementById("overlay").style.display="block";
}
function closeForm(){
  document.getElementById("overlay").style.display="none";

}

</script>





    <!-- Optional JavaScript -->
      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
