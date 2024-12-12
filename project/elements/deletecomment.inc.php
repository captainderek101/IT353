<div class="column">
    <form id="delete" action="lineup.php?postID=<?php echo $postID?>" method="POST">
        <input style="display:none" type="text" name="delete" value="<?php echo $row["commentID"]?>" readonly>
        <input type="submit" value="Delete Comment">
    </form>
</div>