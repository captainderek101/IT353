<!DOCTYPE html>
<html>
    <head>
        <title>CS2 Lineups - Create Post</title>
        <?php
            include 'elements/head.inc.php';
        ?>
    </head>
    <body>
        <h1>Create Post</h1>
        <?php
            include 'elements/php/connect.inc.php';
        ?>
        <?php
            include 'elements/navbar.inc.php';
        ?>

        <?php
        function generateRandomString($length = 10) {
            return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $map = $_POST["map"];
            $grenade = $_POST["grenade"];
            $picture = $_FILES["picture"]["name"];
            $title = $_POST["title"];
            $description = $_POST["description"];

            if($map == "none" || $grenade == "none" || $title == "")
            {
                echo "<h2 id='error'> Must provide a map, grenade type, and title! </h2>";
            }
            else
            {
                $sql = "SELECT mapID FROM Maps WHERE name = '$map'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $mapID = $row["mapID"];
                
                $sql = "SELECT grenadeID FROM Grenades WHERE name = '$grenade'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $grenadeID = $row["grenadeID"];
    
                if(!isset($picture))
                {
                    $pictureID = NULL;
                }
                else
                {
                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $explode = explode(".", $_FILES["picture"]["name"]);
                    $extension = end($explode);
                    if(in_array($extension, $allowedExts) === FALSE)
                    {
                        //FAIL
                        $pictureID = NULL;
                    }
                    else
                    {
                        define ('SITE_ROOT', realpath(dirname(__FILE__)));
                        $tmp_name = $_FILES["picture"]["tmp_name"];
                        $name = "/pictures/".generateRandomString().".$extension";//basename($_FILES["picture"]["type"]);
                        if(move_uploaded_file($tmp_name, SITE_ROOT.$name))
                        {
                            echo "<p>Image stored in $name</p>";
                            $sql = "INSERT INTO Pictures (file) VALUES ('$name')";
                            $result = $conn->query($sql);
                        }
                        if($_FILES["picture"]["error"] == 0)
                        {
                            $sql = "SELECT pictureID FROM Pictures WHERE file = '$name'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $pictureID = $row["pictureID"];
                        }
                        else
                        {
                            echo "<p>File upload failed with code ".$_FILES["picture"]["error"].".</p>";
                            $pictureID = NULL;
                        }
                    }
                }
    
                $sql = "INSERT INTO Posts (userID, mapID, grenadeID, title, description, pictureID) VALUES ('$userID', '$mapID', '$grenadeID', '$title', '$description', '$pictureID')";
                $result = $conn->query($sql);
                if($result === TRUE)
                {
                    // header('Location: index.php');
                    // die();
                }
                else
                {
                    echo "<h2> Post failed to be created. </h2>";
                }
            }
        }
        ?>
        
        <form id="typical" action="compose.php" method="POST" enctype="multipart/form-data">
            <?php
                if (!isset($_SESSION['userID']))
                {
                    echo "<h2>Log in to make a post!!</h2>";
                }
                else
                {
                    $username = $_SESSION['user'];
                    echo "<h2>Posting as $username</h2>";
                }
            ?>
            <p>
                <label class="required" for="map">Map: </label>
                <?php
                    include 'elements/dropdowns/maps.options.inc.html';
                ?>
            </p>
            <p>
                <label class="required" for="grenade">Grenade: </label>
                <?php
                    include 'elements/dropdowns/grenades.options.inc.html';
                ?>
            </p>
            <p>
                <!-- MAX_FILE_SIZE must precede the file input field -->
                <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
                <label for="picture">Picture: </label>
                <input type="file" id="picture" name="picture">
            </p>
            <p>
                <label class="required" for="title">Title: </label>
                <input required type="text" id="title" name="title" placeholder="Enter title" maxlength="64">
            </p>
            <p>
                <label for="comment">Description: </label>
                <textarea id="comment" name="description" placeholder="Enter description" maxlength="512"></textarea>
            </p>
            <p>
                <?php
                    if (isset($_SESSION['userID']))
                    {
                        echo "<input type='submit' value='Create post'>";
                    }
                ?>
                
            </p>
        </form>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>