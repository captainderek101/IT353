<!DOCTYPE html>
<html>
    <head>
        <title>CS2 Lineups - Search</title>
        <?php
            include 'elements/head.inc.php';
        ?>
    </head>
    <body>
        <h1>Search</h1>
        <?php
            include 'elements/php/connect.inc.php';
        ?>
        <?php
            include 'elements/navbar.inc.php';
        ?>
        <form id="typical" action="index.php" method="GET">
            <?php
                include 'elements/filters.inc.php';
            ?>
            <input type="submit" value="Apply Filters">
        </form>
        <!-- List of results -->
        <div id='results'>
        <ul>
        <?php
            if(isset($_POST["delete"]))
            {
                $sql = "SELECT Pictures.pictureID, file FROM Pictures INNER JOIN Posts ON Pictures.pictureID = Posts.pictureID WHERE postID = '".$_POST["delete"]."' AND userID = '".$userID."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $pictureID = $row["pictureID"];
                    $filename = $row["file"];
                    if($pictureID != 0)
                    {
                        define ('SITE_ROOT', realpath(dirname(__FILE__)));
                        unlink(SITE_ROOT.$filename);
                        $sql = "DELETE FROM Pictures WHERE pictureID = '".$pictureID."'";
                        $result = $conn->query($sql);
                        if($result === FALSE)
                        {
                            echo "<p>Error deleting picture.</p>";
                        }
                    }
                }
                $sql = "DELETE FROM Posts WHERE postID = '".$_POST["delete"]."' AND userID = '".$userID."'";
                $result = $conn->query($sql);
                if($result === FALSE)
                {
                    echo "<p>Error deleting post.</p>";
                }
            }

            $sql = "SELECT userID, postID, grenadeID, mapID, title, description FROM Posts";
            if(isset($_GET["map"]))
            {
                $map = $_GET["map"];
                if($map != "none")
                {
                    $mapSQL = "SELECT mapID FROM Maps WHERE name = '$map'";
                    $result = $conn->query($mapSQL);
                    $row = $result->fetch_assoc();
                    $mapID = $row["mapID"];
                }
            }
            if (isset($_GET["grenade"]))
            {
                $grenade = $_GET["grenade"];
                if($grenade != "none")
                {
                    $grenadeSQL = "SELECT grenadeID FROM Grenades WHERE name = '$grenade'";
                    $result = $conn->query($grenadeSQL);
                    $row = $result->fetch_assoc();
                    $grenadeID = $row["grenadeID"];
                }
            }
            if (isset($mapID) && $map != "none" && isset($grenadeID) && $grenade != "none")
            {
                $sql .= " WHERE mapID = '$mapID' AND grenadeID = '$grenadeID'";
            }
            else if (isset($mapID) && $map != "none")
            {
                $sql .= " WHERE mapID = '$mapID'";
            }
            else if (isset($grenadeID) && $grenade != "none")
            {
                $sql .= " WHERE grenadeID = '$grenadeID'";
            }
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
                while($row = $result->fetch_assoc()) {
                    $sql = "SELECT username FROM Users WHERE userID = '".$row["userID"]."'";
                    $posterUsername = $conn->query($sql)->fetch_assoc()["username"];
                    $sql = "SELECT name FROM Maps WHERE mapID = '".$row["mapID"]."'";
                    $mapName = $conn->query($sql)->fetch_assoc()["name"];
                    $sql = "SELECT name FROM Grenades WHERE grenadeID = '".$row["grenadeID"]."'";
                    $grenadeName = $conn->query($sql)->fetch_assoc()["name"];
                    echo "<li><a href='lineup.php?postID=".$row["postID"]."'><div>";
                    echo $row["title"]."&#09;&#09;&#09;&#09;";
                    echo "Map: ".$mapName."&#09;&#09;&#09;&#09;";
                    echo "Grenade Type: ".$grenadeName."<br>";
                    echo "By ".$posterUsername;
                    if(isset($userID) && $userID == $row["userID"])
                    {
                        include 'elements/deletepost.inc.php';
                    }
                    echo "</div></a></li>";
                }
            }
            else
            {
                echo "<p style='text-align: center'>0 results match your query.</p>";
            }
        ?>
        </ul>
        </div>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>