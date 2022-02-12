<?php

if(isset($_GET['operation'])) {
  $x = $_GET['kol1'];
  $y = $_GET['kol2'];
  $op = $_GET['operation'];
  

  switch($op){
    case 'tambah' : $hasil = $x  + $y;
        break;
    case 'kurang' : $hasil = $x  - $y;
       break;
    case 'kali' : $hasil = $x  * $y;
      break;
    case 'bagi' : $hasil = $x  / $y;
      break;
  }
}

?>


<!DOCTYPE html>
<html>
  <head>
<title>PHP - Calculator</title>
</head>
<body>
  <form action="<?=$_SERVER['PHP_SELF'] ?>" method="get">
  <!-- Kolom 1 -->
  <div>
<lable for="kol1">Kolom 1</lable>
<input type="number" name="kol1" id="kol1">
</div>

<!-- Kolom 2 -->
<div>
<lable for="kol2">Kolom 2</lable>
<input type="number" name="kol2" id="kol2">
</div>

<!-- Hasil -->
<div>
<lable for="Hasil">Hasil</lable>
<input type="number" id="Hasil" value="<?= $hasil ?> disabled>
</div>

<!-- operation -->

<div>
<input type="submit" value="tambah" name="operation">
<input type="submit" value="kurang" name="operation">
<input type="submit" value="kali" name="operation">
<input type="submit" value="bagi" name="operation">

</div>

</body>
</html>