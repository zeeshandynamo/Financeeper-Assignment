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
<head>
<!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Product</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

<!-- Main Sidebar Container -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
<?php
include "header.php";
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php
 include "menu.php";
 ?>
      <!-- Sidebar Menu -->
      

<style>
.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}

</style>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
<div class="content-wrapper">
<div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Add-Product</h3>

            
              <!-- /.card-header -->
              
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<form method="post" action="add-product.php" enctype="multipart/form-data">
<div class="file-upload">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

  <div class="image-upload-wrap">
    <input class="file-upload-input" type='file' name="photo" onchange="readURL(this);"/>
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
  </div>
</div>


              <!-- /.card-body -->
              <!-- /.card-footer -->
			  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Title</label>
      <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Enter Product Title">
    </div>
	    <div class="form-group col-md-6">
      <label for="inputEmail4">Product-id</label>
      <input type="text" name="pid" class="form-control" id="inputEmail4" placeholder="Enter Product-id">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Description</label>
      <textarea type="textarea" name="description" class="form-control" id="inputPassword4" placeholder="Enter Product Description"> </textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Category</label>
      <select name="category" id="inputState" class="form-control">
        <option selected>Select</option>
        <option value="Electronics">Electronics</option>
      </select>
    </div>
	    <div class="form-group col-md-4">
      <label for="inputZip">Price</label>
      <input type="text" name="price" class="form-control" id="inputZip">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
</form>
            </div>
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

include('config.php');
// Check if image file is a actual image or fake image

if(isset($_POST['submit']))
{

 $title = $_POST['title'];  
 $pid = $_POST['pid'];
 $description = $_POST['description'];
 $category = $_POST['category'];
 $price = $_POST['price'];
 $photo = $_FILES['photo']['name'];
 

  $sql="INSERT INTO `financeeper`.`product` (`id` ,`pid` ,`category` ,`title` ,`description` ,`price` ,`photo`)VALUES (NULL, '$pid', '$category', '$title', '$description', '$price', '$photo')";
  $query=mysqli_query($con,$sql);
  if($query)
  {move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/$photo");
  
  ?>
  <script>
  alert('Product Added Successfully');
  </script>
  <?php
  }else{
echo '<div class="alert alert-success">
    <strong>unsuccessful please read the above data and fill the form accordingly.</strong> 
  </div>';
  ?>
  <script>
    alert('ERROR:Request unprocessed');
  </script>
  <?php
}
}
}
?>