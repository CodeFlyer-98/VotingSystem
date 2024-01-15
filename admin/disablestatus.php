<?php 
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"votesystem");
session_start();
    $res = mysqli_query($conn,"UPDATE admin SET vote_status = 'off'");
    if($res){
        unset($_SESSION['on']);
        $_SESSION['message']="Voting closed";
        unset($_SESSION['duration']);
        unset($_SESSION["start_time"]);
        unset($_SESSION["end_time"]);
        unset($_SESSION['load']);
        unset($_SESSION['load']);
        header("Location: home.php");
    }
?>