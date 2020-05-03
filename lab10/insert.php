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


// To set the folder, file name and file type
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["contact_pic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["contact_pic"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" &&
  $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["contact_pic"]["tmp_name"],
    $target_file)) {
    echo "The file ". basename( $_FILES["contact_pic"]["name"]).
      " has been uploaded.";
    //To store the file name & file title into the database
    include("conn.php");
    //To get file name
    $file_name = basename( $_FILES["contact_pic"]["name"]);
    $sql="<< SQL INSERT QUERY HERE >>";
    if (!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
    echo '<script>alert("1 record added!");
    window.location.href = "view.php";
</script>';
} else {
echo "Sorry, there was an error uploading your file.";
}
}



mysqli_close($con);
?>
