<?php
    include_once'misc/plugin.php';
    include_once'db/connect_db.php';
    session_start();
    if($_SESSION['role']!=="admin"){
    header('location:index.php');
    }

    if($id=$_GET['id']){
    $select = $pdo->prepare("SELECT * FROM tbl_otherproduct WHERE product_id=$id");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    $product_name_db    = $row['name'];
    $g_kyat_db          = $row['g_kyat'];
    $g_pel_db           = $row['g_pel'];
    $g_yway_db          = $row['g_yway'];
    $ayawtwet_db        = $row['ayawtwet'];
    $d_yati_db          = $row['d_yati'];
    $d_karyat_db        = $row['d_karyat'];
    $kyoukpoe_db        = $row['kyoukpoe'];
    $buyingprice_db     = $row['buyingprice'];
    $sellingprice_db    = $row['sellingprice'];
    $buyingdate_db      = $row['buyingdate'];
    $sellingdate_db     = $row['sellingdate'];
    }else{
    header('location:product.php');
    }

    if(isset($_POST['update_product'])){
      $product_name    = $_POST['product_name'];
      $g_kyat          = $_POST['g_kyat'];
      $g_pel           = $_POST['g_pel'];
      $g_yway          = $_POST['g_yway'];
      $ayawtwet        = $_POST['ayawtwet'];
      $d_yati          = $_POST['d_yati'];
      $d_karyat        = $_POST['d_karyat'];
      $kyoukpoe        = $_POST['kyoukpoe'];
      $buyingprice     = $_POST['buyingprice'];
      $sellingprice    = $_POST['sellingprice'];
      $buyingdate      = $_POST['buyingdate'];
      $sellingdate     = $_POST['sellingdate'];
            // else{
                $update = $pdo->prepare("UPDATE tbl_otherproduct SET name=:name,g_kyat=:g_kyat,
                g_pel=:g_pel, g_yway=:g_yway, ayawtwet=:ayawtwet,d_yati=:d_yati,d_karyat=:d_karyat, kyoukpoe=:kyoukpoe,
                buyingprice=:buyingprice, sellingprice=:sellingprice, buyingdate=:buyingdate, sellingdate=:sellingdate WHERE product_id=$id");

                $update->bindParam('name', $product_name);
                $update->bindParam('g_kyat', $g_kyat);
                $update->bindParam('g_pel', $g_pel);
                $update->bindParam('g_yway', $g_yway);
                $update->bindParam('ayawtwet', $ayawtwet);
                $update->bindParam('d_yati', $d_yati);
                $update->bindParam('d_karyat', $d_karyat);
                $update->bindParam('kyoukpoe', $kyoukpoe);
                $update->bindParam('buyingprice', $buyingprice);
                $update->bindParam('sellingprice', $sellingprice);
                $update->bindParam('buyingdate', $buyingdate);
                $update->bindParam('sellingdate', $sellingdate);


                if($update->execute()){
                    header('location:otherproduct.php');
                }else{
                    echo '<script type="text/javascript">
                        jQuery(function validation(){
                        swal("Error", "There is an error", "error", {
                        button: "Continue",
                            });
                        });
                        </script>';
                }
          }


    include_once'inc/header_all.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">ပြင်ရန်</h3>
            </div>
            <form action="" method="POST" name="form_product"
                enctype="multipart/form-data" autocomplete="off">
                <div class="box-body">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="">ပစ္စည်းနာမည်</label>
                          <input type="text" class="form-control"
                          name="product_name" value="<?php echo $product_name_db; ?>"  required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ကျပ်</label>
                          <input type="number"  step="1"
                          class="form-control" name="g_kyat" value="<?php echo $g_kyat_db; ?>"  required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ပဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="g_pel" value="<?php echo $g_pel_db; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ရွေး</label>
                          <input type="number"  step="1"
                          class="form-control" name="g_yway" value="<?php echo $g_yway_db; ?>" required>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ကျောက်ဖိုး</label>
                        <input type="number"  step="1"
                        class="form-control" name="kyoukpoe" value="<?php echo $kyoukpoe_db; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန်_ရတီ</label>
                        <input type="number"  step="1"
                        class="form-control" name="d_yati" value="<?php echo $d_yati_db; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန််_ကာရက်</label>
                        <input type="number"  step="1"
                        class="form-control" name="d_karyat" value="<?php echo $d_karyat_db; ?>" required>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                          <label for="">ဝယ်စျေး</label>
                          <input type="number" class="form-control"
                          name="buyingprice" value="<?php echo $buyingprice_db; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="">ရောင်းစျေးဲ</label>
                        <input type="number" class="form-control"
                        name="sellingprice" value="<?php echo $sellingprice_db; ?>" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="">အလျော့တွက်</label>
                          <input type="text"  step="1"
                          class="form-control" name="ayawtwet" value="<?php echo $ayawtwet_db; ?>"  required>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                            <label for="">ဝယ်တဲ့ရက်စွဲ</label>
                            <input type="date" class="form-control"
                            name="buyingdate" value="<?php echo $buyingdate_db; ?>" required>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="">ရောင်းတဲ့ရက်စွဲ</label>
                          <input type="date" class="form-control"
                          name="sellingdate"  value="<?php echo $sellingdate_db; ?>">
                      </div>
                  </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                    name="update_product">ပြင်တာ အတည်ဖြစ်ဖို့နှိပ်ပါ</button>
                    <a href="otherproduct.php" class="btn btn-warning">နောက်သို့</a>
                </div>
            </form>

        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
    include_once'inc/footer_all.php';
 ?>
