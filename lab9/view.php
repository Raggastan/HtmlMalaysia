<?php 
include ("conn.php");
include("session.php");

$result = mysqli_query($con,"SELECT * FROM contacts WHERE user_id=$user_id");
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
<title>view.php</title>
</head>
<body>
<table width="90%">
  <tr bgcolor="#CC99FF">
    <td>Name</td>
    <td>Phone number</td>
    <td>Email</td>
    <td>Address</td>
    <td>Gender</td>
    <td>Relationship</td>
    <td>DOB</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>

  <?php
  while($row = mysqli_fetch_array($result))
  {
    echo"<tr bgcolor=\"#99FF66\">";

    echo"<td>";
    echo $row['contact_name'];
    echo"</td>";

    echo"<td>";
    echo $row['contact_phone'];
    echo"</td>";

    echo"<td>";
    echo "<a href=\"mailto:" .$row['contact_email']."\">".$row['contact_email']."</a>";
    echo"</td>";

    echo"<td>";
    echo $row['contact_address'];
    echo"</td>";

    echo"<td>";
    echo $row['contact_gender'];
    echo"</td>";

    echo"<td>";
    echo $row['contact_relationship'];
    echo"</td>";

    echo"<td>";
    echo $row['contact_dob'];
    echo"</td>";

    echo"<td><a href=\"edit.php?id=";
    echo $row['id'];
    echo "\">Edit</a></td>";

    echo"<td><a href=\"delete.php?id=";
    echo $row['id'];
    echo"\"onClick=\"return confirm('Delete";
    echo $row['contact_name'];
    echo "details?);\"Delete</a></td></tr>";
    }
    mysqli_close($con);
     ?>
   </table>
