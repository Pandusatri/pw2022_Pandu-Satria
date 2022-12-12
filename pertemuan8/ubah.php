<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// querydata mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil di ubah atau tidak
  if (ubah($_POST) > 0) {
    echo "
         <script> 
         alert('data berhasil diubah');
         document.location.href = 'index.php';
         </script> 
    ";
  } else {
    echo "
         <script> 
         alert('data berhasil diubah');
         document.location.href = 'index.php';
         </script> 
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Ubah data Mahasiswa</title>
</head>

<body>
  <h1>Ubah data Mahasiswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
    <ul>
      <li>
        <label for="NIM">NIM : </label>
        <input type="text" name="NIM" id="NIM" value="<?= $mhs["NIM"]; ?>">
      </li>
      <li>
        <label for="Nama">Nama : </label>
        <input type="text" name="Nama" id="Nama" value="<?= $mhs["Nama"]; ?>">
      </li>
      <li>
        <label for=" Email">Email :</label>
        <input type="text" name="Email" id="Email" value="<?= $mhs["Email"]; ?>">
      </li>
      <li>
        <label for=" Jurusan">Jurusan : </label>
        <input type="text" name="Jurusan" id="Jurusan" value="<?= $mhs["Jurusan"]; ?>">
      </li>
      <li>
        <label for="img/">Gambar : </label> <br>
        <img src="img/ <?= $mhs['Gambar']; ?>" width="40"> <br>
        <input type="file" name="Gambar" id="Gambar">
      </li>
      <li>
        <button type=" submit" name="submit">Ubah Data!</button>
      </li>
    </ul>



  </form>

</body>

</html>