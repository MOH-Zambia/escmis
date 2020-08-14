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
        <link href="assets/css/pagination.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/grey.css" rel="stylesheet" type="text/css" />
	    <style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #000000;
	font-weight: bold;
}
.style3 {color:#F00;}
-->
        
     table {
		border-collapse:separate;
		border:solid #60CCCC 1px;
		border-radius:6px;
		-moz-border-radius:6px;
		width:85%;
		
		
		}
	
	td, th {
		border-left:#60C8F2;
		border-top:#60C8F2;
		color:#333;
		alignment-adjust:top;
		text-align:left;
		
	}
	
	th {
		background-color: #60C8F2;
		border-top: none;
		height:30px;
		vertical-align:top;
		
	}
	
	td:first-child, th:first-child {
		 border-left: none;
		 color:#333;
	}
      table tr:hover td {
  background-color: #dde9ed !important
}  
        
		b.urllinkb
			{
				text-decoration: none;
				color:#F00;
				font-size:14px;
				font-weight:normal;
			}
		
		
        a.urllinka
			{
				text-decoration: none;
				color:#666;
				font-size:14px;
			}
			
			 a.urllinka:hover
			 {
				text-decoration: underline;
				color:#FF9933;
			 }    
			
                
			a.urllink
			{
				text-decoration: none;
				color:#99F;
				font-size:14px;
			}
			
			 a.urllink:hover
			 {
				text-decoration: underline;
				color:#FF9933;
			 }    
        
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
			
           <?PHP
		   			$filters=0;
					if(isset($_POST['submit']) or isset($_GET["page"]))
					{
						$filters=1;
						extract($_POST);
						$functionaldomain=$_POST['functionaldomain'];
						$actor=$_POST['actor'];
						$businessprocess=$_POST['businessprocess'];
						$province=$_POST['province'];
						$priority=$_POST['priority'];
						
						if($functionaldomain!="")
						{
							$myStr=" and e.FUNCTIONAL_DOMAIN='".$functionaldomain."'";
						}
						if($actor!="")
						{
							$myStr=$myStr." and e.ACTOR='".$actor."'";
						}
						if($businessprocess!="")
						{
							$myStr=$myStr." and e.BUSINESS_PROCESS='".$businessprocess."'";
						}
						if($province!="")
						{
							$myStr=$myStr." and u.PROVINCE='".$province."'";
						}
						if($priority!="")
						{
							$myStr=$myStr." and e.PRIORITY='".$priority."'";
						}
						if($duplicatefilter!="")
						{
							$myStr=$myStr." and e.DUPLICATE='".$duplicatefilter."'";
						}
						//header("location:requirements.php?story=fail");
						//echo "My STRIN= ".$myStr;
					}
					
										
					include_once ('function.php');
					$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
					$limit =50;
					$startpoint = ($page * $limit) - $limit;
                    $statement="escmis_custom_requirements e, escmis_user u where u.user_id=e.user_id";
                  	$SelQuery3="select * FROM escmis_custom_requirements e, escmis_user u where u.user_id=e.user_id";
		    		$ex_query3=mysql_query($SelQuery3);
					
					if($filters==0)
					{
						$num_rows=mysql_num_rows($ex_query3);
						$SelQuery="select * FROM escmis_custom_requirements e, escmis_user u where u.user_id=e.user_id order by CNT desc LIMIT {$startpoint} , {$limit}";
					}else
					{
						
						$SelQuery="select * FROM escmis_custom_requirements e, escmis_user u where u.user_id=e.user_id ".$myStr." order by CNT desc";
					   					
					}
					$ex_query=mysql_query($SelQuery);
					if($filters!=0)
					{
						$num_rows=mysql_num_rows($ex_query);
					}
					//$amazon4=mysql_fetch_array($ex_query)
					//echo "MyQuery=".$SelQuery;
			?>
	
    <form action="" method="post" name="formfilter" id="formfilter" enctype="multipart/form-data">
    <p align="center" class="style2">These are the Custom Requirements participants have managed to create so far!</p>
				
                <section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>1. Select Functional Domain Filter</h3>
							</header>
														
							<div>
							  <select name="functionaldomain" id="functionaldomain" class="myshipper">
                                <option value="">--Select Functional Domain Here --</option>
                                <option value="Community Services"  <?php if($functionaldomain=='Community Services') { ?> selected="selected" <?php } ?>>Community Services</option>
                                <option value="Facility Services"  <?php if( $functionaldomain=='Facility Services') { ?> selected="selected" <?php } ?>>Facility Services</option>
                                <option value="Laboratory Services"  <?php if( $functionaldomain=='Laboratory Services') { ?> selected="selected" <?php } ?>>Laboratory Services</option>
                                <option value="Human Resources"  <?php if( $functionaldomain=='Human Resources') { ?> selected="selected" <?php } ?>>Human Resources (HR)</option>
                                <option value="Supply Chain"  <?php if( $functionaldomain=='Supply Chain') { ?> selected="selected" <?php } ?>>Supply Chain</option>
                                <option value="Management Planning"  <?php if( $functionaldomain=='Management Planning') { ?> selected="selected" <?php } ?>>Management Planning</option>
                                <option value="Knowledge And Information"  <?php if( $functionaldomain=='Knowledge And Information') { ?> selected="selected" <?php } ?>>Knowledge & Information</option>
                                <option value="Equipment Management"  <?php if( $functionaldomain=='Equipment Management') { ?> selected="selected" <?php } ?>>Equipment Management</option>
                             </select>
							</div>
                             <p>&nbsp;</p>
                            <header>
								<h3>4. Select Province Filter</h3>
							</header>
														
							<div>
                            	  <p align="center">
                                 <select name="province" id="province" class="myprovince">
                                    <option value="">--Select Province Here --</option>
                                    <option value="Copperbelt"  <?php if($province=='Copperbelt') { ?> selected="selected" <?php } ?>>Copperbelt</option>
                                    <option value="Western"  <?php if($province=='Western') { ?> selected="selected" <?php } ?>>Western</option>
                                    <option value="NorthWestern"  <?php if($province=='NorthWestern') { ?> selected="selected" <?php } ?>>North Western</option>
                                    <option value="Luapula"  <?php if($province=='Luapula') { ?> selected="selected" <?php } ?>>Luapula</option>
                                    <option value="Northern"  <?php if($province=='Northern') { ?> selected="selected" <?php } ?>>Northern</option>
                                    <option value="Muchinga"  <?php if($province=='Muchinga') { ?> selected="selected" <?php } ?>>Muchinga</option>
                                    <option value="Eastern"  <?php if($province=='Eastern') { ?> selected="selected" <?php } ?>>Eastern</option>
                                    <option value="Central"  <?php if($province=='Central') { ?> selected="selected" <?php } ?>>Central</option>
                                    <option value="Lusaka"  <?php if($province=='Lusaka') { ?> selected="selected" <?php } ?>>Lusaka</option>
                                  <option value="Southern"  <?php if($province=='Southern') { ?> selected="selected" <?php } ?>>Southern</option>
                                 </select>
							 
                            </p>
                            </div>
                            
                            
                        </article>
						
						<article>
							<header>
								<h3>2. Select Actor Filter</h3>
							</header>
														
							<div>
							  <select name="actor" id="actor" class="myshipper">
                                <option value="">--Select Role Here --</option>
                                <option value="District Pharmacist"  <?php if($actor=='District Pharmacist') { ?> selected="selected" <?php } ?>>District Pharmacist</option>
                                <option value="Facility Pharmacist"  <?php if($actor=='Facility Pharmacist') { ?> selected="selected" <?php } ?>>Facility Pharmacist</option>
                                <option value="Facility Pharm Tech"  <?php if($actor=='Facility Pharm Tech') { ?> selected="selected" <?php } ?>>Facility Pharm Tech</option>
                                <option value="Facility in-charge"  <?php if($actor=='Facility in-charge') { ?> selected="selected" <?php } ?>>Facility in-charge</option>
                                <option value="Lab Bio-Medical Scientist"  <?php if($actor=='Lab Bio-Medical Scientist') { ?> selected="selected" <?php } ?>>Lab Bio-Medical Scientist</option>
                                <option value="Lab Technician"  <?php if($actor=='Lab Technician') { ?> selected="selected" <?php } ?>>Lab Technician</option>
                                 <option value="Logistician"  <?php if($actor=='Logistician') { ?> selected="selected" <?php } ?>>Logistician</option>
                                  <option value="Partner"  <?php if($actor=='Partner') { ?> selected="selected" <?php } ?>>Partner</option>
                                  <option value="Donor"  <?php if($actor=='Donor') { ?> selected="selected" <?php } ?>>Donor</option>
                                  <option value="Hub Manager"  <?php if($actor=='Hub Manager') { ?> selected="selected" <?php } ?>>Hub Manager</option>
                                  <option value="Program Manager"  <?php if($actor=='Program Manager') { ?> selected="selected" <?php } ?>>Program Manager</option>
                             </select>
							
                            </div>
							  <p>&nbsp;</p>
                              <header>
								<h3>5. Select Duplicate Filter</h3>
                               
							</header>
							<div>
							  <select name="duplicatefilter" id="duplicatefilter" class="myshipper">
                                <option value="">--Select Duplicate --</option>
                                
                                <option value="duplicate"  <?php if($duplicatefilter=='duplicate') { ?> selected="selected" <?php } ?>> Duplicates </option>
                                <option value="0"  <?php if($duplicatefilter=="0") { ?> selected="selected" <?php } ?>> Non Duplicates </option>                                
                             </select>
							</div>
                             
                             
                             <p>&nbsp;</p>
                             <p align="center"><input align="left" name="submit" type="submit"  value="Run Filtered Report" class="button special"/></p>	
                             
                          
						</article>
                        
						<article>
                        	<header>
								<h3>3. Select Business Process Filter</h3>
							</header>
														
							<div>
							  <select name="businessprocess" id="businessprocess" class="myshipper">
                                <option value="">--Select Business Process Here --</option>
                                <option value="Patient Registration"  <?php if($businessprocess=='Patient Registration') { ?> selected="selected" <?php } ?>>Patient Registration</option>
                                <option value="HIV Testing"  <?php if($businessprocess=='HIV Testing') { ?> selected="selected" <?php } ?>>HIV Testing</option>
                                <option value="Dispensing"  <?php if($businessprocess=='Dispensing') { ?> selected="selected" <?php } ?>>Dispensing</option>
                                <option value="LAB Test Result Reporting"  <?php if($businessprocess=='LAB Test Result Reporting') { ?> selected="selected" <?php } ?>>LAB Test Result Reporting</option>
                                <option value="Requisition"  <?php if($businessprocess=='Requisition') { ?> selected="selected" <?php } ?>>Requisition</option>
                                <option value="Receiving"  <?php if($businessprocess=='Receiving') { ?> selected="selected" <?php } ?>>Receiving</option>
                                <option value="Storage"  <?php if($businessprocess=='Storage') { ?> selected="selected" <?php } ?>>Storage</option>
                                <option value="Dispatch"  <?php if($businessprocess=='Dispatch') { ?> selected="selected" <?php } ?>>Dispatch</option>
                                <option value="Transport"  <?php if($businessprocess=='Transport') { ?> selected="selected" <?php } ?>>Transport</option>
                                <option value="Forecasting & Quantification"  <?php if($businessprocess=='Forecasting & Quantification') { ?> selected="selected" <?php } ?>>Forecasting & Quantification</option>
                                <option value="Drug Registration"  <?php if($businessprocess=='Drug Registration') { ?> selected="selected" <?php } ?>>Drug Registration</option>
                                <option value="Drug Import & Expor"  <?php if($businessprocess=='Drug Import & Expor') { ?> selected="selected" <?php } ?>>Drug Import & Export</option>
                                <option value="Drug Traceability (GS1)"  <?php if($businessprocess=='Drug Traceability (GS1)') { ?> selected="selected" <?php } ?>>Drug Traceability (GS1)</option>
                                <option value="Training"  <?php if($businessprocess=='Training') { ?> selected="selected" <?php } ?>>Training</option>
                                <option value="Other"  <?php if($businessprocess=='Other') { ?> selected="selected" <?php } ?>>Other...</option>
                             </select>
                             
							</div>
                             <p>&nbsp;</p>
                            <header>
								<h3>6. Select Priority Filter</h3>
                               
							</header>
							<div>
							  <select name="priority" id="priority" class="myshipper">
                                <option value="">--Select Priority --</option>
                                
                                <option value="High"  <?php if($priority=='High') { ?> selected="selected" <?php } ?>> High </option>
                                <option value="Medium"  <?php if($priority=='Medium') { ?> selected="selected" <?php } ?>> Medium </option>
                                <option value="Low"  <?php if($priority=='Low') { ?> selected="selected" <?php } ?>> Low </option>
                                
                             </select>
							</div>
                            
						</article>
					
                    
                    <!--
                    <article>
                        	<header>
								<h3>4. Select Province Filter</h3>
							</header>
														
							<div>
                            	  <p align="center">
                                 <select name="province" id="province" class="myprovince">
                                    <option value="">--Select Province Here --</option>
                                    <option value="Copperbelt"  <?php if($province=='Copperbelt') { ?> selected="selected" <?php } ?>>Copperbelt</option>
                                    <option value="Western"  <?php if($province=='Western') { ?> selected="selected" <?php } ?>>Western</option>
                                    <option value="NorthWestern"  <?php if($province=='NorthWestern') { ?> selected="selected" <?php } ?>>North Western</option>
                                    <option value="Luapula"  <?php if($province=='Luapula') { ?> selected="selected" <?php } ?>>Luapula</option>
                                    <option value="Northern"  <?php if($province=='Northern') { ?> selected="selected" <?php } ?>>Northern</option>
                                    <option value="Muchinga"  <?php if($province=='Muchinga') { ?> selected="selected" <?php } ?>>Muchinga</option>
                                    <option value="Eastern"  <?php if($province=='Eastern') { ?> selected="selected" <?php } ?>>Eastern</option>
                                    <option value="Central"  <?php if($province=='Central') { ?> selected="selected" <?php } ?>>Central</option>
                                    <option value="Lusaka"  <?php if($province=='Lusaka') { ?> selected="selected" <?php } ?>>Lusaka</option>
                                  <option value="Southern"  <?php if($province=='Southern') { ?> selected="selected" <?php } ?>>Southern</option>
                                 </select>
							 
                            </p>
                            </div>
                    </article>
                   
                    <article>
							<header>
								<h3>5. Select Priority Filter</h3>
                               
							</header>
							<div>
							  <select name="priority" id="priority" class="myshipper">
                                <option value="">--Select Priority --</option>
                                
                                <option value="High"  <?php if($priority=='High') { ?> selected="selected" <?php } ?>> High </option>
                                <option value="Medium"  <?php if($priority=='Medium') { ?> selected="selected" <?php } ?>> Medium </option>
                                <option value="Low"  <?php if($priority=='Low') { ?> selected="selected" <?php } ?>> Low </option>
                                
                             </select>
							</div>
                            
                           
                           
                     </article>
                     -->
                     
                    </div>
				</div>
			</section>
                 			
                </form>            
                
                
                
                
                
                
                
                
                <p align="center" class="style2"><?php echo $num_rows ?> Total Requirements Recorded.</p>
                <div align="center">
 				<form  action="" method="post" name="frm1" id="frm1"> 
                         
                <table width="40%">
          
                   
                 
                        <tr valign="middle">
                        	<thead>
                            <!--<th scope="col" class="rounded">Select to Edit</th>-->
                            <th scope="col" class="rounded">No.</th>
                            <th scope="col" class="rounded">Participant</th>
                            <th scope="col" class="rounded">Province</th>
                            <th scope="col" class="rounded">Functional Domain</th>
                            <th scope="col" class="rounded">Actor </th>
                            <th scope="col" class="rounded">Business Process</th>
                            <th scope="col" class="rounded" >Description</th>
                            <th scope="col" class="rounded">Priority</th>
                            <th scope="col" class="rounded">Comments</th>
  
				
                       
                            <!--<th scope="col" class="rounded-q4">Delete</th>-->
                            </thead>
                        </tr>
                  
					<?php
					while($amazon=mysql_fetch_array($ex_query))
					{
						if($amazon['DUPLICATE']=="duplicate")
						{
						?>
							<tr style="font-weight:normal; bgcolor="#FFFFCC">	  
					    	<!--<td>
                            <div class="flex flex-3">
                            <input name=<?php echo $amazon['CNT']; ?> id=<?php echo $amazon['CNT']; ?> type="checkbox" value=<?php echo $amazon['CNT']; ?>/>
                            <label for=<?php echo $amazon['CNT']; ?>></label>
                            </div>
                            -->
                            </td>
                            <td><b class="urllinkb"><a href="duplicates.php?edit=<?php echo $amazon['CNT']; ?>" class="urllinka" target="_blank"><?php echo $amazon['CNT']; ?></a></b></td>
                            <td><b class="urllinkb"><?php echo $amazon['FULLNAME']; ?></b></td>
                            <td><b class="urllinkb"><?php echo $amazon['PROVINCE']; ?></b></td>
                            <td><b class="urllinkb"><?php echo $amazon['FUNCTIONAL_DOMAIN']; ?></b></td>
                            <td><b class="urllinkb"><?php echo $amazon['ACTOR']; ?></b></td>
                            <td><b class="urllinkb"><?php echo $amazon['BUSINESS_PROCESS']; ?></b></td>
						  	<td><b class="urllinkb"><?php echo $amazon['AS_A']." ".$amazon['SO_THAT']; ?></b></td>
                            <td><b class="urllinkb"><a href="requirements.php?edit=<?php echo $amazon['CNT']; ?>" class="urllinka" target="_blank"><?php echo $amazon['PRIORITY']; ?></a></b></td>
                            <?php
                            $SelQuery2="select * FROM escmis_comments WHERE CNT='".$amazon['CNT']."'";
		    	            $ex_query2=mysql_query($SelQuery2);
                            $num_rows=mysql_num_rows($ex_query2);
                            if($num_rows>0)
							{
                            ?>
                                <td><a href="comments.php?comment=<?php echo $amazon['CNT']; ?>" class="urllinka"><b>Comments</b></a></td>
							<?php
							}else
							{
							?>
                               <td><a href="comments.php?comment=<?php echo $amazon['CNT']; ?>" class="urllinka">Comments</a></td>
                            <?php
							}
							?>
                         </tr>
                        <?php
						}else
						{
						?>
						<tr style="font-weight:normal; bgcolor="#FFFFCC">	  
					    	<!--<td>
                            <div class="flex flex-3">
                            <input name=<?php echo $amazon['CNT']; ?> id=<?php echo $amazon['CNT']; ?> type="checkbox" value=<?php echo $amazon['CNT']; ?>/>
                            <label for=<?php echo $amazon['CNT']; ?>></label>
                            </div>
                            -->
                            </td>
                            <td><a href="duplicates.php?edit=<?php echo $amazon['CNT']; ?>" class="urllinka" target="_blank"><?php echo $amazon['CNT']; ?></a></td>
                            <td><?php echo $amazon['FULLNAME']; ?></td>
                            <td><?php echo $amazon['PROVINCE']; ?></td>
                            <td><?php echo $amazon['FUNCTIONAL_DOMAIN']; ?></td>
                            <td><?php echo $amazon['ACTOR']; ?></td>
                            <td><?php echo $amazon['BUSINESS_PROCESS']; ?></td>
						  	<td><?php echo $amazon['AS_A']." ".$amazon['SO_THAT']; ?></td>
                            <td><a href="requirements.php?edit=<?php echo $amazon['CNT']; ?>" class="urllinka" target="_blank"><?php echo $amazon['PRIORITY']; ?></a></td>
                            <?php
                            $SelQuery2="select * FROM escmis_comments WHERE CNT='".$amazon['CNT']."'";
		    	            $ex_query2=mysql_query($SelQuery2);
                            $num_rows=mysql_num_rows($ex_query2);
                            if($num_rows>0)
							{
                            ?>
                                <td><a href="comments.php?comment=<?php echo $amazon['CNT']; ?>" class="urllinka"><b>Comments</b></a></td>
							<?php
							}else
							{
							?>
                               <td><a href="comments.php?comment=<?php echo $amazon['CNT']; ?>" class="urllinka">Comments</a></td>
                            <?php
							}
							?>
                         </tr>
                    <?	
						}
					}
						
					//}
         ?>         
                  
                  
                  
				</table>
                
			</form>
            <?php
				echo pagination($statement,$limit,$page);
			?>
			 </div>
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
            <script src="js/checkall_using_link.js" type="text/javascript"></script> 
			<script src="js/check.js" type="text/javascript"></script> 
            <script type="text/javascript"> 
            function fulfil_warning(m)  // Delete Before Warning 
            {
                if(!confirm(m))
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
            </script>
            <script type="text/javascript"> 
            function delete_warning(m)  // Delete Before Warning 
            {
                if(!confirm(m))
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
            </script>
            <script type="text/javascript">  // Select All Checkbox
			checked=false;
			function checkedAll (frm1) {
				var aa= document.getElementById('frm1');
				 if (checked == false)
					  {
					   checked = true
					  }
					else
					  {
					  checked = false
					  }
				for (var i =0; i < aa.elements.length; i++) 
				{
				 aa.elements[i].checked = checked;
				}
				  }
			</script>

	</body>
</html>