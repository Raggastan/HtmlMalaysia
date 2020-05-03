<?php
include("conn.php");

$sql="INSERT INTO users (user_name, user_password, user_email)
    
    VALUES
    
    ('$_POST[username]', '$_POST[password]', '$_POST[email]')";

if (!mysqli_query($con,$sql))
{
    die('Error'.mysqli_error($con));
}

echo '<script>alert("You have been registered!"):
    window.location.href = "view.php"</script>';

mysqli_close($con);
?>
