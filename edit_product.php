<?php
    include_once'misc/plugin.php';
    include_once'db/connect_db.php';
    session_start();
    if($_SESSION['role']!=="admin"){
    header('location:index.php');
    }

    if($id=$_GET['id']){
    $select = $pdo->prepare("SELECT * FROM tbl_product WHERE product_id=$id");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    $product_name_db = $row['name'];
    $goldquality_db = $row['goldquality'];
    $shopname_db = $row['shopname'];
    $p_kyat = $row['kyat'];
    $p_pel = $row['pel'];
    $p_yway = $row['yway'];
    $p_ayaw = $row['ayaw'];
    $buyingdate = $row['buyingdate'];
    $sellingdate = $row['sellingdate'];
    $k_price = $row['k_price'];
    $k_kyat = $row['k_kyat'];
    $k_pel = $row['k_pel'];
    $k_yway = $row['k_yway'];
    }else{
    header('location:product.php');
    }

    if(isset($_POST['update_product'])){
        $product_name = $_POST['product_name'];
        $gold_quality = $_POST['gold_quality'];
        $shopname = $_POST['shopname'];
        $p_kyat_update = $_POST['p_kyat'];
        $p_pel_update = $_POST['p_pel'];
        $p_yway_update = $_POST['p_yway'];
        $p_ayaw_update = $_POST['p_ayaw'];
        $buydate_update = $_POST['buydate'];
        $selldate_update = $_POST['selldate'];
        $k_price_update = $_POST['k_price'];
        $k_kyat_update = $_POST['k_kyat'];
        $k_pel_update = $_POST['k_pel'];
        $k_yway_update = $_POST['k_yway'];

            // else{
                $update = $pdo->prepare("UPDATE tbl_product SET name=:name,goldquality=:goldquality,
                shopname=:shopname, kyat=:kyat, pel=:pel,yway=:yway,ayaw=:ayaw, k_price=:k_price,
                k_kyat=:k_kyat, k_pel=:k_pel, k_yway=:k_yway, buyingdate=:buyingdate, sellingdate=:sellingdate WHERE product_id=$id");

                $update->bindParam('name', $product_name);
                $update->bindParam('goldquality', $gold_quality);
                $update->bindParam('shopname', $shopname);
                $update->bindParam('kyat', $p_kyat_update);
                $update->bindParam('pel', $p_pel_update);
                $update->bindParam('yway', $p_yway_update);
                $update->bindParam('ayaw', $p_ayaw_update);
                $update->bindParam('buyingdate', $buydate_update);
                $update->bindParam('sellingdate', $selldate_update);
                $update->bindParam('k_price', $k_price_update);
                $update->bindParam('k_kyat', $k_kyat_update);
                $update->bindParam('k_pel', $k_pel_update);
                $update->bindParam('k_yway', $k_yway_update);


                if($update->execute()){
                    header('location:view_product.php?id='.urlencode($id));
                }else{
                    echo '<script type="text/javascript">
                        jQuery(function validation(){
                        swal("Error", "Terjadi Kesalahan", "error", {
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
                            <label for="">ID</label>
                            <input type="text" class="form-control"
                            name="id" value="<?php echo $id; ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="">ပစ္စည်းနာမည်</label>
                            <input type="text" class="form-control"
                            name="product_name" value="<?php echo $product_name_db; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">ရွှေအရည်</label>
                            <select class="form-control" name="gold_quality" required>
                                <?php
                                $select = $pdo->prepare("SELECT * FROM tbl_category");
                                $select->execute();
                                while($row = $select->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                ?>
                                    <option <?php if($row['cat_name']==$shopname_db) {?>
                                    selected = "selected"
                                    <?php }?> >
                                    <?php echo $row['cat_name']; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ဆိုင်နာမည်</label>
                            <input type="text" class="form-control"
                            name="shopname" value="<?php echo $shopname_db; ?>" required>
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
                          class="form-control" name="p_kyat" value="<?php echo $p_kyat; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ပဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="p_pel" value="<?php echo $p_pel; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">ရွှေချိန်_ရွေး</label>
                          <input type="text"  step="1"
                          class="form-control" name="p_yway" value="<?php echo $p_yway; ?>" required>
                      </div>
                        <div class="form-group">
                            <label for="">အလျော့တွက်</label>
                            <input type="text"  step="1"
                            class="form-control" name="p_ayaw" value="<?php echo $p_ayaw; ?>" required>
                        </div>
                        <div class="form-group">
                          <div class="form-group">
                              <label for="">ဝယ်တဲ့ရက်စွဲ</label>
                              <input type="date" class="form-control"
                              name="buydate" value="<?php echo $buyingdate; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="">ရောင်းတဲ့ရက်စွဲ</label>
                            <input type="date" class="form-control"
                            name="selldate" value="<?php echo $sellingdate; ?>" >
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="">ကျောက်ဖိုး</label>
                          <input type="number"  step="1"
                          class="form-control" name="k_price" value="<?php echo $k_price; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">ကျောက်ချိန်_ကျပ်</label>
                          <input type="number"  step="1"
                          class="form-control" name="k_kyat" value="<?php echo $k_kyat; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">ကျောက်ချိန်_ပဲ</label>
                          <input type="number" step="1"
                          class="form-control" name="k_pel" value="<?php echo $k_pel; ?>" required>
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
                    name="update_product">ပြင်တာ အတည်ဖြစ်ဖို့နှိပ်ပါ</button>
                    <a href="product.php" class="btn btn-warning">နောက်သို့</a>
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
