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

    error_reporting(0);
      $id = $_GET['id'];

      $delete = $pdo->prepare("DELETE FROM tbl_product WHERE product_id=".$id);

      if($delete->execute()){
          echo'<script type="text/javascript">
              jQuery(function validation(){
              swal("Info", "Product Has Been Deleted", "info", {
              button: "Continue",
                  });
              });
              </script>';
              header('location: product.php');
      }

?>
<html>
<head>
<meta http-equiv="refresh" content="60">
<style>
table td {
    word-wrap: break-word;         /* All browsers since IE 5.5+ */
    overflow-wrap: break-word;     /* Renamed property in CSS3 draft spec */
}
</style>
</head>
</html>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">ပစ္စည်းစာရင်း</h3>
                <a href="add_otherproduct.php" class="btn btn-success btn-sm pull-right">ပစ္စည်းအသစ်ထည့်ရန်</a>
            </div>
            <div class="box-body">
                <div style="overflow-x:auto;">
                    <table class="table " border="1" bordercolor="black" align="right" id="myProduct">
                        <thead>
                            <tr>

                                <th rowspan="2" width="40">No</th>
                                <th rowspan="2">ပစ္စည်းနာမည်</th>
                                <th rowspan="2" width="20">အလျော့တွက်</th>
                                <th colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ရွှေချိန်</th>
                                <th colspan="2" width="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ကျောက်ချိန်</th>
                                <th rowspan="2" width="20">ကျောက်ဖိုး</th>
                                <th rowspan="2" width="50">ဝယ်စျေး</th>
                                <th rowspan="2" width="50">ရောင်းစျေး</th>
                                <th rowspan="2" width="50">ဝယ်တဲ့ရက်စွဲ</th>
                                <th rowspan="2" width="50">ရောင်းတဲ့ရက်စွဲ</th>
                                <th rowspan="2" width="90">Option</th>
                            </tr>
                            <tr>
                                 <th width="50">ကျပ်</th>
                                 <th width="50">ပဲ</th>
                                 <th width="50">ရွေး</th>
                                 <th width="50">ရတီဲ</th>
                                 <th width="50">ကာရက်</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $select = $pdo->prepare("SELECT * FROM tbl_otherproduct");
                            $select->execute();
                            while($row=$select->fetch(PDO::FETCH_OBJ)){
                            ?>
                                <tr>
                                <td><?php echo $no++ ;?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->ayawtwet;?></td>
                                <td><?php echo $row->g_kyat; ?></td>
                                <td><?php echo $row->g_pel; ?></td>
                                <td><?php echo $row->g_yway;?></td>
                                <td><?php echo $row->d_yati;?></td>
                                <td><?php echo $row->d_karyat;?></td>
                                <td><?php echo $row->kyoukepoe;?></td>
                                <td><?php echo $row->buyingprice;?></td>
                                <td><?php echo $row->sellingprice;?></td>
                                <td><?php echo $row->buyingdate; ?></td>
                                <td><?php echo $row->sellingdate; ?></td>
                                <td>
                                    <?php if($_SESSION['role']=="admin"){ ?>

                                    <a onclick='javascript:confirmationDelete($(this));return false;' href='product.php?id=<?php echo $row->product_id; ?>'
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    <a href="edit_otherproduct.php?id=<?php echo $row->product_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  $(document).ready( function () {
      $('#myProduct').DataTable();
  } );
  </script>

  <script>
  function confirmationDelete(anchor)
  {
     var conf = confirm('ဖျက်မှာသေချာပြီလား?');
     if(conf)
        window.location=anchor.attr("href");
  }
  </script>

 <?php
    include_once'inc/footer_all.php';
 ?>
