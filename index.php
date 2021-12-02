<?php
session_start();
if(isset($_SESSION["email"]))
{

header("Location:home.php");
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
                body {
                background: linear-gradient(132deg, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3,#03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800, #f44336, #E91E63, #9C27B0, #673AB7, #3F51B5, #2196F3,#03A9F4, #00BCD4, #009688, #4CAF50, #FFC107, #FF9800);
                background-size: 400% 400%;
                animation: BackgroundGradient 30s ease infinite;
            }
            
            @keyframes BackgroundGradient {
                0% {background-position: 0% 50%;}
                50% {background-position: 100% 50%;}
                100% {background-position: 0% 50%;}
            }
            .baslik
{
    color: #fff;
    text-align: center;
    font-family: 'Fira Sans', sans-serif;
}
.arkalogin
{
    width: 300px;
    text-align: center;
    background: #fff;
    height: 300px;
    padding: 10px;
    margin: 50px auto;
}
.loginbaslik
{
    color: #888888;
    text-align: left;
    font-size: 19px;
    margin-top: 15px;
}
.giris
{
    width: 100%;
    height: 40px;
    margin-top: 10px;
    border: none;
    background: #E5E5E5;
    outline: none;
    padding: 0 10px;
}
.butonlogin
{
    width: 100%;
    margin-top: 10px;
    height: 40px;
    font-weight: bold;
    background: #2196F3;
    border: none;
    color: #fff;
    transition: all 250ms;
}
.butonlogin:hover
{
    background: #1E88E5;
}
body
{
    margin: 0;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

					<?php
					include('config.php');
if(isset($_POST['submit']))
{
$email=stripslashes($_REQUEST['email']);
$password=stripslashes($_REQUEST['password']);
$result=mysqli_query($con,"select * from admin where email='$email' AND password='".md5($password)."'") or die(mysqli_error());
$query=mysqli_num_rows($result);
if(($query)>0)
{
 
$_SESSION['email']=$email;
?>	
		 <script type="text/javascript">
		 alert('Login Successful')

		 window.location.href="home.php";		 
		</script>
<?php		
}		
else
{
echo '<div class="alert alert-success"><strong>email/password incorrect</strong> 
  </div>';
}
}
?>

<section style="height: 100vh;">
    <div style="background-image: url(images/arka.jpg); background-attachment: fixed; background-size: cover; width: 100%; height: 100vh; position: relative;"  >
    
    <section>
    <form method="post" action="index.php">
        <div class="arkalogin">
            <div class="loginbaslik">Admin Login</div>
            <hr style="border: 1px solid #ccc;">
            <input class="giris" type="email" name="email" placeholder="Email">
            <input class="giris" type="password" name="password" placeholder="•••••">
            <input class="butonlogin" type="submit" name="submit" value="LOGIN">
        </div>
    </form>
    </section><br>
 
<script type="text/javascript">

</script>
</body>
</html>
<?php
}
?>