<html>
<body>
<?php
    $username=$_GET["username"];
    $pswd=$_GET["pswd"];
    $email=$_GET["email"];
    $bd=$_GET["bd"];
    $name=$_GET["name"];
    $tac=$_GET["tac"];
    $promo=$_GET["promo"];

    if (strlen($username) > 15)
    {
        echo "The choosen username is too long.\nmax15 characters";
        return;
    }
    if (!preg_match("#^[a-zA-Z0-9]+$#", $username))
    {
        echo "The choosen username contains forbidden characters";
       return; 
    }

    if(strlen($pswd) < 4)
    {
        echo "Password too short. Min 4 characters";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid email format";
        return;
    }
    
    $bdws = explode("/", $bd);
    $age = (date("md", date("U", mktime(0, 0, 0, $bdws[0], $bdws[1], $bdws[2]))) > date("md")
    ? ((date("Y") - $bdws[2]) - 1)
    : (date("Y") - $bdws[2]));
    
    if ($age < 18)
    {
        echo "You are too young to place an order";
        return;
    }

    if (strlen($name) > 50)
    {
        echo "Your name is too long";
        return;
    }
    if (strcmp($tac, "yes") == 0)
        $tac = "accepted";
    else
        $tac = "refused";
    
    if (strcmp($promo, "yes") == 0)
        $promo = "accepted";
    else
        $promo = "refused";

    echo "Welcome to APU-store.com";
    echo "Your username is $username";
    echo "Your password is secret";
    echo "Your email address is $email";
    echo "Your birth of date is the $bd";
    echo "Your name is $name";
    echo "You have $tac the terms and conditions";
    echo "You have $promo to receive promotion emails";
    echo "Thank you for being one of us!"
?>
