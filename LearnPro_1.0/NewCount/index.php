<html>

<head>
    <title>Learn Pro</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../images/iconWhite.png">
    <script src="../js/error.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .icon {
            width: 500px;
            float: left;
        }

        form {
            float: right;
        }
    </style>
</head>

<body>
    <a class="button" href="../index.php">Go back</a>
    <center>
        <h1>Create new account</h1>
    </center>
    <img src="../images/iconBlack.png" class="icon">
    <form method="post" action="">

        <label for="Name">Name:</label>
        <br>
        <input type="text" id="Name" class="text" name="Name"  required>
        <br>
        <label for="Email">Email:</label>
        <br>
        <input type="email" id="Email" class="text" name="Email"  required>
        <br>
        <label for="Phone">Phone number:</label>
        <br>
        <input type="number" id="Phone" name="Phone" class="text"  required>
        <br>
        <label for="password">Password:</label>
        <br>
        <input type="password" id="Password" name="Password" class="text"  required>
        <br />

        <input type="submit" value="Create account" id="Create" name="Create" class="button">
    </form>



    <?php
    if (isset($_POST["Create"])) {

        //getting dates

        $pass = $_POST["Password"];
        $email = $_POST["Email"];
        $name = $_POST["Name"];
        $phone = $_POST["Phone"];
        //connection with database
        require_once "../database/database.php";
        $connect = mysqli_connect(server, user, password, database, port);
        $query = "INSERT INTO `USERS`(`id`, `NAME`, `EMAIL`, `PHONE`, `PASSWORD`,`STATUS`) 
			VALUES ('0','$name','$email','$phone','$pass','')";
        $result = mysqli_query($connect, $query);
        echo "
			<script>
			swal('Created account','','success').then(function(){
              document.location.href='../StartSession.php';});
          
            </script>";
    }

    ?>
</body>

</html>