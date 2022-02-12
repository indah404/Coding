<?php
    //Memuat Coneksi
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $conn = new mysqli($servername, $username, $password);
    
    // Periksa connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //Seleksi Database
    $database = mysqli_select_db($conn, 'utspbw');

    // Kondisi ketika form telah di submit
    // dan mengurangi kuantitas
    if (isset($_POST['submit'])) {

        if ($_POST['kuantitas'] <= 0) {
            echo 'Produk tidak ada.';
        }else{
            $hasil = $_POST['kuantitas'] - 1;

            $sql = "UPDATE barang set kuantitas = '".$hasil."' where id = '".$_POST['id'] ."'";
    
            if ($conn->query($sql) === TRUE) {
                echo "Terima kasih, Barang telah kami kirim ke alamat anda.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Memuat Data
    $select_barang = "select * from barang";
    $var_barang = mysqli_query($conn, $select_barang);

    $res_barang = [];

    while ($row_barang = mysqli_fetch_assoc($var_barang)) {
        $res_barang[] = $row_barang;
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Toko Online</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/util.js"></script>
    
  </head>
  <body>
      
    <div class="container cta-100">
      <div class="container">
        <div class="row blog">
          <div class="col-md-12">
            <div >
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div>
                  <div class="row">
                    <?php foreach ($res_barang as $value) { ?>
                    
                    <div class="col-md-4">
                      <div class="item-box-blog">
                        <div class="item-box-blog-image">
                          <!--Date-->
                          <div class="item-box-blog-date bg-blue-ui white">
                            <span class="mon">Baru</span>
                          </div>
                          <!--Image-->
                          <figure>
                            <img
                              alt=""
                              src="./images/<?php echo $value['nama_img']; ?>"
                            />
                          </figure>
                        </div>
                        <div class="item-box-blog-body">
                          <!--Heading-->
                          <div class="item-box-blog-heading">
                            <a href="#" tabindex="0">
                              <h5><?php echo $value['nama_barang']; ?></h5>
                            </a>
                          </div>
                          <!--Data-->
                          <div
                            class="item-box-blog-data"
                            style="padding: px 15px"
                          >
                            <p>
                              <i class="fa fa-user-o"></i> Kuantitas :
                              <i class="fa fa-comments-o"></i> <?php echo $value['kuantitas']; ?>
                            </p>
                          </div>
                          <!--Text-->
                          <div class="item-box-blog-text">
                            <p>
                              Lorem ipsum dolor sit amet, adipiscing. Lorem
                              ipsum dolor sit amet, consectetuer adipiscing.
                              Lorem ipsum dolor sit amet, adipiscing. Lorem
                              ipsum dolor sit amet, adipiscing. Lorem ipsum
                              dolor sit amet, consectetuer adipiscing. Lorem
                              ipsum dolor.
                            </p>
                          </div>
                          <div class="mt">
                            <form action="" method="POST">
                                <input class="btn bg-blue-ui white read" name="submit" type="submit" value="Submit">
                                <input type="text" id="id" name="id" value="<?php echo $value['id']; ?>" hidden/>
                                <input type="text" id="kuantitas" name="kuantitas" value="<?php echo $value['kuantitas']; ?>" hidden />
                            </form>
                          </div>
                          <!--Read More Button-->
                        </div>
                      </div>
                    </div>

                    <?php } ?>
                  </div>
                  <!--.row-->
                </div>
              </div>
              <!--.carousel-inner-->
            </div>
            <!--.Carousel-->
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
