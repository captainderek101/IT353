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
                    echo "<h2 id='error'> Comment failed to be created. </h2>";
                }
            }

            // Delete comment when requested
            if(isset($_POST["delete"]))
            {
                $sql = "DELETE FROM Comments WHERE commentID = '".$_POST["delete"]."' AND userID = '".$userID."'";
                $result = $conn->query($sql);
                if($result === FALSE)
                {
                    echo "<p id='error'>Error deleting comment.</p>";
                }
            }
        ?>
        <br>

        <form id="typical" action="" method="GET">
            <h2>Comments:</h2>
            <label for="sortBy"> Sort By: </label>
            <?php
                include 'elements/dropdowns/sorting.options.inc.html';
            ?>
            <input style="display:none" type="text" name="postID" value="<?php echo $postID?>" readonly>
            <br>
        </form>
        <br>
        <!-- List of comments -->
        <div id='results'>
        </div>
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
                <textarea <?php if (!isset($_SESSION['user'])) { echo "disabled"; } ?> id="comment" name="comment" 
                    placeholder="Write comment here" maxlength="256"></textarea>
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
    
    <script>
        $(document).ready(function () {
            getResults();
        });
        function getResults() {
            $("#results").load("elements/commentresults.inc.php", 
            {
                "sortBy": document.getElementById("sortBy").value,
                "postID": <?php echo $postID ?>
            });
        }
    </script>
</html>