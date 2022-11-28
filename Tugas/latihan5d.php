<!DOCTYPE html>

<head>
  <title>Document</title>
</head>

<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    masukan angka: <input type="text" name="fname">
    <input type="submit" value="tampilkan">
  </form>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    for ($i = $name; $i >= 1; $i--) {
      for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
      }
      echo "<br />";
    }
  }
  ?>
  </div>

</body>

</html>