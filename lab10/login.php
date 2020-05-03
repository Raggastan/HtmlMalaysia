<!doctype html>
session_start();
<html>
    <header>
        <title>Login</title>
    </header>
    <body>
<h2>Login</h2>

    <form method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
    </form>
    Not a member ? Register <a href="register.html">here</a>
    </body>


<?php
include("conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // username and password sent from Form
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $sql="SELECT id FROM admin WHERE username='$username' andpassword='$password'";

    if ($result=mysqli_query($con,$sql))
    {
        $rowcount=mysqli_num_rows($result); // Return the number of rows in result set
        while($row = mysqli_fetch_array($result)) // Fetch the data row
        {
            $user_id = $row['id']; // Fetch the data row
        }
        if($rowcount==1)
        {
            $_SESSION['mySession']=$username; // session creation
            $_SESSION['user_id'] = $user_id; // session creation
            header("location: view.php");
        }
        else
        {
            $error=printf("Your Login Name or Password is invalid. Please re login<br/><br/>");
        }
    }
    mysqli_close($con);
}
?>
</html>
