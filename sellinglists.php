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

      $delete = $pdo->prepare("DELETE FROM tbl_sellinglists WHERE product_id=".$id);

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
                <a href="add_sellinglist.php" class="btn btn-success btn-sm pull-right">ပစ္စည်းအသစ်ထည့်ရန်</a>
            </div>
            <div class="box-body">
                <div style="overflow-x:auto;">
                    <table class="table " border="1" bordercolor="black" align="right" id="myProduct">
                        <thead>
                            <tr>

                                <th rowspan="2">No</th>
                                <th rowspan="2">ပစ္စည်းနာမည်</th>
                                <th rowspan="2">ရွှေရည်</th>
                                <th rowspan="2">ဆိုင်နာမည်</th>
                                <th colspan="2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;တခြားဆိုင်အလျော့တွက်</th>
                                <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ကိုယ်ပိုင်အလျော့တွက်</th>
                                <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;အမြတ်</th>
                                <th rowspan="2">ရောင်းတဲ့ရက်စွဲ</th>
                                <th rowspan="2">Option</th>

                            </tr>
                            <tr>
                                 <th>ပဲ</th>
                                 <th>ရွေး</th>
                                 <th>ပဲ</th>
                                 <th>ရွေး</th>
                                 <th>ပဲ</th>
                                 <th>ရွေး</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $select = $pdo->prepare("SELECT * FROM tbl_sellinglists");
                            $select->execute();
                            while($row=$select->fetch(PDO::FETCH_OBJ)){
                            ?>
                                <tr>
                                <td><?php echo $no++ ;?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->goldquality; ?></td>
                                <td><?php echo $row->shopname; ?></td>
                                <td><?php echo $row->o_pel ." ပဲ"; ?></td>
                                <td><?php echo $row->o_yway ." ရွေး"; ?></td>
                                <td><?php echo $row->m_pel ." ပဲ"; ?></td>
                                <td><?php echo $row->m_yway ." ရွေး"; ?></td>
                                <td><?php echo $row->p_pel ." ပဲ"; ?></td>
                                <td><?php echo $row->p_yway ." ရွေး"; ?></td>
                                <td><?php echo $row->sellingdate; ?></td>
                                <td>
                                    <?php if($_SESSION['role']=="admin"){ ?>

                                    <a onclick='javascript:confirmationDelete($(this));return false;' href='product.php?id=<?php echo $row->product_id; ?>'
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    <a href="edit_sellinglists.php?id=<?php echo $row->product_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    <?php
                                    }
                                    ?>
                                    <!-- <a href="view_product.php?id=<?php echo $row->product_id; ?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a> -->
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
