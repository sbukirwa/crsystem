<!-- CLEARDB_DATABASE_URL: mysql://b9c55e9fbda285:d67a959f@eu-cdbr-west-02.cleardb.net/heroku_3f026d31805e663?reconnect=true -->
<?php
$pass='d67a959f';
$server='eu-cdbr-west-02.cleardb.net';
$username = 'b9c55e9fbda285';
$database= 'heroku_3f026d31805e663';
$conn = mysqli_connect($server, $username, $pass, $database);

$sergent_sql = "SELECT * FROM sergent";
$sergent_query = mysqli_query($conn,$sergent_sql);
$numrows = mysqli_num_rows($sergent_query);
if($numrows){
	$array = mysqli_fetch_array($sergent_query)
	if($array){
		'<h1>'.$array['name'].'</h1>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sonia Sight</title>
</head>
<body>

</body>
</html>