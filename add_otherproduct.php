<?php
   include_once'db/connect_db.php';
    include_once'inc/userpermission.php';

    if(isset($_POST['add_product'])){

      $product_name    = $_POST['product_name'];
      $g_kyat          = $_POST['g_kyat'];
      $g_pel           = $_POST['g_pel'];
      $g_yway         = $_POST['g_yway'];
      $ayawtwet        = $_POST['ayawtwet'];
      $d_yati          = $_POST['d_yati'];
      $d_karyat        = $_POST['d_karyat'];
      $kyoukpoe        = $_POST['kyoukpoe'];
      $buyingprice     = $_POST['buyingprice'];
      $sellingprice    = $_POST['sellingprice'];
      $buyingdate      = $_POST['buyingdate'];
      $sellingdate     = $_POST['sellingdate'];
            // elseif (strlen($code)>6 || strlen($code)<6) {
            //         echo'<script type="text/javascript">
            //         jQuery(function validation(){
            //         swal("Warning", "Kode Harus 6 Karakter Sesuai Aturan", "warning", {
            //         button: "Continue",
            //             });
            //         });
            //         </script>';
            // }
                            $insert = $pdo->prepare("INSERT INTO tbl_otherproduct(name,g_kyat,g_pel,g_yway,ayawtwet,d_yati,d_karyat,kyoukpoe,buyingprice,sellingprice,buyingdate,sellingdate)
                            values(:name,:g_kyat,:g_pel,:g_yway,:ayawtwet,:d_yati,:d_karyat, :kyoukpoe, :buyingprice, :sellingprice, :buyingdate,:sellingdate)");

                            $insert->bindParam('name', $product_name);
                            $insert->bindParam('g_kyat', $g_kyat);
                            $insert->bindParam('g_pel', $g_pel);
                            $insert->bindParam('g_yway', $g_yway);
                            $insert->bindParam('ayawtwet', $ayawtwet);
                            $insert->bindParam('d_yati', $d_yati);
                            $insert->bindParam('d_karyat', $d_karyat);
                            $insert->bindParam('kyoukpoe', $kyoukpoe);
                            $insert->bindParam('buyingprice', $buyingprice);
                            $insert->bindParam('sellingprice', $sellingprice);
                            $insert->bindParam('buyingdate', $buyingdate);
                            $insert->bindParam('sellingdate', $sellingdate);

                            if($insert->execute()){
                                echo'<script type="text/javascript">
                                        jQuery(function validation(){
                                        swal("Success", "Product Saved Successfully", "success", {
                                        button: "Continue",
                                            });
                                        });
                                        </script>';
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

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
      </h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">ပစ္စည်းအသစ်ထည့်ရန်</h3>
            </div>
            <form action="" method="POST" name="form_product"
                enctype="multipart/form-data" autocomplete="off">
                <div class="box-body">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="">ပစ္စည်းနာမည်</label>
                          <input type="text" class="form-control"
                          name="product_name"  required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ကျပ်</label>
                          <input type="number"  step="1"
                          class="form-control" name="g_kyat"  required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ပဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="g_pel"  required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ရွေး</label>
                          <input type="number"  step="1"
                          class="form-control" name="g_yway"  required>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ကျောက်ဖိုး</label>
                        <input type="number"  step="1"
                        class="form-control" name="kyoukpoe"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန်_ရတီ</label>
                        <input type="number"  step="1"
                        class="form-control" name="d_yati"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန််_ကာရက်</label>
                        <input type="number"  step="1"
                        class="form-control" name="d_karyat" value="<?php echo $k_yway; ?>" required>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                          <label for="">ဝယ်စျေး</label>
                          <input type="number" class="form-control"
                          name="buyingprice"  required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="">ရောင်းစျေးဲ</label>
                        <input type="number" class="form-control"
                        name="sellingprice"  required>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="">အလျော့တွက်</label>
                          <input type="text"  step="1"
                          class="form-control" name="ayawtwet"  required>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                            <label for="">ဝယ်တဲ့ရက်စွဲ</label>
                            <input type="date" class="form-control"
                            name="buyingdate"  required>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="">ရောင်းတဲ့ရက်စွဲ</label>
                          <input type="date" class="form-control"
                          name="sellingdate"  >
                      </div>
                  </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                    name="add_product">အတည်ဖြစ်ဖို့နှိပ်ပါ</button>
                    <a href="otherproduct.php" class="btn btn-warning">ပစ္စည်းစာရင်း</a>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_preview').attr('src', e.target.result)
                .width(250)
                .height(200);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

 <?php
    include_once'inc/footer_all.php';
 ?>
