<?php
 session_start();

    $hostname = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "zentao";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

   $name = $_POST['name'];
   $color = $_POST['color'];
   $id = $_SESSION['todolist_id'];

   $_SESSION['name'] = $name;
   $_SESSION['color'] = $color;
   
	  $sql = "UPDATE todolist SET name='$name', color='$color' WHERE todolist_id='$id' ";
    echo $sql;
    mysqli_query($conn, $sql);
    header("Location: boarde.php");

?>
