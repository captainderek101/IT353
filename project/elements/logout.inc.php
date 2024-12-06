<div>
<?php
    if(isset($_POST['logout']))
    {
        session_unset();
        header('Location: index.php');
        die();
    }
?>
<form id="logout" action="" method="POST">
    <input style="display:none" type="text" name="logout" value="true" readonly>
    <input type="submit" value="Log Out">
</form>
</div>