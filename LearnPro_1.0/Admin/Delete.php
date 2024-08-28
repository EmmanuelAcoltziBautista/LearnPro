<?php
session_start();
$user=$_SESSION["user"];
$password=$_SESSION["password"];
if($user==null && $password==null){
	header('Location:../close/close.php');
}
if(!empty($_GET["ID"])){
    $ID=$_GET["ID"];
    require_once "../database/database.php";
    $query="DELETE FROM `Academic_training` WHERE id='$ID';";
    $connecion1=mysqli_connect(server,user,password,database,port);
    $result=mysqli_query($connecion1,$query);
    if($result){
        header('Location:./AcademicTraining.php');
    }

}
?>