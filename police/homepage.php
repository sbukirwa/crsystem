<?php 
	session_start();
	$con = mysqli_connect("localhost","root","","system");
	$badgeno = $_SESSION['badge_no'];
	$q = "SELECT officername FROM sergent WHERE badgeno ='$badgeno' ";
	$do = mysqli_query($con,$q);
	if(mysqli_num_rows($do) > 0){
		$rows = mysqli_fetch_array($do, MYSQLI_ASSOC);
		$officername = $rows['officername'];
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Offender registration form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width , initial-scale=1">
<link rel="stylesheet" href="./css/style.css">

<header>
    <div class="container">
        <div id="branding">
        <h1><img src="Kenya_Police_Flag.png" style="width:120px;height:90px;"/><span class="highlight"> CRIME RECORDING SYSTEM <img src="kenyalo.png" style="width:110px;height:90px; float:right; padding-left:180px;"></h1>
        </div>
       
    </div>
</header>  
        <section id="main">
            <div class="container">
                <article id="main-col"></article>
                   
 
<style>

.topnav {
  overflow: hidden;
 background-color:#35424a;

}

.topnav-right {
  float: right;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
 font: 15px/1.5 Arial, helvetica,sans-serif;
}

.topnav a:hover {
  background-color:#e8491d;
  color: white;
}

.topnav a.active {
  background-color: #e8491d;
  color: white;
}


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
label
{
 margin-right: 15px;
 margin-top: 5px;
 display:inline-block;
}
</style>
 </head>
</body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="register_offender.php">Create</a>
  <a href="viewPolice.php">View</a>
 <div class="topnav-right">
  <a href="loginPolice.php">Logout</a>
</div>
 </div>

	

		<center><h3>Welcome, Officer <p><?php echo $officername; ?></p></h3></center>
		
		<form action="loginPolice.php" method="post">
		
			
				
		</form>
	</div>
</body>
</html> 

