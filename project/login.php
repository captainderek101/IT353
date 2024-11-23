<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CS2 Lineups - Login Results</title>
    </head>
    <body>
        <h1>Login</h1>
        <h2> Welcome <?php echo $username ?>! </h2>
        
        <form action="login.php" method="GET">
            <p>
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" placeholder="Enter username">
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="text" id="password" name="password" placeholder="Enter password">
            </p>
            <p>
                <input type="submit" value="Click here to submit">
            </p>
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $username = $_GET["username"];
            $password = $_GET["password"];
        }
        ?>
        <!-- TODO: Check database
            If user exists, redirect to home page
            If user doesn't exist, go to login page with error -->
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>