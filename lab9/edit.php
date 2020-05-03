<?php
include("conn.php");
include("session.php");

$id = intval($_GET['id']); //intval — Get the integer value of a variable
$result = mysqli_query($con,"DELETE FROM contacts WHERE id=$id AND user_id=$user_id");
while($row = mysqli_fetch_array($result))
{
?>
<form action="update.php" method="post">

<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
<input type="hidden" name="name" value="<?php echo $row['contact_name'] ?>">
<input type="hidden" name="phone" value="<?php echo $row['contact_phone'] ?>">
<input type="hidden" name="email" value="<?php echo $row['contact_email'] ?>">
<input type="hidden" name="dob" value="<?php echo $row['contact_dob'] ?>"
<input type="radio" name="gender"
<?php if ($row['contact_gender'] == "Male") { ?>
checked="checked"
<?php } ?>value="Male" required="required" >
<option value="Family" <?php if ($row['contact_relationship'] == "Family") { ?>
selected="selected"
<?php } ?>>Family</option>
</form>
<?php
}
mysqli_close($con);
?>
