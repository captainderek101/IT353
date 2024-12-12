<div id="contents">
    <!-- TODO: Upvote/downvote with score -->
    <?php
        $sql = "SELECT pictureID, mapID, grenadeID, userID, lastUpdated, title, description FROM Posts WHERE postID = '$postID'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            // output data of each row
            $row = $result->fetch_assoc();
            echo "<h2>".$row["title"]."</h2>";
            
            $sql = "SELECT name FROM Maps WHERE mapID = '".$row["mapID"]."'";
            $mapName = $conn->query($sql)->fetch_assoc()["name"];
            $sql = "SELECT name FROM Grenades WHERE grenadeID = '".$row["grenadeID"]."'";
            $grenadeName = $conn->query($sql)->fetch_assoc()["name"];
            echo "Map: ".$mapName."&#09;&#09;&#09;&#09;Grenade Type: ".$grenadeName."<br>";
            
            if($row["description"] == "")
            {
                echo "<p>No description.</p>";
            }
            else 
            {
                echo "<div class='row'>";
                echo $row["description"];
                echo "</div>";
            }
            if($row["pictureID"] != 0)
            {
                $sql = "SELECT file FROM Pictures WHERE pictureID = '".$row["pictureID"]."'";
                $filename = $conn->query($sql)->fetch_assoc()["file"];
                echo "<img id='screenshot' src='/project".$filename."' alt='Lineup screenshot'>";
            }

            $sql = "SELECT username FROM Users WHERE userID = '".$row["userID"]."'";
            $posterUsername = $conn->query($sql)->fetch_assoc()["username"];
            echo "<p>Posted by $posterUsername at ".$row["lastUpdated"].".</p>";
        }
        else
        {
            echo "<h2 id='error'>Post not found...</h2>";
        }
    ?>
    <!-- TODO: Location on map -->
    <!-- TODO: Report post button -->
</div>