<?php
session_start();
if(!isset($_SESSION["email"]))
{
header("Location:index.php");
}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="iso-8859-1">
<!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<title>Manage Product</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <!-- Navbar -->
  <?php
include "header.php";
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php
 include "menu.php";
 ?>


<div class="content-wrapper">
<div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Manage Products</h3>

           
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product ID</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Photo</th>
                    </tr>
                    </thead>
                    <?php 
include('config.php');

  
    $query = "SELECT * FROM product";
    
    $result = mysqli_query($con,$query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
    $id=$row['id'];
    $pid=$row['pid'];
    $category = $row['category'];
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $photo=$row['photo'];

    ?>
                    <tbody>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $pid;?></td>
                      <td><?php echo $category;?></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $title;?></div>
                      </td>
                      <td><?php echo $description;?></td>
                      <td><?php echo $price;?></td>
                      <td><?php echo "<img src='uploads/$photo' style='height:50px; width:50px;'>";?></td>
                      <!--<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit-product.php?id=<?php  $id;?> "><button class="btn btn-primary btn-xs far fa-edit" data-title="Edit" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                      <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="delete-product.php?id=<?php $id;?> "><button class="btn btn-danger btn-xs fas fa-trash-alt" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></a></p></td>-->
                    </tr>
                    <?php
                  }
                  }
                  ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            </div>
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
        <button type="button" class="close fas fa-times" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Title">
        </div>
        <div class="form-group">
        <input class="form-control " type="text" placeholder="Description">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="Price"></textarea>
        </div>
        <div class="form-group">
        <input class="form-control " type="text" placeholder="Strike">
        </div>
        <div class="form-group">
        <input class="form-control " type="text" placeholder="Stock">
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
        <button type="button" class="close fas fa-times" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
            <?php
include "footer.php";
  ?>
          
			<!-- REQUIRED SCRIPTS -->
      <script type="text/javascript">
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
  
</script>
</body>
</html>
<?php
}
?>