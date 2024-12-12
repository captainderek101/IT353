<!DOCTYPE html>
<html>
    <head>
        <title>CS2 Lineups - Register Account</title>
        <?php
            include 'elements/head.inc.php';
        ?>
    </head>
    <body>
        <h1>Register Account</h1>
        <?php
            include 'elements/php/connect.inc.php';
        ?>
        <?php
            include 'elements/navbar.inc.php';
        ?>


        <form id="typical" action="register.php" method="POST">
            <p>
                <label class="required" for="username">Username: </label>
                <input required type="text" id="username" name="username" placeholder="New username" maxlength="16">
            </p>
            <p>
                <label class="required" for="password">Password: </label>
                <input required type="text" id="password" name="password" placeholder="New password (case-sensitive)" maxlength="64">
            </p>
            <p>
                <input type="submit" value="Register Account">
            </p>
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = strtolower($_POST["username"]);
            $password = $_POST["password"];
            $sql = "SELECT userID FROM Users WHERE username = '$username'";
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                echo "<h2 id='error'> Username already exists! </h2>";
            }
            else if($username == "" || $password == "")
            {
                echo "<h2 id='error'> Must provide a username and a password! </h2>";
            }
            else
            {
                $sql = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";
                $result = $conn->query($sql);
                if($result === TRUE)
                {
                    session_start();
                    $_SESSION['user'] = $username;
                    
                    $sql = "SELECT userID FROM Users WHERE username = '$username' AND BINARY password = '$password'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $_SESSION['userID'] = $row["userID"];
                    header('Location: index.php');
                    die();
                }
                else
                {
                    echo "<h2 id='error'> Registration Failed. </h2>";
                }
            }
        }
        ?>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>