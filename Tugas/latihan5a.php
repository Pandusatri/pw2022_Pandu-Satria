<?php
if (isset($_GET["Angka"])) {
  $angka = $_GET["Angka"];
  for ($i = $angka; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
      echo $j . " ";
    }
    echo "<br />";
  }
}