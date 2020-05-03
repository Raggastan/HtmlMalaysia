session_start();
if (!isset($_SESSION['mySession'])) // to check if session is set
{
echo '<script>alert("Please Login!");window.location.href="login.php";</script>';
}
else {
$user_id = $_SESSION['user_id']; // to assign session value to a variable, so it can be used throughout the pages
}
