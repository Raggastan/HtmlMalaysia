<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="new_view.css"/>
    <title></title>
  </head>
  <body>
    <?php
      include("conn.php");
      $result = mysqli_query($con,"SELECT * FROM contacts");
    ?>
    <a href="default.php">Add</a> New Contact<br><br>
    <form method="post">
      <label for="search">Search:</label>
      <input type="text" name="search" required="required"><br><br>
      <input type="submit" value="Search">
    </form><br>
      <table id = "search" width="100%">
      <pre>
        <?php
          if (isset($_POST['search'])) {
            $name = $_POST['search'];
            $result_search = mysqli_query($con,"SELECT * FROM contacts WHERE contact_name = '$name'");
            $cpt = 0;
            if(!$result_search){
              echo "No record found";
            }else {
              $nb_row=mysqli_num_rows($result_search);
              echo $nb_row." record(s) find.";
            }
            while($row = mysqli_fetch_array($result_search)){
              echo "<td>";
              if($row['contact_gender'] == "Male"){
                echo '<img src="man.png" width="100px">';
              }else {
                echo '<img src="woman.png" width="100px">';
              }
              echo "<h2>";
              echo $row['contact_name'];
              echo "</h2>";
              echo "phone number : </br>";
              echo $row['contact_phone'];

              echo "</br></br>Email :</br>";
              echo "<a href=\"mailto:" .$row['contact_email']. "\">".$row['contact_email']."</a>";

              echo "</br></br>Home address :</br>";
              echo $row['contact_address'];

              echo "</br></br>Relationship :</br>";
              echo $row['contact_relationship'];

              echo "</br></br>Date of Birth :</br>";
              echo $row['contact_dob'];

              echo "</br></br><a href=\"edit.php?id=";
              echo $row['id'];
              echo "\">Edit </a>&nbsp&nbsp ";

              echo "<a href=\"delete.php?id=";
              echo $row['id'];
              echo "\" onClick=\"return confirm('Delete ";
              echo $row['contact_name'];
              echo "details?');\">Delete</a>";

              echo "</td>";
              $cpt = $cpt + 1;
              if($cpt%3 == 0){
                echo "</tr>";
              }
            }
          }
         ?>
      </pre>
       </table>
    <table id="all" width="100%">

    <?php
      $cpt = 0;
      while($row = mysqli_fetch_array($result)){
        echo "<td>";
        if($row['contact_gender'] == "Male"){
          echo '<img src="man.png" width="100px">';
        }else {
          echo '<img src="woman.png" width="100px">';
        }
        echo "<h2>";
        echo $row['contact_name'];
        echo "</h2>";
        echo "phone number : </br>";
        echo $row['contact_phone'];

        echo "</br></br>Email :</br>";
        echo "<a href=\"mailto:" .$row['contact_email']. "\">".$row['contact_email']."</a>";

        echo "</br></br>Home address :</br>";
        echo $row['contact_address'];

        echo "</br></br>Relationship :</br>";
        echo $row['contact_relationship'];

        echo "</br></br>Date of Birth :</br>";
        echo $row['contact_dob'];

        echo "</br></br><a href=\"edit.php?id=";
        echo $row['id'];
        echo "\">Edit </a>&nbsp&nbsp ";

        echo "<a href=\"delete.php?id=";
        echo $row['id'];
        echo "\" onClick=\"return confirm('Delete ";
        echo $row['contact_name'];
        echo "details?');\">Delete</a>";

        echo "</td>";
        $cpt = $cpt + 1;
        if($cpt%3 == 0){
          echo "</tr>";
        }
      }
      mysqli_close($con);
     ?>
  </body>
</html>
