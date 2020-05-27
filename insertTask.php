<?php
 session_start();

     $hostname = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "zentao";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

   $taskText = $_POST['taskText'];
   $id = $_GET['id'];

    

	$sql = "INSERT INTO task (taskText, done, todolist_id)  VALUES('$taskText', 0, '$id')";
    echo $sql;
    mysqli_query($conn, $sql);
    header("Location: task.php?id=".$id);




?>
