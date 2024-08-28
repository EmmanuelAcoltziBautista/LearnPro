<?php
session_start();
$user = $_SESSION["user"];
$password = $_SESSION["password"];
if ($user == null && $password == null) {
    header('Location:../close/close.php');
}
require_once "../database/database.php";
$connecion1 = mysqli_connect(server, user, password, database, port);
$query = "SELECT * FROM `Academic_training`;";
$result = mysqli_query($connecion1, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/iconWhite.png">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="../js/error.js"></script>
    <title>Learn Pro</title>
</head>

<body>
    <a href="./" class="button">Go back</a>
    <a href="../close/close.php" class="button">Close</a>
    <center>
        <h1>Academic Training</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Delete</th>

            </tr>
            <ul>
                <?php
                while ($re = mysqli_fetch_assoc($result)) {
                    $id=$re["id"];
                    echo "<tr><td>" . $re["NAME"] . "</td><td><a href='./Delete.php?ID=$id' class='button'>Delete</a></td></tr>";

                }
                ?>
            </ul>
        </table>
        <br>
        <br>
        <h3>New Academic training</h3>
        <form action="" method="post">
            <label for="Academic_training">Academic training</label>
            <input type="text" name="Academic_training" id="Academic_training" placeholder="Write here" required>
            <input type="submit" value="Register" id="Send" name="Send" class="button">
        </form>
        <?php
        $connection2 = mysqli_connect(server, user, password, database, port);
        if (isset($_POST["Send"])) {
            $Academic_Training=$_POST["Academic_training"];

            $query2 = "INSERT INTO `Academic_training` (`id`,`NAME`) 
            VALUES ('0','$Academic_Training');";
            $result2=mysqli_query($connection2,$query2);
            if($result2){
                echo"
                <script>
                swal('Good job','','success');
                </script>
                
                ";

            }
        }
        ?>
    </center>

</body>

</html>