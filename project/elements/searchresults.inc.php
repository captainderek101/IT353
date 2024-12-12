<?php
    include 'php/connect.inc.php';

    $sql = "SELECT userID, postID, grenadeID, mapID, title, lastUpdated, description FROM Posts";
    if(isset($_POST["map"]))
    {
        $map = $_POST["map"];
        if($map != "none")
        {
            $mapSQL = "SELECT mapID FROM Maps WHERE name = '$map'";
            $result = $conn->query($mapSQL);
            $row = $result->fetch_assoc();
            $mapID = $row["mapID"];
        }
    }
    if (isset($_POST["grenade"]))
    {
        $grenade = $_POST["grenade"];
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
    if (isset($_POST["sortBy"]))
    {
        $sortBy = $_POST["sortBy"];

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
    echo "<ul>";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sql = "SELECT username FROM Users WHERE userID = '".$row["userID"]."'";
            $posterUsername = $conn->query($sql)->fetch_assoc()["username"];
            $sql = "SELECT name FROM Maps WHERE mapID = '".$row["mapID"]."'";
            $mapName = $conn->query($sql)->fetch_assoc()["name"];
            $sql = "SELECT name FROM Grenades WHERE grenadeID = '".$row["grenadeID"]."'";
            $grenadeName = $conn->query($sql)->fetch_assoc()["name"];
            echo "<li id='".$row["title"]."'><a href='lineup.php?postID=".$row["postID"]."'>";
            echo "<div class='row'>";
            echo "<div class='column'>".$row["title"]."</div>";
            echo "<div class='column'>Map: ".$mapName."</div>";
            echo "<div class='column'>Grenade Type: ".$grenadeName."</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='column'>By ".$posterUsername."</div>";
            $date = date_create($row["lastUpdated"]);
            echo "<div class='column'>".date_format($date,"m/d/Y g:i a")."</div>";
            if(isset($userID) && $userID == $row["userID"])
            {
                include 'deletepost.inc.php';
            }
            echo "</div>";
            echo "</a></li>";
        }
    }
    else
    {
        echo "<p style='text-align: center'>0 results match your query.</p>";
    }
    echo "</ul>";
?>