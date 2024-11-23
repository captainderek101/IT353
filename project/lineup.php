<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Insert Title Here</title>
    </head>
    <body>
        <h1>Lineup</h1>
        <?php
            include 'elements/navbar.inc.html';
        ?>
        <!-- TODO: "Go back" button -->
        <!-- TODO: Upvote/downvote with score -->
        <!-- TODO: Post title and description -->
        <h2>Sample Lineup</h2>
        <p>Sample Description</p>
        <!-- TODO: Location on map -->
        <!-- TODO: Lineup screenshot -->
        <!-- TODO: username and time submitted (local) -->
        <p>radchad1     11/23/24 5:00 PM</p>
        <!-- TODO: Report post button -->
        <!-- TODO: options for poster & admins (edit post, delete post?) -->
        <br>

        <h2>Comments:</h2>
        <?php
            include 'elements/dropdowns/sorting.options.inc.html';
        ?>
        <h3>Comment as [username]:</h3>
        <form action="lineup.php" method="POST">
            <p>
                <input type="text" id="comment" name="comment" placeholder="Write comment here">
            </p>
            <p>
                <input type="submit" value="Post comment">
            </p>
        </form>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>