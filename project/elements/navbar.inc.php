<div id='navbar'>
    <ul>
        <li>
            <div><a id="logo" href="index.php"><img src='elements/graphics/cs2 lineups logo.png' alt='website logo'></a></div>
        </li>
        <li>
            <div><a id="nav" href="index.php">Search</a></div>
        </li>
        <li>
            <div><a id="nav" href="compose.php">Create Post</a></div>
        </li>
        <li>
            <div><a id="nav" href="about.php">About</a></div>
        </li>
        <li>
            <?php
                if (!isset($_SESSION['userID']))
                {
                    echo "<div><a id='nav' href='login.php'>Log In</a></div>";
                }
                else
                {
                    include "logout.inc.php";
                }
            ?>
            
        </li>
    </ul>
</div>