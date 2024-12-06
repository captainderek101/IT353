<!DOCTYPE html>
<html>
    <head>
        <title>CS2 Lineups - Login Results</title>
        <?php
            include 'elements/head.inc.php';
        ?>
    </head>
    <body>
        <h1>Login</h1>
        <?php
            include 'elements/php/connect.inc.php';
        ?>
        <?php
            include 'elements/navbar.inc.php';
        ?>


        <form id="typical" action="login.php" method="POST">
            <p>
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" placeholder="Enter username">
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="text" id="password" name="password" placeholder="Enter password">
            </p>
            <p>
                <input type="submit" value="Log In">
            </p>
        </form>
        <a href="register.php"><p id="specialLink">Register new account</p></a>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = strtolower($_POST["username"]);
            $password = $_POST["password"];
            $sql = "SELECT userID FROM Users WHERE username = '$username' AND BINARY password = '$password'";

            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                session_start();
                $_SESSION['user'] = $username;
                $row = $result->fetch_assoc();
                $_SESSION['userID'] = $row["userID"];
                //echo "<h2> Welcome $username! </h2>";
                header('Location: index.php');
                die();
            }
            else
            {
                echo "<h2> Login Failed. </h2>";
            }
        }
        ?>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>