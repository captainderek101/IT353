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
    <input type="submit" value="Log Out">
    <input style="display:none" type="text" name="logout" value="true" readonly>
</form>
</div>