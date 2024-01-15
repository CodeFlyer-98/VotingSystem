<?php 
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"votesystem");
session_start();
    $res = mysqli_query($conn,"UPDATE admin SET vote_status = 'on'");
    if($res){
        $_SESSION['on']="Voting is enabled";
        $_SESSION['message']="Voting Started";
        header("Location: home.php");
    }
?>