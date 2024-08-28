<?php

session_start();
$user=$_SESSION["user"];
$password=$_SESSION["password"];
if($user==null && $password==null){
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
    <title>Learn pro</title>
    <link rel="stylesheet" href="../styles/star.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="../js/error.js"></script>
    <script src="../js/star.js"></script>
    <link rel="icon" href="../images/iconWhite.png">

</head>

<body>
    <a href="./" class="button">Go back</a>
    <a href="../close/close.php" class="button">Close</a>
   
    <center>
    <h1>Raiting Teacher</h1>
    <div class="center">
            <form action="" method="post">

                <label for="Academic_Training">Academic Training</label>
                <select name="Academic_Training" id="Academic_Training">
                    <?php
                    while ($re = mysqli_fetch_assoc($result)) {
                        $values = $re["NAME"];
                        echo "<option value='$values' class='options'>$values</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="Proffesor">Proffesor</label>
                <input type="text" name="Proffesor" id="Proffesor" placeholder="Write here">
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
                <label for="Theme">Theme</label>
                <input type="text" name="Theme" id="Theme" placeholder="Write here">


                <br>
                <div class="container">
                    <div class="star-widget">
                        <input type="radio" name="rate" id="rate-5" value="5">
                        <label for="rate-5" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-4" value="4">
                        <label for="rate-4" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-3" value="3">
                        <label for="rate-3" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-2" value="2">
                        <label for="rate-2" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-1" value="1">
                        <label for="rate-1" class="fas fa-star"></label>

                    </div>

                </div>
                <br>
                <label for="Comments">Comments</label>
                <br>
                <textarea name="Comments" id="Comments" placeholder="Write here"></textarea>
                <br>
                <input type="submit" value="Add" name="Send" id="Send" class="button">

            </form>
        </div>

    </center>
    <?php
    if (isset($_POST["Send"])) {
        //getting values
        $Qualification = $_POST["rate"];
        $Academic_Training = $_POST["Academic_Training"];
        $Proffesor = $_POST["Proffesor"];
        $Semester = $_POST["Semester"];
        $Theme = $_POST["Theme"];
        $Comments = $_POST["Comments"];

        //connection wiht database
        $connection2 = mysqli_connect(server, user, password, database, port);

        //query
        $queryInsert = "INSERT INTO `PROFFESOR` 
        (`id`,`Academic_Training`,`PROFFESOR`,`SEMESTER`,`THEME`,`QUALIFICATION`,`COMMENTS`) VALUES
         ('0','$Academic_Training','$Proffesor','$Semester','$Theme','$Qualification','$Comments');";

        //insert query

        $query2 = mysqli_query($connection2, $queryInsert);

        if ($query2) {
            echo "<script>
            swal('Good job','','success');
            </script>";
        }
    }
    ?>
</body>

</html>