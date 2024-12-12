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
        <form id="typical" action="" method="GET">
            <label for='searchInput'>Search by title:</label>
            <input type="text" id="searchInput" onkeyup="applySearchQuery()" placeholder="Enter query">
            <?php
                include 'elements/filters.inc.php';
            ?>
        </form>
        <!-- List of results -->
        <div id='results'>
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
        ?>
        </div>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
    <script>
        $(document).ready(function () {
            getResults();
        });
        function getResults() {
            $("#results").load("elements/searchresults.inc.php", 
            { 
                "map": document.getElementById("map").value, 
                "grenade": document.getElementById("grenade").value,
                "sortBy": document.getElementById("sortBy").value
            });
        }
        function applySearchQuery() {
        $(document).ready(function () {
            // Declare variables
            var input, filter, li, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            li = $('#results li');

            // Loop through all list items, and hide those who don't match the search query
            var showing = 0;
            for (i = 0; i < li.length; i++) {
                txtValue = $(li[i]).attr('id');
                if (txtValue && txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                    showing++;
                } else {
                    li[i].style.display = "none";
                }
            }
            // if(showing == 0) {
            //     $("#noResults").css("display", "block");
            // }
            // else {
            //     $("#noResults").css("display", "none");
            // }
        });
        }
    </script>
</html>