<?php
date_default_timezone_set(Asia/Kuala_Lumpur);
$time = date("H");
if ($time >= "6" || $time < "12"){
    echo "<html>";
    echo    '<div style="background-image: url(\'morning.jpg\');">';
        echo "</html>";
}
else if ($time >= "12" || $time <= 18) {
   
    echo "<html>";
    echo    '<div style="background-image: url(\'afternoon.jpg\');">';
        echo "</html>";
}
else {

    echo "<html>";
    echo    '<div style="background-image: url(\'night.jpg\');">';
        echo "</html>";
}
?>
