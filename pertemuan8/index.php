<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Admin</title>
</head>

<body>

  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah data Mahasiswa</a>
  <br><br>

  <form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian...." autocomplete="off">
    <button type="submit" name="cari">Cari</button>

  </form>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>jurusan</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $row) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> |
          <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
        </td>
        <td><img src="img/<?php echo $row["Gambar"]; ?>" width="50"></td>
        <td><?= $row["NIM"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["Email"]; ?></td>
        <td><?= $row["Jurusan"]; ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>


  </table>

</body>

</html>