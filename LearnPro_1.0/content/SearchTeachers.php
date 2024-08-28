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
    <title>Learn Pro</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../images/iconWhite.png">
</head>

<body>
    <a href="./" class="button">Go back</a>
    <a href="../close/close.php" class="button">Close</a>
    <center>
        <h1>Search Teachers</h1>
        <br><br>

        <form action="" method="post">
            <label for="Academic_Training">Academic Training</label>
            <select name="Academic_Training" id="Academic_Training">
                <?php
                while ($results = mysqli_fetch_assoc($result)) {
                    $academic = $results["NAME"];
                    echo "<option value='$academic'>$academic</option>";
                }

                ?>
            </select>
            <br>
            <label for="Semester">Semester</label>
            <select name="Semester" id="Semester">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value='$i'>$i st</option>";
                }
                ?>

            </select>
            <br>
            <br>
            <input type="submit" value="Search" class="button" name="Search" id="Seach">

        </form>
        <table >
            <tr>
                <th>Proffesor</th>
                <th>Theme</th>
                <th>Qualification</th>
                <th>Comments</th>

            </tr>
            <ul>
                <?php
                $connection2 = mysqli_connect(server, user, password, database, port);
                if (isset($_POST["Search"])) {
                    $Academic_Training = $_POST["Academic_Training"];
                    $SEMESTER = $_POST["Semester"];
                    $query2 = "SELECT * FROM `PROFFESOR` WHERE Academic_training='$Academic_Training' and SEMESTER='$SEMESTER' ORDER BY QUALIFICATION DESC;";
                    $SEARCHS = mysqli_query($connection2, $query2);
                    while ($find = mysqli_fetch_assoc($SEARCHS)) {
                        $Proffesor = $find["PROFFESOR"];
                        $Theme = $find["THEME"];
                        $Qualification = $find["QUALIFICATION"];
                        $Comments=$find["COMMENTS"];
                        $stars="";
                        for($j=0;$j<=$Qualification-1;$j++){
                            $stars.="★";

                        }
                        echo "<tr><td>$Proffesor</td><td>$Theme</td><td>$stars</td><td>$Comments</td></tr>";
                    }
                }

                ?>
            </ul>
        </table>
    </center>

</body>

</html>