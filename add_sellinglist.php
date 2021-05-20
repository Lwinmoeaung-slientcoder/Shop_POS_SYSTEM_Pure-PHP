<?php
   include_once'db/connect_db.php';
    include_once'inc/userpermission.php';

    if(isset($_POST['add_product'])){

      $product_name_update      = $_POST['name'];
      $goldquality_update       = $_POST['goldquality'];
      $shopname_update          = $_POST['shopname'];
      $o_pel_update             = $_POST['o_pel'];
      $o_yway_update            = $_POST['o_yway'];
      $m_pel_update             = $_POST['m_pel'];
      $m_yway_update            = $_POST['m_yway'];
      $p_pel_update             = $_POST['p_pel'];
      $p_yway_update            = $_POST['p_yway'];
      $sellingdate_update       = $_POST['sellingdate'];

            // elseif (strlen($code)>6 || strlen($code)<6) {
            //         echo'<script type="text/javascript">
            //         jQuery(function validation(){
            //         swal("Warning", "Kode Harus 6 Karakter Sesuai Aturan", "warning", {
            //         button: "Continue",
            //             });
            //         });
            //         </script>';
            // }
                            $insert = $pdo->prepare("INSERT INTO tbl_sellinglists(name,goldquality,shopname,o_pel,o_yway,m_pel,m_yway,p_pel,p_yway,sellingdate)
                            values(:name,:goldquality,:shopname, :o_pel,:o_yway,:m_pel,:m_yway,:p_pel, :p_yway, :sellingdate)");

                            $insert->bindParam('name', $product_name_update);
                            $insert->bindParam('goldquality', $goldquality_update);
                            $insert->bindParam('shopname', $shopname_update);
                            $insert->bindParam('o_pel', $o_pel_update);
                            $insert->bindParam('o_yway', $o_yway_update);
                            $insert->bindParam('m_pel', $m_pel_update);
                            $insert->bindParam('m_yway', $m_yway_update);
                            $insert->bindParam('p_pel', $p_pel_update);
                            $insert->bindParam('p_yway', $p_yway_update);
                            $insert->bindParam('sellingdate', $sellingdate_update);

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
                      <label for="">ပစ္စည်းအမည်</label>
                      <input type="text" class="form-control"
                      name="name"  required>
                  </div>
                  <div class="form-group">
                      <label for="">ရွှေအရည်</label>
                      <select class="form-control" name="goldquality" required>
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
                </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for="">တခြားဆိုင်အလျော့တွက်_ပဲ</label>
                    <input type="number"  step="1"
                    class="form-control" name="o_pel"  required>
                </div>
                <div class="form-group">
                    <label for="">တခြားဆိုင်အလျော့တွက်_ရွေးဲ</label>
                    <input type="number"  step="1"
                    class="form-control" name="o_yway"  required>
                </div>
                <div class="form-group">
                    <label for="">ကိုယ်ပိုင်အလျော့တွက်_ပဲ</label>
                    <input type="number"  step="1"
                    class="form-control" name="m_pel"  required>
                </div>

                <div class="form-group">
                    <label for="">ကိုယ်ပိုင်အလျော့တွက်_ရွေးဲ</label>
                    <input type="number"  step="1"
                    class="form-control" name="m_yway"  required>
                </div>`
                  <div class="form-group">
                      <label for="">ရောင်းတဲ့ရက်စွဲ</label>
                      <input type="date" class="form-control"
                      name="sellingdate" required >
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="">အမြတ်_ပဲ</label>
                    <input type="number" step="1"
                    class="form-control" name="p_pel" required>
                </div>
                <div class="form-group">
                    <label for="">အမြတ််_ရွေး</label>
                    <input type="number"  step="1"
                    class="form-control" name="p_yway" required>
                </div>
              </div>
          </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                    name="add_product">အတည်ဖြစ်ဖို့နှိပ်ပါ</button>
                    <a href="sellinglists.php" class="btn btn-warning">ပစ္စည်းစာရင်း</a>
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
