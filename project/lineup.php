<!DOCTYPE html>
<html>
    <head>
        <title>Insert Title Here</title>
        <?php
            include 'elements/head.inc.php';
        ?>
    </head>
    <body>
        <h1>Lineup</h1>
        <?php
            include 'elements/php/connect.inc.php';
        ?>
        <?php
            include 'elements/navbar.inc.php';
        ?>
        <?php

            // Get postID
            if (isset($_GET["postID"]))
            {
                $postID = $_GET["postID"];
                include 'elements/post.inc.php';
            }
            else
            {
                header('Location: notfound.php');
                die();
            }
            
            // Create comment when made
            if(isset($_POST["comment"])){
                $comment = $_POST["comment"];

                $sql = "INSERT INTO Comments (userID, postID, description) VALUES ('$userID', '$postID', '$comment')";
                $result = $conn->query($sql);
                if($result === FALSE)
                {
                    echo "<h2> Post failed to be created. </h2>";
                }
            }

            // Delete comment when requested
            if(isset($_POST["delete"]))
            {
                $sql = "DELETE FROM Comments WHERE commentID = '".$_POST["delete"]."' AND userID = '".$userID."'";
                $result = $conn->query($sql);
                if($result === FALSE)
                {
                    echo "<p>Error deleting comment.</p>";
                }
            }
        ?>
        <!-- TODO: "Go back" button -->
        <br>

        <form id="typical" action="" method="GET">
            <h2>Comments:</h2>
            <label for="sortBy"> Sort By: </label>
            <?php
                include 'elements/dropdowns/sorting.options.inc.html';
            ?>
            <input style="display:none" type="text" name="postID" value="<?php echo $postID?>" readonly>
            <input type="submit" value="Apply">
            <br>
        </form>
        <br>
        <!-- List of comments -->
        <?php
            $sql = "SELECT commentID, userID, description FROM Comments WHERE postID = '$postID'";
            if (isset($_GET["sortBy"]))
            {
                $sortBy = $_GET["sortBy"];

                switch ($sortBy)
                {
                    case "oldest":
                        $sql .= " ORDER BY lastUpdated";
                        break;
                    default:
                        $sql .= " ORDER BY lastUpdated DESC";
                        break;
                }
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<div id='results'><ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li>";
                    $sql = "SELECT username FROM Users WHERE userID = '".$row["userID"]."'";
                    $commentUsername = $conn->query($sql)->fetch_assoc()["username"];
                    echo $commentUsername.": ".$row["description"]."<br>";
                    if(isset($userID) && $userID == $row["userID"])
                    {
                        include 'elements/deletecomment.inc.php';
                    }
                    echo "</li>";
                }
                echo "</ul></div>";
            }
            else
            {
                echo "<p style='text-align: center'>There are no comments.</p>";
            }
        ?>
        <form id="typical" action="lineup.php?postID=<?php echo $postID?>" method="POST">
            <?php
                echo "<label for='sortBy'>";
                if (!isset($_SESSION['user']))
                {
                    echo "Log in to comment!";
                }
                else
                {
                    $username = $_SESSION['user'];
                    echo "Comment as $username:";
                }
                echo "</label>";
            ?>
            <p>
                <input type="text" id="comment" name="comment" placeholder="Write comment here">
            </p>
            <p>
                <?php
                    if (isset($_SESSION['userID']))
                    {
                        echo "<input type='submit' value='Post comment'>";
                    }
                ?>
            </p>
        </form>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>