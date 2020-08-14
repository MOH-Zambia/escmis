<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>eSCMIS Assessment Tool</title>
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
                
			</section>
			 <p>&nbsp;</p>
			<?php
			if(isset($_GET["story"])=="no")
			{
			?>
				<p align="center" class="style3">ERROR! You Forgot To Enter Your STORY!! </p>

			<?php
			}
			?>
            <?php
			if(isset($_GET["actor"])=="no")
			{
			?>
				<p align="center" class="style3">ERROR! You Forgot To Select the ACTOR!! </p>

			<?php
			}
			?>
             <?php
			if(isset($_GET["description"])=="no")
			{
			?>
				<p align="center" class="style3">ERROR! You did NOT enter the DESCRIPTION!! </p>

			<?php
			}
			?>
              <?php
			if(isset($_GET["priority"])=="no")
			{
			?>
				<p align="center" class="style3">OOPS! What's the PRIORITY of this Requirement? </p>

			<?php
			}
			?>
            <?php
			if(isset($_POST['submit']))
			{
            	extract($_POST);
				$two="";
				$four="";
				$three="";
				//Get describesyou
				if(isset($orders)){
					$two=$orders;
				}
				if(isset($somethinggreat)){
					$two=$two.'*'.$somethinggreat;
				}
				if(isset($fulltimejob)){
					$two=$two.'*'.$fulltimejob;
				}
				if(isset($extraincome)){
					$two=$two.'*'.$extraincome;
				}
				//Get describesfin
				if(isset($onesource)){
					$four=$onesource;
				}
				if(isset($moresources)){
					$four=$four.'*'.$moresources;
				}
				if(isset($nosources)){
					$four=$four.'*'.$nosources;
				}
				if(isset($haveenough)){
					$four=$four.'*'.$haveenough;
				}
				//Get BizBooks
				if(isset($fin)){
					$three=$fin;
				}
				header("location:thankyou.php?story=$story&actor=$actor&priority=$priority&description=$description");
			}
			?>
			<p align="center" class="style2">A well designed information system is based on a well thought out architecture. </p>
			<p align="center" class="style2">Please fill out this form, thoroughly describing the requirements you wish to see in the new eSCMIS System!!</p>

  <form action="" method="post" name="form" id="form" enctype="multipart/form-data">

	<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>1. Select Functional Domain</h3>
							</header>
														
							<div>
							  <select name="domain" id="domain" class="myshipper">
                                <option value="">--Select Functional Domain Here --</option>
                                <option value="eBook"  <?php if( $fetch_profile['domain']=='community') { ?> selected="selected" <?php } ?>>Community Services</option>
                                <option value="Video"  <?php if( $fetch_profile['domain']=='facility') { ?> selected="selected" <?php } ?>>Facility Services</option>
                                <option value="Audio"  <?php if( $fetch_profile['domain']=='lab') { ?> selected="selected" <?php } ?>>Laboratory Services</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['domain']=='hr') { ?> selected="selected" <?php } ?>>Human Resources (HR)</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['domain']=='supplychain') { ?> selected="selected" <?php } ?>>Supply Chain</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['domain']=='managementplanning') { ?> selected="selected" <?php } ?>>Management Planning</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['domain']=='knowledgeinfo') { ?> selected="selected" <?php } ?>>Knowledge & Information</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['domain']=='equipmentman') { ?> selected="selected" <?php } ?>>Equipment Management</option>
                             </select>
							</div>
                        </article>
						
						<article>
							<header>
								<h3>2. Actor / Your Role</h3>
							</header>
														
							<div>
							  <select name="actor" id="actor" class="myshipper">
                                <option value="">--Select Role Here --</option>
                                <option value="eBook"  <?php if( $fetch_profile['actor']=='districtpharmacist') { ?> selected="selected" <?php } ?>>District Pharmacist</option>
                                <option value="Video"  <?php if( $fetch_profile['actor']=='facilitypharmacist') { ?> selected="selected" <?php } ?>>Facility Pharmacist</option>
                                <option value="Audio"  <?php if( $fetch_profile['actor']=='facpharmtech') { ?> selected="selected" <?php } ?>>Facility Pharm Tech</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['actor']=='facincharge') { ?> selected="selected" <?php } ?>>Facility in-charge</option>
                             </select>
							</div>
							
						</article>
						<article>
                        	<header>
								<h3>3. Select Business Process</h3>
							</header>
														
							<div>
							  <select name="businessprocess" id="businessprocess" class="myshipper">
                                <option value="">--Select Business Process Here --</option>
                                <option value="eBook"  <?php if( $fetch_profile['businessprocess']=='patientreg') { ?> selected="selected" <?php } ?>>Patient Registration</option>
                                <option value="Video"  <?php if( $fetch_profile['businessprocess']=='hivtesting') { ?> selected="selected" <?php } ?>>HIV Testing</option>
                                <option value="Audio"  <?php if( $fetch_profile['businessprocess']=='dispensing') { ?> selected="selected" <?php } ?>>Dispensing</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='latestresults') { ?> selected="selected" <?php } ?>>LAB Test Result Reporting</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='supplychain') { ?> selected="selected" <?php } ?>>Requisition</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='managementplanning') { ?> selected="selected" <?php } ?>>Receiving</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='knowledgeinfo') { ?> selected="selected" <?php } ?>>Storage</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='equipmentman') { ?> selected="selected" <?php } ?>>Dispatch</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='transport') { ?> selected="selected" <?php } ?>>Transport</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='forcasting') { ?> selected="selected" <?php } ?>>Forecasting & Quantification</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='drugregistration') { ?> selected="selected" <?php } ?>>Drug Registration</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='drugimportexport') { ?> selected="selected" <?php } ?>>Drug Import & Export</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='drugtraceability') { ?> selected="selected" <?php } ?>>Drug Traceability (GS1)</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='training') { ?> selected="selected" <?php } ?>>Training</option>
                                <option value="AmazonBook"  <?php if( $fetch_profile['businessprocess']=='other') { ?> selected="selected" <?php } ?>>Other...</option>
                             </select>
                             
							</div>
						</article>
					</div>
				</div>
			</section>

            
            <!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>4. As a......</h3>
						    
							<div>
							  <textarea id="story" name="story" rows="8" cols="50"></textarea>
                           	</div>
							
							</header>							
							
						</article>
						
						<article>
							<header>
								<h3>5. Description</h3>
                                <textarea id="description" name="description" rows="8" cols="50"></textarea>
                             </header>
						</article>
						<article>
							<header>
								<h3>6. Priority</h3>
                               
							</header>
							<div>
							  <select name="priority" id="priority" class="myshipper">
                                <option value="">--Select Priority --</option>
                                
                                <option value="high"  <?php if( $fetch_profile['priority']=='high') { ?> selected="selected" <?php } ?>> High </option>
                                <option value="medium"  <?php if( $fetch_profile['priority']=='medium') { ?> selected="selected" <?php } ?>> Medium </option>
                                <option value="low"  <?php if( $fetch_profile['priority']=='low') { ?> selected="selected" <?php } ?>> Low </option>
                                
                             </select>
							</div>
                            <header>
                            <p></p>
                            <h3>7. Frequency of Transaction</h3>
							</header>
                            <div>
							  <select name="frequency" class="myshipper">
                                <option value="">--Select Frequency --</option>
                                
                                <option value="high"  <?php if( $fetch_profile['frequency']=='monthly') { ?> selected="selected" <?php } ?>> Monthly </option>
                                <option value="medium"  <?php if( $fetch_profile['frequency']=='daily') { ?> selected="selected" <?php } ?>> Daily </option>
                                <option value="low"  <?php if( $fetch_profile['frequency']=='quarterly') { ?> selected="selected" <?php } ?>> Quarterly </option>
                                
                             </select>
							</div>
						</article>
					</div>
				</div>
			</section>
						
                        
            <section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
						</article>
						
						<article>
							<header>
								<h3>8. Acceptance Criteria</h3>
							</header>
														
							<div>
							 <div>
							  <input type="checkbox" id="excel" name="excel" value="excel">
							  <label for="excel">Should Export to Excel</label>
							</div>
							<div>
							  <input type="checkbox" id="pdf" name="pdf" value="pdf">
							  <label for="pdf">Should Export to PDF..</label>
							</div>
							<h3>Other...</h3>
                                <textarea id="description" rows="3" cols="50"></textarea>
                            
                            <p align="center" style="color:#0066FF"><h3 align="center">9. Enter Your Details Now!! </h3></p>
						<p align="center"><label>Enter Your Name:</label> <input name="names" id="names" type="text" class="cls_text_form required" value="" style="width:300px"/></p>
						<p align="center"><label>Enter Your EMail:</label> <input name="email" id="email" type="text" class="cls_text_form required" value="" style="width:300px"/></p>
						                  
                            </div>
							
						</article>
						<article>
						</article>
					</div>
				</div>
			</section>

						<p align="center"><input align="left" name="submit" type="submit"  value="Update My Requirement Now" class="button special"/></p>	
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