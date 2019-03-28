<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<body>
<header>
	<div class="container">
		<div id="branding">
     	<h1><img src="Kenya_Police_Flag.png" style="width:120px;height:100px;"/><span class="highlight"> CRIME RECORDING SYSTEM <img src="kenyalo.png" style="width:120px;height:90px; float:right; padding-left:180px;"></h1> 
		</div>
		
	</div>
	</header>	
		<section id="main">
			<div class="container">
				<article id="main-col"></article>
					

<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="./css/style.css">

<style>
button{
height:38px;
	background:#e8491d;
	border:0;
	padding-left: 20px;
	padding-right: 20px;
	color:#ffffff;
	margin-right: -190px;
    margin-top: 50px;
    display:inline-block;
  }

label{
 margin-right: 10px;
 margin-top: 5px;
 display:inline-block;
 text-align: left;
 width: 100px;
 vertical-align: middle;
 float:center;
}
input {
    margin-top:5px;
    margin-right:10px;
    display: inline-block;
    vertical-align: middle;
    margin-right:40px;
    width:180px;
}
.wrapperRegister{
	
	padding-left:470px;
}

</style>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>POLICE LOGIN FORM</h2></center>
			
		<form action="loginPolice.php" method="POST">
		
			<div class="inner_container">
				<center><label>Badge number</label>
				<input type="text" placeholder="Enter Badge no" name="badgeno" required></center>
				
				<center><br><label>Password</label>
				<input type="password" placeholder="Enter Password" name="password" required></br></center>
				
				<center><button class="login_button" name="login" type="submit">Login</button></center>
				<div class = "wrapperRegister">
				<a href="register_police.php"><button type="button" class="register_btn">Register</button> </a>
			</div>
				
				
			</div>
        </form>
        	</div>
</body>
</html>
<?php

			$con=mysqli_connect("localhost", "root", "","system");
			if(ISSET($_POST['login']))
			{
			    $badgeno=$_POST['badgeno'];
				$password=$_POST ['password'];
				$_SESSION["badge_no"] = $badgeno;
				$password = hash('sha256', $password);
				$query = "SELECT badgeno, password from sergent WHERE badgeno='$badgeno' AND password = '$password'";
				
				$query_run = mysqli_query($con,$query);
				
					if(mysqli_num_rows($query_run) > 0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					$_POST['badgeno'] = $badgeno;
					$_POST['password'] = $password;
					header( "Location: homepage.php");
					}
					else 
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}

			
			
		?>
