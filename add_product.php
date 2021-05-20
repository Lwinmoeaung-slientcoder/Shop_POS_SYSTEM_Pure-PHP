<?php
   include_once'db/connect_db.php';
  include_once'inc/userpermission.php';

    if(isset($_POST['add_product'])){

      $product_name    = $_POST['product_name'];
      $gold_quality    = $_POST['gold_quality'];
      $shopname        = $_POST['shopname'];
      $p_kyat_update   = $_POST['p_kyat'];
      $p_pel_update    = $_POST['p_pel'];
      $p_yway_update   = $_POST['p_yway'];
      $p_ayaw_update   = $_POST['p_ayaw'];
      $buydate_update  = $_POST['buydate'];
      $selldate_update = $_POST['selldate'];
      $k_price_update  = $_POST['k_price'];
      $k_kyat_update   = $_POST['k_kyat'];
      $k_pel_update    = $_POST['k_pel'];
      $k_yway_update   = $_POST['k_yway'];

            // elseif (strlen($code)>6 || strlen($code)<6) {
            //         echo'<script type="text/javascript">
            //         jQuery(function validation(){
            //         swal("Warning", "Kode Harus 6 Karakter Sesuai Aturan", "warning", {
            //         button: "Continue",
            //             });
            //         });
            //         </script>';
            // }
                            $insert = $pdo->prepare("INSERT INTO tbl_product(Name,GoldQuality,ShopName,kyat,pel,yway,ayaw,k_price,k_kyat,k_pel,k_yway,BuyingDate,SellingDate)
                            values(:Name,:GoldQuality,:ShopName,:kyat,:pel,:yway,:ayaw, :k_price, :k_kyat, :k_pel, :k_yway,:BuyingDate,:SellingDate)");

                            $insert->bindParam('Name', $product_name);
                            $insert->bindParam('GoldQuality', $gold_quality);
                            $insert->bindParam('ShopName', $shopname);
                            $insert->bindParam('kyat', $p_kyat_update);
                            $insert->bindParam('pel', $p_pel_update);
                            $insert->bindParam('yway', $p_yway_update);
                            $insert->bindParam('ayaw', $p_ayaw_update);
                            $insert->bindParam('k_price', $k_price_update);
                            $insert->bindParam('k_kyat', $k_kyat_update);
                            $insert->bindParam('k_pel', $k_pel_update);
                            $insert->bindParam('k_yway', $k_yway_update);
                            $insert->bindParam('BuyingDate', $buydate_update);
                            $insert->bindParam('SellingDate', $selldate_update);

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
                          <label for="">ရွှေအရည်</label>
                          <select class="form-control" name="gold_quality" required>
                              <?php
                              $select = $pdo->prepare("SELECT * FROM tbl_category");
                              $select->execute();
                              while($row = $select->fetch(PDO::FETCH_ASSOC)){
                                  extract($row)
                              ?>
                                  <option><?php echo $row['cat_name']; ?></option>
                              <?php
                              }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="">ဆိုင်နာမည်</label>
                          <input type="text" class="form-control"
                          name="shopname"  required>
                      </div>
                      <!-- <div class="form-group">
                          <label for="">Capital Price</label>
                          <input type="number" min="1000" step="100"
                          class="form-control"
                          name="purchase_price" value="" required>
                      </div> -->
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ရွှေချိန်_ကျပ်</label>
                        <input type="number"  step="1"
                        class="form-control" name="p_kyat"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ရွှေချိန်_ပဲ</label>
                        <input type="number"  step="1"
                        class="form-control" name="p_pel"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ရွှေချိန်_ရွေး</label>
                        <input type="text"  step="1"
                        class="form-control" name="p_yway"  required>
                    </div>
                      <div class="form-group">
                          <label for="">အလျော့တွက်</label>
                          <input type="text"  step="1"
                          class="form-control" name="p_ayaw"  required>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                            <label for="">ဝယ်တဲ့ရက်စွဲ</label>
                            <input type="date" class="form-control"
                            name="buydate"  required>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="">ရောင်းတဲ့ရက်စွဲ</label>
                          <input type="date" class="form-control"
                          name="selldate"  >
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ကျောက်ဖိုး</label>
                        <input type="number"  step="1"
                        class="form-control" name="k_price"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန်_ကျပ်</label>
                        <input type="number"  step="1"
                        class="form-control" name="k_kyat"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန်_ပဲ</label>
                        <input type="number"  step="1"
                        class="form-control" name="k_pel"  required>
                    </div>
                    <div class="form-group">
                        <label for="">ကျောက်ချိန််_ရွေး</label>
                        <input type="number"  step="1"
                        class="form-control" name="k_yway" value="<?php echo $k_yway; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                    name="add_product">အတည်ဖြစ်ဖို့နှိပ်ပါ</button>
                    <a href="product.php" class="btn btn-warning">ပစ္စည်းစာရင်း</a>
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
