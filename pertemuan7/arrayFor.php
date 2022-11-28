<?php

$nama = ["Ahmad", "Budi", "Chika", "Dhini", "Erwin"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    
    for ($i =0; $i < count($nama); $i++) {
        echo "<li>$nama[$i]</li>";

    }

    ?>
</body>
</html>