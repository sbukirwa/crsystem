<!DOCTYPE html>
<html lang="en">
<head>
<title>Police registration form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
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
 margin-right: 10px;
 margin-top: 5px;
 display:inline-block;
 text-align: left;
 width: 100px;
 vertical-align: middle;
 float:center;
}
select{
 margin-right: 45px;
 margin-top: 5px;
 display:inline-block;
 text-align: left;
 width: 190px;
 vertical-align: middle;
 float:center;
}
input {
    margin-top:5px;
    margin-right:10px;
    display: inline-block;
    vertical-align: middle;
    margin-right:40px;
    width:190px;
}
.wrapper{
    padding-left:445px;
    margin-top:-45px;

}
.wow{
  padding-left: 30px;
    margin-top:-45px; 
}
</style>
 </head>

<body style="background-color:#bdc3c7;">
    <div id="main-wrapper">
    <center><h2>REGISTRATION FORM</h2></center>
 
        <form method="POST" action="register_police.php">
           
            <div class="inner_container">
                <center><label>Badge number</label>
                <input type="text" placeholder="Enter Badge number" name="badgeno" required> </center>
                <br>
               
                <center><label>Name</label>
                <input type="text" placeholder="Enter Name" name="name" required></center>
                <br>
               
                <center><label>Date Of Birth</label>
                <input type="date" placeholder ="Enter Date of Birth" min="1954-12-31" max="1994-12-31" name="dob" required></center>
                <br>
               
                <center><label>Jurisdiction</label>
                <select name="jurisdiction" required> 
                    <option value="Baringo County">Baringo County</option>
                    <option value="Busia County">Busia County</option>
                    <option value="Elgeyo Marakwet County">Elgeyo Marakwet County</option>
                    <option value="Embu County">Embu County</option>
                    <option value="Isiolo County">Isiolo County</option>
                    <option value="Kakamega County">Kakamega County</option>
                    <option value="Kericho County">Kericho County</option>
                    <option value="Kiambu County">Kiambu County</option>
                    <option value="Kisii County">Kisii County</option>
                    <option value="Laikipia County">Laikipia County</option>
                    <option value="Lamu County">Lamu County</option>
                    <option value="Machakos County">Machakos County</option>
                    <option value="Mombasa County">Mombasa County</option>
                    <option value="Nairobi County">Nairobi County</option>
                    <option value="Nakuru County">Nakuru County</option>
                    <option value="Nyandarua County">Nyandarua County</option>
                    <option value="Nyeru County">Nyeru County</option>
                    <option value="Samburu County">Samburu County</option>
                    <option value="Siaya County">Siaya County</option>
                    <option value="Taita Taveta County">Taita Taveta County</option>
                    <option value="Tharaka Nithi County">Tharaka Nithi County</option>
                    <option value="Uasin Gishu County">Uasin Gishu County</option>
                    <option value="Vihiga County">Vihiga County</option>
                    <option value="Wajir County">Wajir County</option>
                    </select></br></center>
                <br> 

                <center><label>Password</label>
                <input type="password" placeholder="Enter Password" name="password" required> </center>
                <br>
               
                <center><label>Confirm Password</label>
                <input type="password" placeholder="Enter Password" name="cpassword" required> </center>
                <br>
               
               <div class = "wow">
                <center><button name="register" class="submit_btn" type="submit">Register</button> </center>
                <br>
            </div>
               
			   	<div class = "wrapper">		
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
            </div>
                
            </div>
        </form>
     </div>
</body>
</html>
<?php 
 ob_start();
		$con=mysqli_connect ("localhost", "root", "","system");
        if(ISSET($_POST['register']))
            {
                $badgeno=$_POST['badgeno'];
                $officername=$_POST['name'];
                $officerdob=$_POST['dob'];
                $jurisdiction=$_POST['jurisdiction'];  
                $opassword=$_POST['password'];
                $ocpassword=$_POST['cpassword'];
               
               
                $password = hash('sha256', $opassword);
                $cpassword = hash('sha256', $ocpassword);

                if($password == $cpassword){
                $q = "INSERT INTO sergent (badgeno, officername, officerdob, jurisdiction, password) VALUES ('$badgeno','$officername','$officerdob','$jurisdiction','$password')";
                            
                $query_run = mysqli_query($con,$q);
                if($query_run)
                            {
                                echo "<script> alert('Registration successful'); </script>";

                                echo("<script>location.href = 'loginPolice.php'</script>");
                            }
                            else
                            {
                                echo "<p class='bg-danger msg-block'>Registration Unsuccessful due to server error. Please try later</p>";
                            }
                        }
                        else{
                        	echo "<script> alert('Passwords Do Not Match!'); </script>";
                        }
ob_end_flush();
                    }?>

                   