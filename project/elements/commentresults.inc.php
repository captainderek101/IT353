<?php
    include 'php/connect.inc.php';

    $sql = "SELECT commentID, userID, lastUpdated, description FROM Comments WHERE postID = '".$_POST["postID"]."'";
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
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<div class='row'>";
            echo $row["description"];
            echo "</div>";
            $sql = "SELECT username FROM Users WHERE userID = '".$row["userID"]."'";
            $commentUsername = $conn->query($sql)->fetch_assoc()["username"];
            echo "<div class='row'>";
            echo "<div class='column'>".$commentUsername."</div>";
            $date = date_create($row["lastUpdated"]);
            echo "<div class='column'>".date_format($date,"m/d/Y g:i a")."</div>";
            if(isset($userID) && $userID == $row["userID"])
            {
                include 'deletecomment.inc.php';
            }
            echo "</div>";
            echo "</li>";
        }
        echo "</ul>";
    }
    else
    {
        echo "<p style='text-align: center'>There are no comments.</p>";
    }
?>