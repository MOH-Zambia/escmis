<?PHP
	session_start();
	require_once('config.php');
	require_once('DBConnectivity.php');


	if($_GET['task']=="update")
	
	{
		include "update.php";
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
			

		<!-- Banner -->
			<section id="banner">
				<h1>eSCMIS Assessment - June 2020</h1>
                <h1>Requirements Gathering Tool</h1>
				<p style="color:#FFCC00">Electronic Supply Chain Management Information System</p>
                <?php
			   if(isset($_GET["logout"])=="1")
				{
					$_SESSION['FNAME'] = "";
					$_SESSION['TOKEN'] = "";
					$_SESSION['EMAIL'] = "";
					session_unset();
					session_destroy();
					
				}
				?>
				<?PHP
                $user_type=$_SESSION['EMAIL'];
                if($user_type=="")
                {
                    //include 'menu.php';
                    
                }else
				{				
					include 'menu1.php';
				?>
                <p style="color:#FFCC00">Welcome <b style="color:#FFCC00"><?php echo $_SESSION['FNAME'];?> </b></p>
                <?php
				}
				?>
                
			</section>
			 <p>&nbsp;</p>
             <?php
			if(isset($_GET["res"])=="fail")
			{
			?>
				<p align="center" class="style3">ERROR! Invalid Username or Password!! </p>

			<?php
			}
			?>
			
			
            
			
	<p align="center" class="style2">A well designed information system is based on a well thought out architecture. </p>			
  <!--<form action="" method="post" name="form" id="form" enctype="multipart/form-data">-->
  <form enctype="multipart/form-data" action="user_controller.php?action=login" method="post">
                        
            <section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
						</article>
						
						<article>
												
							<div>
                            
							<h3 align="center">Login or <a href="signup.php"> SignUp </a> </h3>
							
						<p align="center"><label>Enter UserName:</label> <input name="username" id="username" type="text" class="cls_text_form required" value="" style="width:300px"/></p>
						<p align="center"><label>Enter Password:</label> <input name="password" id="password" type="password" class="cls_text_form required" value="" style="width:300px"/></p>
						                  
                            </div>
							<p align="center"><input align="left" name="submit" type="submit"  value="Sign In here" class="button special"/></p>	
                            
						</article>
						<article>
						</article>
					</div>
				</div>
			</section>

						
						</form>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>Republic of Zambia</h2>
						<p>MINISTRY OF HEALTH</p>
					</header>
					<div class="flex flex-4">
						<div class="box person">
							<div class="image">
								<img src="images/pic03.jpg" alt="Person 1" width="140" height="140" />
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
			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>