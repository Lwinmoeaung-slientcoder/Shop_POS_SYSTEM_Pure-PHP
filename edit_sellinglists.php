<?php
    include_once'misc/plugin.php';
    include_once'db/connect_db.php';
    session_start();
    if($_SESSION['role']!=="admin"){
    header('location:index.php');
    }

    if($id=$_GET['id']){
    $select = $pdo->prepare("SELECT * FROM tbl_sellinglists WHERE product_id=$id");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    $product_name_db   = $row['name'];
    $goldquality_db    = $row['goldquality'];
    $shopname_db       = $row['shopname'];
    $o_pel             = $row['o_pel'];
    $o_yway            = $row['o_yway'];
    $m_pel             = $row['m_pel'];
    $m_yway            = $row['m_yway'];
    $p_pel             = $row['p_pel'];
    $p_yway            = $row['p_yway'];
    $sellingdate       = $row['sellingdate'];
    }else{
    header('location:product.php');
    }

    if(isset($_POST['update_product'])){
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
            // else{
                $update = $pdo->prepare("UPDATE tbl_sellinglists SET name=:name,goldquality=:goldquality,
                shopname=:shopname, o_pel=:o_pel, o_yway=:o_yway,m_pel=:m_pel,m_yway=:m_yway, p_pel=:p_pel,
                p_yway=:p_yway, sellingdate=:sellingdate WHERE product_id=$id");

                $update->bindParam('name', $product_name_update);
                $update->bindParam('goldquality', $goldquality_update);
                $update->bindParam('shopname', $shopname_update);
                $update->bindParam('o_pel', $o_pel_update);
                $update->bindParam('o_yway', $o_yway_update);
                $update->bindParam('m_pel', $m_pel_update);
                $update->bindParam('m_yway', $m_yway_update);
                $update->bindParam('p_pel', $p_pel_update);
                $update->bindParam('p_yway', $p_yway_update);
                $update->bindParam('sellingdate', $sellingdate_update);



                if($update->execute()){
                    header('location:sellinglists.php');
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
                            <label for="">စဉ်</label>
                            <input type="text" class="form-control"
                            name="id" value="<?php echo $id; ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="">ပစ္စည်းအမည်</label>
                            <input type="text" class="form-control"
                            name="name" value="<?php echo $product_name_db; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">ရွှေအရည်</label>
                            <select class="form-control" name="goldquality" required>
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
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="">တခြားဆိုင်အလျော့တွက်_ပဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="o_pel" value="<?php echo $o_pel; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">တခြားဆိုင်အလျော့တွက်_ရွေးဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="o_yway" value="<?php echo $o_yway; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">ကိုယ်ပိုင်အလျော့တွက်_ပဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="m_pel" value="<?php echo $m_pel; ?>" required>
                      </div>

                      <div class="form-group">
                          <label for="">ကိုယ်ပိုင်အလျော့တွက်_ရွေးဲ</label>
                          <input type="number"  step="1"
                          class="form-control" name="m_yway" value="<?php echo $m_yway; ?>" required>
                      </div>`
                        <div class="form-group">
                            <label for="">ရောင်းတဲ့ရက်စွဲ</label>
                            <input type="date" class="form-control"
                            name="sellingdate" value="<?php echo $sellingdate; ?>" >
                        </div>
                    </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="">အမြတ်_ပဲ</label>
                          <input type="number" step="1"
                          class="form-control" name="p_pel" value="<?php echo $p_pel; ?>" required>
                      </div>
                      <div class="form-group">
                          <label for="">အမြတ််_ရွေး</label>
                          <input type="number"  step="1"
                          class="form-control" name="p_yway" value="<?php echo $p_yway; ?>" required>
                      </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"
                    name="update_product">ပြင်တာ အတည်ဖြစ်ဖို့နှိပ်ပါ</button>
                    <a href="sellinglists.php" class="btn btn-warning">နောက်သို့</a>
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
