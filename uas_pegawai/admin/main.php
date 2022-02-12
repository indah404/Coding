<?php
session_start();
if (!isset($_SESSION['nama']) || empty($_SESSION['nama'])){
  header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pegawai</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="../config/logout.php">
          <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout
        </a>
      </li>
    </ul>
  </nav>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p></p>
          <button class="btn btn-primary float-right" style="margin-bottom: 10px;margin-top:4px;" data-toggle="modal"
            data-target="#modalAdd">
            Tambah Data
          </button>
          <p></p>
          <table class="table table-bordered" style="font-size:90%;">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Golongan</th>
                <th class="text-center">Gaji</th>
                <th class="text-center">Tunjangan</th>
                <th class="text-center">#</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include '../config/Crud.php';
                  $koneksi = new Crud();
                  $data = $koneksi->getData();
                  $no=1;
                  foreach($data as $dt) {
                ?>
              <tr>
                <td class="text-center">
                  <?php echo $no++?>.
                </td>
                <td>
                  <?php echo $dt['nama']?>
                </td>
                <td>
                  <?php echo $dt['nip']?>
                </td>
                <td class="text-center">
                  <?php echo $dt['golongan']?>
                </td>
                <td class="text-right">
                  <?php echo $dt['gaji'] ?>
                </td>
                <td class="text-right">
                  <?php
                    echo ($dt['gaji']*(10/100));
                    ?>
                </td>
                <td class="text-center">
                  <button data-id="btnupdate" class="btn btn-success btn-sm" title="update" onclick="myFunction('<?php echo $dt['nip']?>')">
                    <i class="fas fa-pencil-alt"></i>
                  </button>

                  <a href="../config/hapus.php?nip=<?php echo $dt['nip'] ?>" class="btn btn-danger btn-sm"
                    title="hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="modalAdd">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Data Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="../config/insert.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-md-12">
                <input type="number" min="1" name="nip" class="form-control" placeholder="nomor induk pegawai">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" name="nama" class="form-control" placeholder="nama pegawai">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <select name="golongan" class="form-control">
                  <option value="1">Golongan 1</option>
                  <option value="2">Golongan 2</option>
                  <option value="3">Golongan 3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalUpdate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="../config/update.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-md-12">
                <input type="number" min="1" id="nip" name="nip" class="form-control" placeholder="nomor induk pegawai" readonly >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="nama pegawai" readonly>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <select id="golongan" name="golongan" class="form-control">
                  <option value="1">Golongan 1</option>
                  <option value="2">Golongan 2</option>
                  <option value="3">Golongan 3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">

  function myFunction(nip) {
    console.log('id', nip);
    $(document).ready(function () {
      $.ajax({

        url: "../config/getdatabynip.php",
        method: "POST",
        data: { "nip": nip },
        async: false,
        success: function (respon) {
          var data = JSON.parse(respon);
          $("#modalUpdate").modal("show");
          $("#nip").val(data[0]['nip']);
          $("#nip").val(data[0]['nip']);
          $("#golongan").val(data[0]['golongan']).change();
        }
      })

    })
   
  }
</script>

</html>