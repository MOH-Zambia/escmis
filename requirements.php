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
			

		<!-- Banner -->
			<section id="banner">
				<h1>eSCMIS Assessment - June 2020</h1>
                <h1>Requirements Gathering Tool</h1>
				<p style="color:#FFCC00">Electronic Supply Chain Management Information System</p>
                <?PHP
					include 'menu1.php';
				?>
                <p style="color:#FFCC00">Welcome <b style="color:#FFCC00"><?php echo $_SESSION['FNAME'];?> </b> - Date: <a href="allwork.php" class="urllink"><?php echo date('Y-m-d'); ?></a> </p>
                
                
			</section>
			 <p>&nbsp;</p>
			
            <?php
			if($_GET['story']=="fail")
			{
			?>
            	<p align="center" class="style3">ERROR! Please Fill-in ALL the Fields!!</p>
            <?php	
			}
			
			if(isset($_POST['submit']))
			{
            	extract($_POST);
				$functionaldomain=$_POST['functionaldomain'];
				$actor=$_POST['actor'];
				$businessprocess=$_POST['businessprocess'];
				$whererelevant=$_POST['whererelevant'];
				$asa="As a ".$_POST['asa'];
				$sothat=" so that ".$_POST['sothat'];
				$priority=$_POST['priority'];
				$frequency=$_POST['frequency'];
				$excel=$_POST['excel'];
				$pdf=$_POST['pdf'];
				$othercriteria=$_POST['othercriteria'];
				
				if($functionaldomain=="")
				{
				?>
					
                <?php
					header("location:requirements.php?story=fail");	
					
				}else
				{
					if(isset($_GET['edit']))
					{
						$edit=  $_GET['edit'];
						$sql="UPDATE escmis_custom_requirements set FUNCTIONAL_DOMAIN='".$functionaldomain."',ACTOR='".$actor."',BUSINESS_PROCESS='".$businessprocess."',WHERE_RELEVANT='".$whererelevant."',AS_A='".$asa."',SO_THAT='".$sothat."',PRIORITY='".$priority."',FREQUENCY='".$frequency."',EXPORT_EXCEL='".$excel."',EXPORT_PDF='".$pdf."',OTHER_CRITERIA='".$othercriteria."' where CNT='".$edit."'";
						$sqlresult=mysql_query($sql);
						header("location:mywork.php");
					}else 
					{
				
					$sqlInsert = "INSERT INTO escmis_custom_requirements(USER_ID,EMAIL,FUNCTIONAL_DOMAIN,ACTOR,BUSINESS_PROCESS,WHERE_RELEVANT,AS_A,SO_THAT,PRIORITY,FREQUENCY,EXPORT_EXCEL,EXPORT_PDF,OTHER_CRITERIA,REG_DATE) values ('".$_SESSION['TOKEN']."','".$_SESSION['EMAIL']."','".$functionaldomain."','".$actor."','".$businessprocess."','".$whererelevant."','".$asa."','".$sothat."','".$priority."','".$frequency."','".$excel."','".$pdf."','".$othercriteria."','".date('Y-m-d H:i:s')."')";
					
				$result = mysql_query($sqlInsert) or die (mysql_error());
					header("location:requirements.php?story=success");
					}
				
				}
				
				
			}
			?>
			<?php
            $edit=  $_GET['edit'];
			if(isset($_GET['repeat']))
			{
				$edit=  $_GET['repeat'];
			}
            $profile=mysql_query("select *from  escmis_custom_requirements where CNT='$edit'");
            $fetch_profile=mysql_fetch_array($profile);
            ?>
            
            
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
							  <select name="functionaldomain" id="functionaldomain" class="myshipper">
                                <option value="">--Select Functional Domain Here --</option>
                                <option value="Community Services"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Community Services') { ?> selected="selected" <?php } ?>>Community Services</option>
                                <option value="Facility Services"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Facility Services') { ?> selected="selected" <?php } ?>>Facility Services</option>
                                <option value="Laboratory Services"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Laboratory Services') { ?> selected="selected" <?php } ?>>Laboratory Services</option>
                                <option value="Human Resources"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Human Resources') { ?> selected="selected" <?php } ?>>Human Resources (HR)</option>
                                <option value="Supply Chain"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Supply Chain') { ?> selected="selected" <?php } ?>>Supply Chain</option>
                                <option value="Management Planning"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Management Planning') { ?> selected="selected" <?php } ?>>Management Planning</option>
                                <option value="Knowledge And Information"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Knowledge And Information') { ?> selected="selected" <?php } ?>>Knowledge & Information</option>
                                <option value="Equipment Management"  <?php if( $fetch_profile['FUNCTIONAL_DOMAIN']=='Equipment Management') { ?> selected="selected" <?php } ?>>Equipment Management</option>
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
                                <option value="District Pharmacist"  <?php if( $fetch_profile['ACTOR']=='District Pharmacist') { ?> selected="selected" <?php } ?>>District Pharmacist</option>
                                <option value="Facility Pharmacist"  <?php if( $fetch_profile['ACTOR']=='Facility Pharmacist') { ?> selected="selected" <?php } ?>>Facility Pharmacist</option>
                                <option value="Facility Pharm Tech"  <?php if( $fetch_profile['ACTOR']=='Facility Pharm Tech') { ?> selected="selected" <?php } ?>>Facility Pharm Tech</option>
                                <option value="Facility in-charge"  <?php if( $fetch_profile['ACTOR']=='Facility in-charge') { ?> selected="selected" <?php } ?>>Facility in-charge</option>
                                <option value="Lab Bio-Medical Scientist"  <?php if( $fetch_profile['ACTOR']=='Lab Bio-Medical Scientist') { ?> selected="selected" <?php } ?>>Lab Bio-Medical Scientist</option>
                                <option value="Lab Technician"  <?php if( $fetch_profile['ACTOR']=='Lab Technician') { ?> selected="selected" <?php } ?>>Lab Technician</option>
                                 <option value="Logistician"  <?php if( $fetch_profile['ACTOR']=='Logistician') { ?> selected="selected" <?php } ?>>Logistician</option>
                                  <option value="Partner"  <?php if( $fetch_profile['ACTOR']=='Partner') { ?> selected="selected" <?php } ?>>Partner</option>
                                  <option value="Donor"  <?php if( $fetch_profile['ACTOR']=='Donor') { ?> selected="selected" <?php } ?>>Donor</option>
                                  <option value="Hub Manager"  <?php if( $fetch_profile['ACTOR']=='Hub Manager') { ?> selected="selected" <?php } ?>>Hub Manager</option>
                                  <option value="Program Manager"  <?php if( $fetch_profile['ACTOR']=='Program Manager') { ?> selected="selected" <?php } ?>>Program Manager</option>
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
                                <option value="Patient Registration"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Patient Registration') { ?> selected="selected" <?php } ?>>Patient Registration</option>
                                <option value="HIV Testing"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='HIV Testing') { ?> selected="selected" <?php } ?>>HIV Testing</option>
                                <option value="Dispensing"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Dispensing') { ?> selected="selected" <?php } ?>>Dispensing</option>
                                <option value="LAB Test Result Reporting"  <?php if( $fetch_profile['businessprocess']=='LAB Test Result Reporting') { ?> selected="selected" <?php } ?>>LAB Test Result Reporting</option>
                                <option value="Requisition"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Requisition') { ?> selected="selected" <?php } ?>>Requisition</option>
                                <option value="Receiving"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Receiving') { ?> selected="selected" <?php } ?>>Receiving</option>
                                <option value="Storage"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Storage') { ?> selected="selected" <?php } ?>>Storage</option>
                                <option value="Dispatch"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Dispatch') { ?> selected="selected" <?php } ?>>Dispatch</option>
                                <option value="Transport"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Transport') { ?> selected="selected" <?php } ?>>Transport</option>
                                <option value="Forecasting & Quantification"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Forecasting & Quantification') { ?> selected="selected" <?php } ?>>Forecasting & Quantification</option>
                                <option value="Drug Registration"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Drug Registration') { ?> selected="selected" <?php } ?>>Drug Registration</option>
                                <option value="Drug Import & Expor"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Drug Import & Expor') { ?> selected="selected" <?php } ?>>Drug Import & Export</option>
                                <option value="Drug Traceability (GS1)"  <?php if( $fetch_profile['businessprocess']=='Drug Traceability (GS1)') { ?> selected="selected" <?php } ?>>Drug Traceability (GS1)</option>
                                <option value="Training"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Training') { ?> selected="selected" <?php } ?>>Training</option>
                                <option value="Other"  <?php if( $fetch_profile['BUSINESS_PROCESS']=='Other') { ?> selected="selected" <?php } ?>>Other...</option>
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
                        </article>
                        <article>
							<header>
								<h3>4. Where in the Supply Chain would this Requirement be Relevant?</h3>
            
							</header>
                            <div>
							  <select name="whererelevant" class="myshipper">
                                <option value="">--Select From Dropdown List--</option>
                                
                                <option value="National"  <?php if( $fetch_profile['WHERE_RELEVANT']=='National') { ?> selected="selected" <?php } ?>> National </option>
                                <option value="Provincial"  <?php if( $fetch_profile['WHERE_RELEVANT']=='Provincial') { ?> selected="selected" <?php } ?>> Provincial </option>
                                <option value="Hub"  <?php if( $fetch_profile['WHERE_RELEVANT']=='Hub') { ?> selected="selected" <?php } ?>> Hub </option>
                                <option value="District"  <?php if( $fetch_profile['WHERE_RELEVANT']=='District') { ?> selected="selected" <?php } ?>> District </option>
                                <option value="Health Facility / Service Delivery Point"  <?php if( $fetch_profile['WHERE_RELEVANT']=='Health Facility / Service Delivery Point') { ?> selected="selected" <?php } ?>> Health Facility / Service Delivery Point </option>
                              <option value="Community"  <?php if( $fetch_profile['WHERE_RELEVANT']=='Community') { ?> selected="selected" <?php } ?>> Community </option>
                             </select>
            
            			</div>
						</article>
                        <article>
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
								<h3>5. As a......</h3>
						    
							<div>
							  <textarea id="asa" name="asa" rows="8" cols="50" ><?php echo substr($fetch_profile['AS_A'],5);?> </textarea>
                           	</div>
							
							</header>							
							
						</article>
						
						<article>
							<header>
								<h3>6. So that...</h3>
                                <textarea id="sothat" name="sothat" rows="8" cols="50"><?php echo substr($fetch_profile['SO_THAT'],8);?></textarea>
                             </header>
						</article>
						<article>
							<header>
								<h3>7. Priority</h3>
                               
							</header>
							<div>
							  <select name="priority" id="priority" class="myshipper">
                                <option value="">--Select Priority --</option>
                                
                                <option value="High"  <?php if( $fetch_profile['PRIORITY']=='High') { ?> selected="selected" <?php } ?>> High </option>
                                <option value="Medium"  <?php if( $fetch_profile['PRIORITY']=='Medium') { ?> selected="selected" <?php } ?>> Medium </option>
                                <option value="Low"  <?php if( $fetch_profile['PRIORITY']=='Low') { ?> selected="selected" <?php } ?>> Low </option>
                                
                             </select>
							</div>
                            <header>
                            <p></p>
                            <h3>8. Frequency of Transaction</h3>
							</header>
                            <div>
							  <select name="frequency" class="myshipper">
                                <option value="">--Select Frequency --</option>
                                
                                <option value="Monthly"  <?php if( $fetch_profile['FREQUENCY']=='Monthly') { ?> selected="selected" <?php } ?>> Monthly </option>
                                <option value="Daily"  <?php if( $fetch_profile['FREQUENCY']=='Daily') { ?> selected="selected" <?php } ?>> Daily </option>
                                <option value="Quarterly"  <?php if( $fetch_profile['FREQUENCY']=='Quarterly') { ?> selected="selected" <?php } ?>> Quarterly </option>
                                
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
								<h3>9. Acceptance Criteria</h3>
							</header>
														
							<div>
							 
                             
                              <div>
							   <?php
                             	$pos = strpos($fetch_profile['EXPORT_EXCEL'], "excel");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="excel" name="excel" value="excel">
							    <?php
								}else
								{
								?>
                             	<input type="checkbox" id="excel" name="excel" value="excel" checked>
								<?php	
								}
                              ?>
                               <label for="excel">Should Export to Excel</label>
							 </div>		
                                
                             
                             <div>
							   <?php
                             	$pos = strpos($fetch_profile['EXPORT_PDF'], "pdf");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="pdf" name="pdf" value="pdf">
							    <?php
								}else
								{
								?>
                             	<input type="checkbox" id="pdf" name="pdf" value="pdf" checked>
								<?php	
								}
                              ?>
                               <label for="pdf">Should Export to PDF..</label>
							 </div>		
							
                            
							<h3>Other...<em style="font-size:12px; color:#FF3300; font-weight:bold";>Give more detail about your Requirement</em></h3>
                                <textarea id="othercriteria" name="othercriteria" rows="3" cols="50"><?php echo $fetch_profile['OTHER_CRITERIA'];?></textarea>
                                                    
						                  
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