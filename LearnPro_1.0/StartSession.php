<html>

<head>
    <title>Learn Pro</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" href="./images/iconWhite.png">
    <link rel="stylesheet" href="./styles/window.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">

    <style type="text/css">
        /*.U{
            background: rgba(255,255,255,0);
            outline: none;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            border-bottom: 3px solid #000;


        }
        .P{
            background: rgba(255,255,255,0);
            outline: none;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            border-bottom: 3px solid #000;


        }*/
        .U::placeholder {
            background-image: url("images/user.png");
            background-size: 20%;
            background-repeat: no-repeat;
            background-position: left center;
        }

        .P::placeholder {
            background-image: url("images/contra.png");
            background-size: 20%;
            background-repeat: no-repeat;
            background-position: left center;
        }

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
    <a href="./" class="button">Go back</a>
    <center>
        <h1>Learn Pro</h1>
    </center>
    <img src="./images/iconBlack.png" class="icon">
    <form method="post" action="./validation.php">
        <label for="PHONE">Number phone</label>
        <br />
        <br />
        <input type="number" id="PHONE" name="PHONE" class="U" placeholder="     Write here" required>
        <br />
        <br />
        <label for="password">Password</label>
        <br />
        <br />
        <input type="password" name="password" class="P" id="password" placeholder="     Write here" required>
        <br /><br />
        <input type="submit" value="Log In" id="Entry" name="Entry" class="button">
        <br /><br />
        <a href="./NewCount/index.php" class="button">Create new account</a>
    </form>




</body>

</html>