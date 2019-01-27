<?php

session_start();
include_once('../includes/connect.php');

if (isset($_SESSION['logged_in'])) {

} else {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password= md5($_POST['password']);

        if(empty($username) or empty($password)) {
            $error = '*All field ar required';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? : user_password = ?");

            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();

                if ($num == 1) {
                    $_SESSION['logged_in'] = true;
                    header('Location: index.php');
                    exit();
                } else {
                    $error = '*Incorrect details!';

            }

        }
    }
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>My Content Managment Page</title>
        <link rel="stylesheet" href="../assets/style.css" />
        <link rel="stylesheet" href="../assets/normalize.css" />
        </head>
        <body>
        <div class = "container">
            <a href="index.php" id="logo">Mani raksti</a>
       <br /><br />
        <?php if (isset($error)) { ?>
            <small style="color:#aa0000"><?php echo $error; ?></small>
        <br /><br />
        <?php } ?>
       <form action="index.php" method="POST" autocomplete="off">
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" value="Login" />
        </form>
        </div>
        </body>
        </html>
    <?php
}
?>