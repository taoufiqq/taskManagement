<?php
 session_start();

    $hostname = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "zentao";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

   $taskText = $_POST['taskText'];
   $id = $_GET['id'];
   $t_id = $_GET['t_id'];
 

   $_SESSION['taskText'] = $taskText;

   
	$sql = "UPDATE task SET taskText='$taskText', done='0' WHERE task_id='$id'";
    echo $sql;
    mysqli_query($conn, $sql);
    header("Location: task.php?id=".$t_id);

?>
