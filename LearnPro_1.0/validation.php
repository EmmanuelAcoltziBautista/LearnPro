<link rel="stylesheet" href="./styles/styles.css">
<script src="./js/error.js"></script>
<link rel="stylesheet" href="./styles/alert.css">
<title>Learn Pro</title>
<script>
    function al() {
        swal('Error', '', 'warning').then(function() {
            document.location.href = "StartSession.php"
        });

    }
</script>
<?php
require_once "./database/database.php";
if (!empty($_POST["PHONE"]) && !empty($_POST["password"])) {
    $user = $_POST["PHONE"];
    $password = $_POST["password"];
    $connect = mysqli_connect(server, user, password, database, port);
    $query = "SELECT `STATUS` FROM `USERS` WHERE PHONE='$user' AND PASSWORD='$password';";
    $result = mysqli_query($connect, $query);
    $out = mysqli_num_rows($result);
    if ($out > 0) {
        $status="";
        if($re=mysqli_fetch_assoc($result)){
            $status=$re["STATUS"];

        }

        session_start();
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password;
        if($status == "Admin") {
            echo "<script>document.location.href='./Admin/index.php';</script>";
        } else {
            echo "<script>document.location.href='./content/index.php';</script>";
        }
    } else {
        echo "no";
        echo "<script>
        al();
</script>";
    }
} else {

    header('Location:index.php');
}

?>