<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<body>
<header>
    <div class="container">
        <div id="branding">
        <h1><img src="Kenya_Police_Flag.png" style="width:120px;height:100px;"/><span class="highlight"> CRIME RECORDING SYSTEM <img src="kenyalo.png" style="width:110px;height:90px; float:right; padding-left:180px;"></h1> 
        </div>
        
    </div>
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> -->
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
 width: 150px;
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
.rd{
    margin-right: 10px;
    margin-top: 5px;
    display:inline-block;
    vertical-align: middle;
    padding-left:434px;
}
.radio-inline{
   padding-left:100px;
}
</style>

<body style="background-color:#bdc3c7">
    <div id="main-wrapper">
    <center><h2>TRAFFIC OFFENCE FORM</h2></center>
    
    <form action="register_offender.php" method="post">
    <div class="inner_container">
        
                <center><h3>OFFENDER DETAILS<h3></center>
                <center><label>Identification No.</label>
                <input type="text" placeholder="Enter ID no" name="ID_no" maxlength="10" required></br></center>
                </br>
                
                <center><label>Name</label>
                <input type="text" placeholder="Enter Name" name="name" required></br></center>
                </br>
                
                <center><label>Date Of Birth</label>
                <input type="date" placeholder ="Enter Date of Birth" name="dateofbirth" max="1999-12-31" required></br></center>
                </br>
                
                <center><h3>CRIME DETAILS<h3></center>
                </br>

                <center><label>Offence and fine</label>
                <select name="offence_and_fine" value="">
                    <option value="No identification plates - Ksh.10,000">No identification plates - Ksh.10,000</option>
                    <option value="Exceeding Speed Limit - Ksh.5,000">Exceeding Speed Limit - Ksh.5,000</option>
                    <option value="Driving through pavementc - Ksh.5,000">Driving through pavementc - Ksh.5,000</option>
                    <option value="Unqualified PSV driver - Ksh.5,000">Unqualified PSV driver - Ksh.5,000</option>
                    <option value="Expired Drivng License - Ksh.1,000">Expired Drivng License - Ksh.1,000</option>
                    <option value="Driving without a License - Ksh.500">Driving without a License - Ksh.500</option>
                    </select></br></center>
                </br>
                
                <center><h3>CAR DETAILS<h3></center>
                <center><label>Number Plate</label>
                <input type="text" placeholder ="Enter number plate" name="no_plate" required></br></center>
                </br>
            
                <center><label>Model</label>
                <input type="text" placeholder="Enter Model" name="model" required></br></center>
                </br>
                
                <center><h3>PAYMENT DETAILS<h3></center>
                <center><label> Paybill No - 555679 </label></center>
                <center><label> Account No - 523451 </label></center>

                </br>
                <div class = "rd">
                <center><label>Paid</label>
                </div>
                <input type="radio" name="optradio" class="radio-inline" checked>Yes
                <input type="radio" name="optradio" class="radio-inline" checked>No
                </center>
                </br>

                </br>
                <center><label>Transaction ID</label>
                <input type="text" placeholder ="Enter Transaction ID" name="transaction_ID" required></br></center>
                </br>
                
                <center><h3>OFFICER DETAILS<h3></center>
                <center><label>Badge No.</label><?php echo $_SESSION['badge_no']; ?></br></center>
                </br>
                
                <center><a href="homepage.php"><button name="register" class="sign_up_btn" type="submit">Submit</button></br></center>
                </br>
                
                
            </div>
        </form>
    
</body>
</html> 

<?php 


        $badgeno = $_SESSION['badge_no'];
        if(ISSET($_POST['register']))
        {
          $offender_id=$_POST['ID_no'];
          $offender_name=$_POST['name'];
          $offender_dob=$_POST['dateofbirth'];
          $crime_fine=$_POST['offence_and_fine'];
          $no_plate=$_POST['no_plate'];
          $model=$_POST['model'];
          $status=$_POST['answer'];
          $transaction_id=$_POST['transaction_ID'];

         

          $sqlOffender = "INSERT INTO offender (offender_id, offender_name, offender_dob, badgeno) VALUES ('$offender_id','$offender_name','$offender_dob','$badgeno')";

           if(!mysqli_query($con,$sqlOffender)){
           die('Error:'.mysqli_error($con));
           }
           echo $badgeno;
           $sqlCrime = "INSERT INTO crime (badgeno, offender_id,crime_fine) VALUES ('$badgeno','$offender_id','$crime_fine')";

           if(!mysqli_query($con,$sqlCrime)){
           die('Error:'.mysqli_error($con));
           }
            $sqlPayment = "INSERT INTO payment (transaction_id ,status,badgeno) VALUES ('$transaction_id','$status','$badgeno')";

           if(!mysqli_query($con,$sqlPayment)){
           die('Error:'.mysqli_error($con));
           }
           $sqlCar = "INSERT INTO car (no_plate, model, badgeno) VALUES ('$no_plate','$model','$badgeno')";

           if(!mysqli_query($con,$sqlCar)){
           die('Error:'.mysqli_error($con));
           }
            
          echo("<script>location.href = 'homepage.php'</script>");


        }


?>