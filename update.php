<?php include("config.php"); ?>
<?php
$random_id=$_GET['url'];

$sql1=mysql_query("select * from escmis_user where email='".$random_id."'");
$mydownline=mysql_fetch_array($sql1);
$mydownliner=$mydownline['user_id'];

$today=date('Y-m-d');

	$sql="update escmis_user set accept =1, reg_date='".$today."' where email='".$random_id."'";	
	mysql_query($sql);

	header("location:index.php");
	exit();

?>