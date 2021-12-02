<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"financeeper");
$echo='<div class="alert alert-success"><strong> congrats registeration successful </strong> </div>';
if(!$con)
{
 die('error'.mysqli_error());
 } 
 ?>