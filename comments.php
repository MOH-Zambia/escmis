<?php
	session_start();
	require_once('config.php');
	require_once('DBConnectivity.php');

	$user_type=$_SESSION['EMAIL'];
	if($user_type=="")
	{
		header("location:index.php");
		
	}
?>

<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>eSCMIS Assessment Tool</title>
                <link rel="shortcut icon" type="image/png" href="images/favicon.png">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	    <style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #000000;
	font-weight: bold;
}
.style3 {color:#F00;}
-->
        </style>
</head>
	<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=138232436268573&autoLogAppEvents=1"></script>

		<!-- Header -->
			 <?php
			if(isset($_POST['submit_banner']))
			{
				extract($_POST);
				$exists=0;
				$id=$_GET['comment'];
				$page_content = $_POST['textarea_id'];
				$page_content=mysql_real_escape_string($page_content);
				$SelQuery="select * FROM escmis_comments where cnt='".$id."'";
		    	$ex_query=mysql_query($SelQuery);
				while($amazon=mysql_fetch_array($ex_query))
				{
				   //Comment Exists
				   $exists=1;
				   $sql="UPDATE escmis_comments set comments='".$page_content."' where CNT='".$id."'";
				   $sqlresult=mysql_query($sql);
				   header("location:allwork.php");
				}
				if($exists==0)
				{
					//Do a new insert here
					$sqlInsert = "INSERT INTO escmis_comments(CNT,comments) values ('".$id."','".$page_content."')";
					
				$result = mysql_query($sqlInsert) or die (mysql_error());
					
					//HERE EMAIL
					
					//Here Send email to user
					$sql1="select * from  escmis_email_templates where t_id=2";
					$template=mysql_fetch_array(mysql_query($sql1));
					$msg=$template['templates'];
				
					$sql="select * from escmis_admin_settings";
					$from_mail=mysql_fetch_array(mysql_query($sql));
					$adminemail=$from_mail['admin_email'];
					$site_url=$from_mail['siteurl'];
					
					
					$emp1=mysql_query("select * from escmis_custom_requirements where CNT='".$id."'");
					$fetch_emp1=mysql_fetch_array($emp1);
					$userid=$fetch_emp1['USER_ID'];
					
					
					$emp=mysql_query("select * from escmis_user where USER_ID='".$userid."'");
					$fetch_emp=mysql_fetch_array($emp);
					$fname=$fetch_emp['FULLNAME'];
					$email_id=$fetch_emp['EMAIL'];
					
					$from=$from_mail['company_name'];
						
					$url_link="$site_url/comments.php?comment=$id";
					
							
					$email_subject="Give More Details On eSCMIS Requirement";
					$headers .= "From: $from <$adminemail>\r\n";
				
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						   $api=array(
										'$fname'=>$fname,
										'$url_link'=>$url_link,
									   
									   );
					$message=strtr($msg,$api);
		
		   			$mail_cnt=mail($email_id, $email_subject, $message, $headers);
		
							
							
					//HERE EMAIL ENDS
					
					
					header("location:allwork.php");	
				}
				
			}
			?>

		<!-- Banner -->
			<section id="banner">
				<h1>eSCMIS Assessment - June 2020</h1>
                <h1>Requirements Gathering Tool</h1>
				<p style="color:#FFCC00">Electronic Supply Chain Management Information System</p>
                <?PHP
					include 'menu1.php';
				?>
                <p style="color:#FFCC00">Welcome <b style="color:#FFCC00"><?php echo $_SESSION['FNAME'];?> </b> - Date: <a href="allwork.php" class="urllink"><?php echo date('Y-m-d'); ?></a></p>
                
                
			</section>
			 
			
           
	
 				<?php
                $requirement=$_GET['comment'];
				//$SelQuery="select * FROM escmis_custom_requirements r, escmis_comments c WHERE r.cnt=c.cnt and c.cnt='".$requirement."'";
				$SelQuery="select * FROM escmis_custom_requirements where cnt='".$requirement."'";
		    	$ex_query=mysql_query($SelQuery);
				while($amazon=mysql_fetch_array($ex_query))
				{
					?>
                    	<section id="one" class="wrapper">
                        <div class="inner">
                            <div class="flex flex-3">
                        <article>
                        </article>
                        <article>
							<header>
								<div>
                                <h3><?php echo $amazon['AS_A']." ".$amazon['SO_THAT'];?></h3>
                                </div>
							</header>
                    	</article>
                        <article>
                        </article>
                        </div>
                        </div>
                        </section>
                        
                    <?php
				}
    				$requirement=$_GET['comment'];
    	        ?>
		<form action="" method="post" name="form" id="form" enctype="multipart/form-data">
    <p align="center" class="style2"><a href="requirements.php?edit=<?php echo $requirement;?>" class="urllink" target="_blank">View Other Parts of this Requirement</a></p>
	
    <p align="center" class="style2">Below are the comments for the selected Requirement!!
	<?php
				
				
				$SelQuery="select * FROM escmis_custom_requirements r, escmis_comments c WHERE r.cnt=c.cnt and c.cnt='".$requirement."'";
				//$SelQuery="select * FROM escmis_custom_requirements where cnt='".$requirement."'";
		    	$ex_query=mysql_query($SelQuery);
				while($amazon=mysql_fetch_array($ex_query))
				{
					$comments=$amazon['comments'];
				}
				// Include the CKEditor class.
				include_once "ckeditor/ckeditor.php";
				
				// Create a class instance.
				$CKEditor = new CKEditor();
				
				// Path to the CKEditor directory.
				$CKEditor->basePath = '/ckeditor/';
				
				// Set global configuration (used by every instance of CKEditor).
				$CKEditor->config['width'] = 820;
				$CKEditor->config['height'] = 370;
				// Change default textarea attributes.
				$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);							
				// Create the first instance.
				$CKEditor->editor("textarea_id", $comments);
				
				
	?>
			</p>
            <p align="center"><input name="submit_banner" type="submit"  value="Update Comment" class="button"/></p>
            </form>
            
    <section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>Republic of Zambia</h2>
						<p>MINISTRY OF HEALTH</p>
					</header>
					<div class="flex flex-4">
						<div class="box person">
							<div class="image" align="center">
								<img src="images/pic03.jpg" alt="Person 1" width="140" height="140" align="middle" />
							</div>
							<h3>National</h3>
							<p></p>
						</div>
						<div class="box person">
							<div class="image round">
								<img src="images/pic04.jpg" alt="Person 2" width="140" height="140"/>
							</div>
							<h3>Provincial</h3>
							<p></p>
						</div>
						<div class="box person">
							<div class="image round">
								<img src="images/pic05.jpg" alt="Person 3" width="140" height="140"/>
							</div>
							<h3>District</h3>
							<p></p>
						</div>
						<div class="box person">
							<div class="image round">
								<img src="images/pic06.jpg" alt="Person 4" width="140" height="140"/>
							</div>
							<h3>SDP</h3>
							<p></p>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
		
		<!-- Footer -->
			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>