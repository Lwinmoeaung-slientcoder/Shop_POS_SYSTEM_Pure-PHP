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
    $select = $pdo->prepare("SELECT * FROM tbl_product");
    $select->execute();

$result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
   <head>
     <title>Convert HTML Table to Excel using PHPSpreadsheet</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center">Convert HTML Table to Excel using PHPSpreadsheet</h3>
      <br />
      <div class="table-responsive">
       <form method="POST" id="convert_form" action="export.php">
            <table class="table table-striped table-bordered" id="table_content">
              <tr>
                <th>product_id</th>
                <th>name</th>
                <th>goldquality</th>
                <th>shopname</th>
                <th>kyat</th>
                <th>pel</th>
                <th>yway</th>
                <th>ayaw</th>
                <th>k_price</th>
                <th>k_kyat</th>
                <th>k_pel</th>
                <th>k_yway</th>
                <th>buyingdate</th>
                <th>sellingdate</th>
              </tr>
              <?php
              foreach($result as $row)
              {
                echo '
                <tr>

                  <td>'.$row["product_id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["goldquality"].'</td>
                  <td>'.$row["shopname"].'</td>
                  <td>'.$row["kyat"].'</td>
                  <td>'.$row["pel"].'</td>
                  <td>'.$row["yway"].'</td>
                  <td>'.$row["ayaw"].'</td>
                  <td>'.$row["k_price"].'</td>
                  <td>'.$row["k_kyat"].'</td>
                  <td>'.$row["k_pel"].'</td>
                  <td>'.$row["k_yway"].'</td>
                  <td>'.$row["buyingdate"].'</td>
                    <td>'.$row["sellingdate"].'</td>
                </tr>
                ';
              }
              ?>
            </table>
            <input type="hidden" name="file_content" id="file_content" />
            <button type="button" name="convert" id="convert" class="btn btn-primary">Convert</button>
          </form>
          <br />
          <br />
      </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>

<script>
$(document).ready(function(){
 $('#convert').click(function(){
    var table_content = '<table>';
    table_content += $('#table_content').html();
    table_content += '</table>';
    $('#file_content').val(table_content);
    $('#convert_form').submit();
  });
});
</script>
