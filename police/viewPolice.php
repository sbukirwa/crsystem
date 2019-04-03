<?php 
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>View form</title>
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
</div>
</section>
</head> 

<style>
button{
height:38px;
	background:#e8491d;
	border:0;
	padding-left: 20px;
	padding-right: 20px;
	color:#ffffff;
	margin-right: -190px
    margin-top: 50px;
    display:inline-block;
  }
 </style>
<body>
<a href="homepage.php"><button type="button" class="back_btn"><< Back to Home Page</button></a> 
</body>
</html>  

<?php
$badge_no = $_SESSION['badge_no'];



$sqlOffender = "SELECT  * FROM offender";
$sqlCrime="SELECT * FROM crime";
$sqlCar="SELECT * FROM car";
$sqlPayment="SELECT * FROM payment";
$qOffender="SELECT  * FROM offender WHERE badgeno = '$badge_no' ";
$qCrime="SELECT * FROM crime WHERE badgeno = '$badge_no'";
$qCar="SELECT * FROM car WHERE badgeno = '$badge_no'";
$qPayment="SELECT * FROM payment WHERE badgeno = '$badge_no'";
$OfficerSqlOffender="SELECT  * FROM offender WHERE badgeno = '$badge_no'";
$commanderStatus = "SELECT * FROM sergent WHERE commander = 1 AND badgeno = '$badge_no'";


$result = mysqli_query($con, $commanderStatus);
$numrows = mysqli_num_rows($result);
if($numrows){
if(!mysqli_query($con,$sqlOffender)){
	die('Error : ' .mysqli_error($con));
}
if(!mysqli_query($con,$sqlCrime)){
	die('Error : ' .mysqli_error($con));
}
if(!mysqli_query($con,$sqlCar)){
	die('Error : ' .mysqli_error($con));
}
if(!mysqli_query($con,$sqlPayment)){
	die('Error : ' .mysqli_error($con));
}

$resultsqlOffender=mysqli_query($con,$sqlOffender);
$resultsqlCrime=mysqli_query($con,$sqlCrime);
$resultsqlCar=mysqli_query($con,$sqlCar);
$resultsqlPayment=mysqli_query($con,$sqlPayment);

$countsqlOffender=mysqli_num_rows($resultsqlOffender);
$countsqlCrime=mysqli_num_rows($resultsqlCrime);
$countsqlCar=mysqli_num_rows($resultsqlCar);
$countsqlPayment=mysqli_num_rows($resultsqlPayment);

echo '<br> OFFENDER DETAILS </br>';
echo 'OFFENDER ID          |      NAME           |      DATE OF BIRTH          | <br>';

if($countsqlOffender>0){
	while($rowsqlOffender=mysqli_fetch_array($resultsqlOffender)){
	echo $rowsqlOffender['offender_id']."        | "
	.$rowsqlOffender['offender_name']."         | "
    .$rowsqlOffender['offender_dob']."         | "
    .$rowsqlOffender['offender_num']."         | "
    .$rowsqlOffender['badgeno']."         | ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}


echo '<br> CRIME DETAILS </br>';
echo 'CRIME ID     |      BADGE NUMBER       |      OFFENDER ID      |     CRIME-FINE <br>';

if($countsqlCrime>0){
	while($rowsqlCrime=mysqli_fetch_array($resultsqlCrime)){
	echo $rowsqlCrime['crime_id']."       | "
	.$rowsqlCrime['badgeno']."        | "
    .$rowsqlCrime['offender_id']."        | "
    .$rowsqlCrime['crime_fine']."        | ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}


echo '<br> CAR DETAILS </br>';
echo 'NUMBER PLATE     |      MODEL     |     OFFENDER ID <br>';

if($countsqlCar>0){
	while($rowsqlCar=mysqli_fetch_array($resultsqlCar)){
	echo $rowsqlCar['no_plate']."    | "
    .$rowsqlCar['model']."    | "
    .$rowsqlCar['badgeno']."         | ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}

echo '<br> PAYMENT DETAILS </br>';
echo 'TRANSACTION ID    |     STATUS    |     OFFENDER ID    |     BADGE NUMBER    <br>';

if($countsqlPayment>0){
	while($rowsqlPayment=mysqli_fetch_array($resultsqlPayment)){
	echo $rowsqlPayment['transaction_id']."    | "
    .$rowsqlPayment['status']."    | "
    .$rowsqlPayment['badgeno']."    | ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}
}
else{

if(!mysqli_query($con,$qOffender)){
	die('Error : ' .mysqli_error($con));
}
if(!mysqli_query($con,$qCrime)){
	die('Error : ' .mysqli_error($con));
}
if(!mysqli_query($con,$qCar)){
	die('Error : ' .mysqli_error($con));
}
if(!mysqli_query($con,$qPayment)){
	die('Error : ' .mysqli_error($con));
}

$resultqOffender=mysqli_query($con,$qOffender);
$resultqCrime=mysqli_query($con,$qCrime);
$resultqCar=mysqli_query($con,$qCar);
$resultqPayment=mysqli_query($con,$qPayment);

$countqOffender=mysqli_num_rows($resultqOffender);
$countqCrime=mysqli_num_rows($resultqCrime);
$countqCar=mysqli_num_rows($resultqCar);
$countqPayment=mysqli_num_rows($resultqPayment);

echo '<br> OFFENDER DETAILS </br>';
echo 'OFFENDER ID          |      NAME           |      DATE OF BIRTH          | <br>';

if($countqOffender>0){
	while($rowqOffender=mysqli_fetch_array($resultqOffender)){
	echo $rowqOffender['offender_id']."        | "
	.$rowqOffender['offender_name']."         | "
    .$rowqOffender['offender_dob']."          ";
    //.$rowqOffender['offender_num']."         | "
    //.$rowqOffender['badgeno']."         | ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}


echo '<br> CRIME DETAILS </br>';
echo 'CRIME ID     |      BADGE NUMBER       |      OFFENDER ID      |     CRIME-FINE <br>';

if($countqCrime>0){
	while($rowqCrime=mysqli_fetch_array($resultqCrime)){
	echo $rowqCrime['crime_id']."       | "
	.$rowqCrime['badgeno']."        | "
    .$rowqCrime['offender_id']."        | "
    .$rowqCrime['crime_fine']."        ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}


echo '<br> CAR DETAILS </br>';
echo 'NUMBER PLATE     |      MODEL     |     OFFENDER ID <br>';

if($countqCar>0){
	while($rowqCar=mysqli_fetch_array($resultqCar)){
	echo $rowqCar['no_plate']."    | "
    .$rowqCar['model']."    | "
    .$rowqCar['badgeno']."     ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}

echo '<br> PAYMENT DETAILS </br>';
echo 'TRANSACTION ID    |     STATUS    |     OFFENDER ID    |     BADGE NUMBER    <br>';

if($countqPayment>0){
	while($rowqPayment=mysqli_fetch_array($resultqPayment)){
	echo $rowqPayment['transaction_id']."    | "
    .$rowqPayment['status']."    | "
    .$rowqPayment['badgeno']."    ";
    echo '<br/>';
}
}else{
	echo 'No record found.<br/>';
}

}


?>  

             