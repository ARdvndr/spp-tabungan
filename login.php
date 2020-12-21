<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login SPP Desa</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="./assets/signin.css" rel="stylesheet">

  </head>

<body>

    <div class="container">

      <form class="form-signin" method="post" action="">
      	<img class="mb-4" src="./assets/img/logodesa.png" alt="" width="72" height="72">
        <h2 class="form-signin-heading">Login SPP</h2>
        <label class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login"/>
      </form>

    </div> <!-- /container -->


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel untuk menyimpan kiriman dari form
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user=='' || $pass==''){
		echo "Form belum lengkap!!";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM admin 
						WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login']	= true;
			$_SESSION['id']		= $d['idadmin'];
			$_SESSION['username']=$d['username'];
			
			header('location:./index.php');
		}else{
			echo "Username dan Password anda Salah!!!";
		}
	}
}
?>
</body>
</html>