<?php
    include_once'db/connect_db.php';
    session_start();
    if($_SESSION['username']==""){
      header('location:index.php');
    }else{
      if($_SESSION['role']=="admin"){
        include_once'inc/header_all.php';
      }else{
          include_once'inc/header_all_operator.php';
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
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-body">
              <?php
                $id = $_GET['id'];

                $select = $pdo->prepare("SELECT * FROM tbl_product WHERE product_id=$id");
                $select->execute();
                while($row = $select->fetch(PDO::FETCH_OBJ)){ ?>

                <div class="col-md-6">
                  <ul class="list-group">

                    <center><p class="list-group-item list-group-item-success">Product Details</p></center>
                    <li class="list-group-item"> <b>Name</b>     :<span class="label badge pull-right"><?php echo $row->name; ?></span></li>
                    <li class="list-group-item"><b>Gold Quality</b>    :<span class="label label-info pull-right"><?php echo $row->goldquality; ?></span></li>
                    <li class="list-group-item"><b>ShopName</b>        :<span class="label label-primary pull-right"><?php echo $row->shopname; ?></span></li>
                    <li class="list-group-item"><b>kyat</b>  :<span class="label label-warning pull-right">Rp. <?php echo number_format($row->kyat); ?></span></li>
                    <li class="list-group-item"><b>pel</b>     :<span class="label label-warning pull-right">Rp. <?php echo $row->pel; ?></span></li>
                    <li class="list-group-item"><b>yway</b>           :<span class="label label-success pull-right">Rp. <?php echo $row->yway; ?></span></li>
                    <li class="list-group-item"><b>ayaw</b>          :<span class="label label-default pull-right"><?php echo $row->ayaw; ?></span></li>

                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <center><p class="list-group-item list-group-item-success">Kyoke Detail</p></center>
                    <li class="list-group-item"><b>k_price</b>   :<span class="label label-default pull-right"><?php echo $row->k_price; ?></span></li>
                    <li class="list-group-item"><b>k_kyat</b>    :<span class="label label-default pull-right"><?php echo $row->k_kyat; ?></span></li>
                    <li class="list-group-item"><b>k_pel</b>    :<span class="label label-default pull-right"><?php echo $row->k_pel; ?></span></li>
                    <li class="list-group-item"><b>k_yway</b>    :<span class="label label-default pull-right"><?php echo $row->k_yway; ?></span></li>
                    <li class="list-group-item"><b>BuyingDate</b>    :<span class="label label-default pull-right"><?php echo $row->buyingdate; ?></span></li>
                    <li class="list-group-item"><b>SellingDate</b>    :<span class="label label-default pull-right"><?php echo $row->sellingdate; ?></span></li>
                  </ul>
                </div>
              <?php
                }
              ?>
            </div>
            <div class="box-footer">
                <a href="product.php" class="btn btn-warning">Back</a>
            </div>

        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
    include_once'inc/footer_all.php';
 ?>
