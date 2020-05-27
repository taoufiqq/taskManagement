<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "mysql";
$dbname = "zentao";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

$id = $_GET['id'];
$t_id = $GET['t_id'];
?>
<!doctype html>
<html>

<head>
  <meta charset=utf-8>
  <title>`echo $TM_FILENAME|cut -d. -f1`</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="/task.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

    body {
      background-color: #0079BF;
    }

    .todolist {

      width: 100%;
      height: 100;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: row;
      flex-wrap: wrap;
      background-color: #0079BF;
    }

    .column {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      background-color: #e3e3e3;
      padding: 15px;
      border-radius: 4px;
      margin: 10px 5px;
      width: 250px;
      min-height: 200px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .column .title {
      font-size: 20px;
      font-weight: 700;
      line-height: 1.3;
      color: black;
    }

    .item {
      margin-top: 5px;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      border-radius: 4px;
    }

    .item .item-title {
      font-family: 'Open Sans', sans-serif;
      font-size: 15px;
    }

    /* start Css nav bar dropsown*/

    .wrapper {
      width: 100%;
    }

    .wrapper .navbar {

      background: linear-gradient(135deg, #0079bf, #5067c5);
      display: flex;
      justify-content: space-between;
      padding: 10px 25px;
    }

    .wrapper .navbar ul li a {
      color: #fff;
    }

    .wrapper .navbar .left ul,
    .wrapper .navbar .right ul li a {
      display: flex;
      align-items: center;
      height: 30px;
    }

    .wrapper .navbar .left ul li,
    .wrapper .navbar .right img {
      margin: 0 10px;
    }

    .wrapper .navbar .right a {
      text-align: right;
    }

    .wrapper .navbar .right a span {
      font-size: 10px;
    }

    .wrapper .navbar .right ul li {
      position: relative;
    }

    .wrapper .navbar .right ul li .dropdown {
      position: absolute;
      top: 55px;
      right: 0;
      background: #0079bf;
      padding: 10px 25px;
      display: none;
    }

    .wrapper .navbar .right ul li .dropdown .fas {
      margin-right: 10px;
    }


    .wrapper .navbar .right ul li.active .dropdown {
      display: block;
    }


    /* end Css nav bar dropsown*/

  </style>
</head>

<body>
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
            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="<?php echo $_SESSION['image'] ?>" alt="admin"
                style="border-radius: 50%;width: 40px;height: 40px;"><i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
              style="margin-left: -104px;margin-top: 17px;height: 146px;">
              <ul>
                <li><a href="profil.php" style="color:#000"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#" style="color:#000"><i class="fas fa-sliders-h"></i> Settings</a></li>
                <li><a href="logout.php" style="color:#000"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section style="margin-top:40px">
  <h1 style="color:white; text-align:center"><?php echo $_SESSION['name']?></h1>
  <div class="todolist">
   
    <div class="column">
      <h1 class="title">To Do
        <a href='<?php echo "formTask.php?id=".$id ?>'><i class='fa fa-share'></i></a>
      </h1>
      <?php
       
       
        $posts = "SELECT * FROM task WHERE todolist_id = $id";

        $all_posts = mysqli_query($conn, $posts);
        while ($row = mysqli_fetch_array($all_posts)) {
         
            echo "
              <div class='item'>
                <h2 class='item-title'>".$row['taskText']."
                 <a href='updateTask.php?id=".$row['task_id'].'&t_id='.$row['todolist_id']."' style='float:right'><i class='fa fa-edit'></i></a>
                 <a href='deleteTask.php?id=".$row['task_id']. '&t_id='.$row['todolist_id']."' style='float:right'><i class='fa fa-trash'></i></a>
                </h2>
              </div>";
        }
      ?>
      
    </div>
    <div class="column">
      <h1 class="title">Test</h1>
    </div>
    <div class="column">
      <h1 class="title">Feedback</h1>
    </div>
    <div class="column">
      <h1 class="title">Done</h1>
    </div>
      </div>
  </section>
  <div class="button" style="display: flex;justify-content: center;margin: 22px;">
    <a href="boarde.php" style="color:white">Back to Board</a>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>
  <script>
    var d = dragula({
      moves: function (el, cont, handle) {
        return handle.className !== 'title'
      }
    })
    var cs = document.querySelectorAll('.column')
    for (var i in cs) {
      d.containers.push(cs[i])
    }

  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>
