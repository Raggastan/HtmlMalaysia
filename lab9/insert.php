<?php
include("conn.php");
include("session.php");

$sql="INSERT INTO contacts (contacts_name, contact_phone, contact_email,email_address,contact_gender,contact_relationship,contact_dob, user_id)

VALUES

('$_POST[name]','$_POST[phone_num]','$_POST[email_address]','$_POST[home_address]','$_POST[gender]','$_POST[relationship]','$_POST[dob]',$user_id)";

if (!mysqli_query($con,$sql))
{
    die('Error'.mysqli_error($con));
}

echo '<script>alert("1 record added!"):
    window.location.href = "view.php"</script>';

mysqli_close($con);
?>
