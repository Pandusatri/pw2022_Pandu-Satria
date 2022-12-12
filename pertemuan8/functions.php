<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;

  $NIM = htmlspecialchars($data["NIM"]);
  $Nama = htmlspecialchars($data["Nama"]);
  $Email = htmlspecialchars($data["Email"]);
  $Jurusan = htmlspecialchars($data["Jurusan"]);

  // uploud gambar
  $Gambar = upload();
  if (!$Gambar) {
    return false;
  }


  $query = "INSERT INTO mahasiswa VALUES ('', '$NIM', '$Nama', 'Email', 'Jurusan', 'Gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namafile = $_FILES['Gambar']['Nama'];
  $ukuranfile = $_FILES['Gambar']['size'];
  $error = $_FILES['Gambar']['error'];
  $tmpName = $_FILES['Gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
    alert('pilih gambar terlebih dahulu');
    </script>";
    return false;
  }

  // cek apakahyang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namafile);
  $ekstensiGambar = strtolower(end($ekstensiGambarValid));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
  alert('yang anda upload bukan gambar');
  </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranfile > 1000000) {
    echo "<script>
  alert('ukuran terlalu besar!');
  </script>";
    return false;

    // gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFile;
  }
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;
  $id = $data["id"];
  $NIM = htmlspecialchars($data["NIM"]);
  $Nama = htmlspecialchars($data["Nama"]);
  $Email = htmlspecialchars($data["Email"]);
  $Jurusan = htmlspecialchars($data["Jurusan"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['Gambar']['error'] === 4) {
    $Gambar = $gambarLama;
  } else {
    $Gambar = upload();
  }


  $query = "UPDATE mahasiswa SET 
  NIM = '$NIM',
  Nama = '$Nama',
  Email = '$Email',
  Jurusan = '$Jurusan',
  Gambar = '$Gambar', 
  WHERE id = $id
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $query = "SELECT * FROM phpdasar WHERE 
  nama LIKE '$keyword%' OR 
  NIM LIKE '$keyword%' OR 
  Email LIKE '$keyword%' OR
  Jurusan LIKE '$keyword%'
  ";
  return query($query);
}

?>