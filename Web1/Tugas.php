<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.Span{color: #FF0000; text-weight: 900;}
</style>
</head>
<body>  

<?php
$namaErr = $nimErr = $emailErr =  "";
$nama = $nim = $email = $gender = $alamat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nama"])) {
    $namaErr = "Nama wajib di isi";
  } else {
    $nama = test_input($_POST["nama"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
      $namaErr = "Hanya diperbolehkan huruf dan spasi";
    }
  }
  
  if (empty($_POST["nim"])) {
    $nimErr = "NIM wajib di isi";
  } else {
    $nim = test_input($_POST["nim"]);
    if (!preg_match("/^[0-9]*$/",$nim)) {
        $nimErr = "Hanya dapat di isi angka";
      }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email wajib di isi";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "format email salah";
    }
  }

  if (empty($_POST["alamat"])) {
    $alamat = "";
  } else {
    $alamat = test_input($_POST["alamat"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Tugas PHP Form Validation</h2>
<p><span class="Span">NOTE: </span>Jika format nama, nim, dan email tidak sesuai maka output tidak keluar</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nama: <input type="text" name="nama" value="<?php echo $nama;?>">
  <span class="error">* <?php echo $namaErr;?></span>
  <br><br>
  NIM: <input type="text" name="nim" value="<?php echo $nim;?>">
  <span class="error"><?php echo $nimErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Alamat: <textarea name="alamat" rows="3" cols="40"><?php echo $alamat;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Default Hasil : </h2>";
echo "<h4>ILHAM HATTA MANGGALA</h4>";
echo "<h4>22090069</h4>";
echo "<h2>Hasil Inputan : </h2>";
if(empty($namaErr)) {
    echo "Nama : $nama";
    echo "<br><br>";
}
if(empty($nimErr)) {
    echo "Nim : $nim";
    echo "<br><br>";
}
if(empty($emailErr)) {
    echo "Email : $email";
    echo "<br><br>";
}
echo "Alamat : $alamat";
?>

</body>
</html>