<html>
<body>
<?php
$unit=$_GET["source"];
$value=$_GET["temperature"];
$origin=$value;
    if(strcmp($source, "celsius") == 0)
    {
        $value *= 9;
        $value /= 5;
        $value +=32;
        echo "$origin fahrenheit is equivalent to $value centigrad";
    }
    else {
        $value -= 32;
        $value *= 5;
        $value /= 9;
        echo "$origin centigrad is equivalent to $value fahrenheit";
    }

?>
