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
		
			
			if(isset($_POST['submit']))
			{
            	extract($_POST);
				$receiving="";
				$storageandinventory="";
				$dispensing="";
				$requisition="";
				$orderprocessing="";
				$transport="";
				$forecasting="";
				//Get receiving business process
				if(isset($create_delivery_schedule)){
					$receiving=$create_delivery_schedule;
				}
				if(isset($enters_storage)){
					$receiving=$receiving.'*'.$enters_storage;
				}
				if(isset($prepares_pod)){
					$receiving=$receiving.'*'.$prepares_pod;
				}
				if(isset($shipment_notification)){
					$receiving=$receiving.'*'.$shipment_notification;
				}
				if(isset($dispatch_notification)){
					$receiving=$receiving.'*'.$dispatch_notification;
				}
				if(isset($completes_pod)){
					$receiving=$receiving.'*'.$completes_pod;
				}
				if(isset($view_storage)){
					$receiving=$receiving.'*'.$view_storage;
				}
				if(isset($update_shipment)){
					$receiving=$receiving.'*'.$update_shipment;
				}
				if(isset($send_shipment_rpt)){
					$receiving=$receiving.'*'.$send_shipment_rpt;
				}
				if(isset($receives_delivery_note)){
					$receiving=$receiving.'*'.$receives_delivery_note;
				}
				
				//Get storage and invetory business process
				if(isset($view_stock_status)){
					$storageandinventory=$view_stock_status;
				}
				if(isset($initiate_drug_recall)){
					$storageandinventory=$storageandinventory.'*'.$initiate_drug_recall;
				}
				if(isset($view_drug_recall)){
					$storageandinventory=$storageandinventory.'*'.$view_drug_recall;
				}
				
				//Get dispensing business process
				if(isset($em_dispensation)){
					$dispensing=$em_dispensation;
				}
				
				//Get requisition business process
				if(isset($view_requisition_status)){
					$requisition=$view_requisition_status;
				}
				if(isset($view_health_virtual_budget)){
					$requisition=$requisition.'*'.$view_health_virtual_budget;
				}
				if(isset($view_warehouse_stock_info)){
					$requisition=$requisition.'*'.$view_warehouse_stock_info;
				}
				if(isset($allocate_alt_products)){
					$requisition=$requisition.'*'.$allocate_alt_products;
				}
				
				//Get order processing business process
				if(isset($view_shipment_info)){
					$orderprocessing=$view_shipment_info;
				}
				if(isset($backorder_notifications)){
					$orderprocessing=$orderprocessing.'*'.$backorder_notifications;
				}
				if(isset($group_req_route)){
					$orderprocessing=$orderprocessing.'*'.$group_req_route;
				}
				if(isset($ration_commodities)){
					$orderprocessing=$orderprocessing.'*'.$ration_commodities;
				}
				
				//Get transport business process
				if(isset($create_update_distr_schedule)){
	 				$transport=$create_update_distr_schedule;
				}
				if(isset($print_distr_schedule)){
					$transport=$transport.'*'.$print_distr_schedule;
				}
				if(isset($send_shipment_notification)){
					$transport=$transport.'*'.$send_shipment_notification;
				}
				if(isset($update_shipment_status)){
					$transport=$transport.'*'.$update_shipment_status;
				}
				
				//Get forecasting business process
				if(isset($export_consump_stock)){
					$forecasting=$export_consump_stock;
				}
				
				//Let's first delete Everything for this user
				$SelQuery="DELETE FROM escmis_known_missing_requirements WHERE user_id='".$_SESSION['TOKEN']."'";
				$ex_query=mysql_fetch_array(mysql_query($SelQuery));
				
				
				$sqlInsert = "INSERT INTO escmis_known_missing_requirements(user_id,email,dispensing,forecasting,order_processing,receiving_business_process,requisition,storage_and_inventory_management,transport,reg_date) values ('".$_SESSION['TOKEN']."','".$_SESSION['EMAIL']."','".$dispensing."','".$forecasting."','".$orderprocessing."','".$receiving."','".$requisition."','".$storageandinventory."','".$transport."','".date('Y-m-d H:i:s')."')";
				
				$result = mysql_query($sqlInsert) or die (mysql_error());
				header("location:thankyou.php?story=success");
				
			}
			?>
			<p align="center" class="style2">Please Check ALL the items you would like to see in the new enhanced eSCMIS System!!</p>
<?php
 	$SelQuery="select * FROM escmis_known_missing_requirements WHERE user_id='".$_SESSION['TOKEN']."'";
	$ex_query=mysql_fetch_array(mysql_query($SelQuery));
	
?>

  <form action="" method="post" name="form" id="form" enctype="multipart/form-data">

	<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
						<article>
							<header>
								<h3>Receiving Business Process</h3>
							</header>
							 
                             <div>
                             <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "create_delivery_schedule");
								if ($pos === false) {
							 ?>
							  	<input type="checkbox" id="create_delivery_schedule" name="create_delivery_schedule" value="create_delivery_schedule">
							  <?php
								}else
								{
								?>
                                <input type="checkbox" id="create_delivery_schedule" name="create_delivery_schedule" value="create_delivery_schedule" checked>
								<?php	
								}
                              ?>
                             	<label for="create_delivery_schedule">Creates delivery schedule</label>
                                </div>
							   
							  
                               <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "enters_storage");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="enters_storage" name="enters_storage" value="enters_storage">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="enters_storage" name="enters_storage" value="enters_storage" checked>
								<?php	
								}
                              ?>
                                <label for="enters_storage">Enters storage and product handling requirements.</label>
                               </div>
                           
                           
                              <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "prepares_pod");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="prepares_pod" name="prepares_pod" value="prepares_pod">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="prepares_pod" name="prepares_pod" value="prepares_pod" checked>
								<?php	
								}
                              ?>
                                <label for="prepares_pod">Prepares proof of delivery (POD)</label>
                               </div>
                           
                           
                               <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "shipment_notification");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="shipment_notification" name="shipment_notification" value="shipment_notification">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="shipment_notification" name="shipment_notification" value="shipment_notification" checked>
								<?php	
								}
                              ?>
                                <label for="shipment_notification">Sends out shipment notification</label>
                               </div>
                               
                               
                                <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "dispatch_notification");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="dispatch_notification" name="dispatch_notification" value="dispatch_notification">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="dispatch_notification" name="dispatch_notification" value="dispatch_notification" checked>
								<?php	
								}
                              ?>
                                <label for="dispatch_notification">Sends out dispatch notification</label>
                               </div>
                           
                            
                               <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "completes_pod");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="completes_pod" name="completes_pod" value="completes_pod">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="completes_pod" name="completes_pod" value="completes_pod" checked>
								<?php	
								}
                              ?>
                                <label for="completes_pod">Completes POD</label>
								</div>	
                               
                               
                               <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "view_storage");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="view_storage" name="view_storage" value="view_storage">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="view_storage" name="view_storage" value="view_storage" checked>
								<?php	
								}
                              ?>
                                <label for="view_storage">View storage and product handling requirements</label>
								</div>	
                                
                            
                            	<div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "update_shipment");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="update_shipment" name="update_shipment" value="update_shipment">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="update_shipment" name="update_shipment" value="update_shipment" checked>
								<?php	
								}
                              ?>
                                <label for="update_shipment">Update shipment information</label>
								</div>	
                             
                            
                            
                              <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "send_shipment_rpt");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="send_shipment_rpt" name="send_shipment_rpt" value="send_shipment_rpt">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="send_shipment_rpt" name="send_shipment_rpt" value="send_shipment_rpt" checked>
								<?php	
								}
                                ?>
                               <label for="send_shipment_rpt">Send shipment report</label>
								</div>	
                            
                            
                               <div>
							   <?php
                             	$pos = strpos($ex_query['receiving_business_process'], "receives_delivery_note");
								if ($pos === false) {
							   ?>
                              	
                               <input type="checkbox" id="receives_delivery_note" name="receives_delivery_note" value="receives_delivery_note">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="receives_delivery_note" name="receives_delivery_note" value="receives_delivery_note" checked>
								<?php	
								}
                              ?>
                               <label for="receives_delivery_note">Receives delivery note</label>
								</div>	
                              			
                        </article>
						
                        
                        
						<article>
							<header>
								<h3>Storage and Inventory Management Business Process</h3>
							</header>
								
                               <div>
							   <?php
                             	$pos = strpos($ex_query['storage_and_inventory_management'], "view_stock_status");
								if ($pos === false) {
							   ?>
                              	
                              <input type="checkbox" id="view_stock_status" name="view_stock_status" value="view_stock_status">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="view_stock_status" name="view_stock_status" value="view_stock_status" checked>
								<?php	
								}
                              ?>
                               <label for="view_stock_status">View stock status alerts and notifications</label>
								</div>	
                                
                                
                               <div>
							   <?php
                             	$pos = strpos($ex_query['storage_and_inventory_management'], "initiate_drug_recall");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="initiate_drug_recall" name="initiate_drug_recall" value="initiate_drug_recall">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="initiate_drug_recall" name="initiate_drug_recall" value="initiate_drug_recall" checked>
								<?php	
								}
                              ?>
                               <label for="initiate_drug_recall">Initiate drug recall</label>
								</div>	
                                
                                
                                <div>
							   <?php
                             	$pos = strpos($ex_query['storage_and_inventory_management'], "initiate_drug_recall");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="view_drug_recall" name="view_drug_recall" value="view_drug_recall">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="view_drug_recall" name="view_drug_recall" value="view_drug_recall" checked>
								<?php	
								}
                              ?>
                               <label for="view_drug_recall">View drug recall</label>
								</div>							
								
						</article>
						
                        
                        <article>
                        	<header>
								<h3>Dispensing Business Process</h3>
							</header>
								
                               <div>
							   <?php
                             	$pos = strpos($ex_query['dispensing'], "em_dispensation");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="em_dispensation" name="em_dispensation" value="em_dispensation">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="em_dispensation" name="em_dispensation" value="em_dispensation" checked>
								<?php	
								}
                              ?>
                               <label for="em_dispensation">EM Dispensation (using consumption vs issues data)</label>
								</div>			
                             
							<p>&nbsp;</p>
                            
                            
                            <header>
								<h3>Requisition Business Process</h3>
							</header>
                            	
                               <div>
							   <?php
                             	$pos = strpos($ex_query['requisition'], "view_requisition_status");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="view_requisition_status" name="view_requisition_status" value="view_requisition_status">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="view_requisition_status" name="view_requisition_status" value="view_requisition_status" checked>
								<?php	
								}
                              ?>
                               <label for="view_requisition_status">View requisition status </label>
								</div>			
                                
                                
                               <div>
							   <?php
                             	$pos = strpos($ex_query['requisition'], "view_health_virtual_budget");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="view_health_virtual_budget" name="view_health_virtual_budget" value="view_health_virtual_budget">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="view_health_virtual_budget" name="view_health_virtual_budget" value="view_health_virtual_budget" checked>
								<?php	
								}
                              ?>
                                <label for="view_health_virtual_budget">Views health virtual budget  </label>
								</div>			
                                
                                
                                <div>
							   <?php
                             	$pos = strpos($ex_query['requisition'], "view_warehouse_stock_info");
								if ($pos === false) {
							   ?>
                              	
                               <input type="checkbox" id="view_warehouse_stock_info" name="view_warehouse_stock_info" value="view_warehouse_stock_info">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="view_warehouse_stock_info" name="view_warehouse_stock_info" value="view_warehouse_stock_info" checked>
								<?php	
								}
                              ?>
                               <label for="view_warehouse_stock_info">Views Warehouse stock information  </label>
								</div>		                              
                                
                                
                               <div>
							   <?php
                             	$pos = strpos($ex_query['requisition'], "allocate_alt_products");
								if ($pos === false) {
							   ?>
                              	
                               <input type="checkbox" id="allocate_alt_products" name="allocate_alt_products" value="allocate_alt_products">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="allocate_alt_products" name="allocate_alt_products" value="allocate_alt_products" checked>
								<?php	
								}
                              ?>
                               <label for="allocate_alt_products">Allocate alternative products  </label>
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
								<h3>Order Processing Business Process</h3>
							</header>
                            	
                                <div>
							   <?php
                             	$pos = strpos($ex_query['order_processing'], "view_shipment_info");
								if ($pos === false) {
							   ?>
                              	
                               <input type="checkbox" id="view_shipment_info" name="view_shipment_info" value="view_shipment_info">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="view_shipment_info" name="view_shipment_info" value="view_shipment_info" checked>
								<?php	
								}
                              ?>
                               <label for="view_shipment_info">View shipment information</label>
								</div>		
                                
                               
                               <div>
							   <?php
                             	$pos = strpos($ex_query['order_processing'], "backorder_notifications");
								if ($pos === false) {
							   ?>
                              	
                               <input type="checkbox" id="backorder_notifications" name="backorder_notifications" value="backorder_notifications">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="backorder_notifications" name="backorder_notifications" value="backorder_notifications" checked>
								<?php	
								}
                              ?>
                               <label for="backorder_notifications">Address backorder notifications for unfulfilled items</label>
								</div>		
                                
                                
                               <div>
							   <?php
                             	$pos = strpos($ex_query['order_processing'], "group_req_route");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="group_req_route" name="group_req_route" value="group_req_route">
							    <?php
								}else
								{
								?>
                                <input type="checkbox" id="group_req_route" name="group_req_route" value="group_req_route" checked>
								<?php	
								}
                              ?>
                               <label for="group_req_route">Group requisition into route</label>
								</div>		
                                
                                
                                <div>
							   <?php
                             	$pos = strpos($ex_query['order_processing'], "ration_commodities");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="ration_commodities" name="ration_commodities" value="ration_commodities">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="ration_commodities" name="ration_commodities" value="ration_commodities" checked>
								<?php	
								}
                              ?>
                               <label for="ration_commodities">Ration Commodities</label>
								</div>		
                                
                        </article>
                        <article>
							<header>
								<h3>Transport Business Process</h3>
            
							</header>
                           		
                               <div>
							   <?php
                             	$pos = strpos($ex_query['transport'], "create_update_distr_schedule");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="create_update_distr_schedule" name="create_update_distr_schedule" value="create_update_distr_schedule">
							    <?php
								}else
								{
								?>
                               <input type="checkbox" id="create_update_distr_schedule" name="create_update_distr_schedule" value="create_update_distr_schedule" checked>
								<?php	
								}
                              ?>
                               <label for="create_update_distr_schedule">Create and update distribution schedule</label>
								</div>		
                                
                                
                                <div>
							   <?php
                             	$pos = strpos($ex_query['transport'], "print_distr_schedule");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="print_distr_schedule" name="print_distr_schedule" value="print_distr_schedule">
							    <?php
								}else
								{
								?>
                              <input type="checkbox" id="print_distr_schedule" name="print_distr_schedule" value="print_distr_schedule" checked>
								<?php	
								}
                              ?>
                               <label for="print_distr_schedule">Print distribution schedule</label>
								</div>		
                               
                                <div>
							   <?php
                             	$pos = strpos($ex_query['transport'], "send_shipment_notification");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="send_shipment_notification" name="send_shipment_notification" value="send_shipment_notification">
							    <?php
								}else
								{
								?>
                              <input type="checkbox" id="send_shipment_notification" name="send_shipment_notification" value="send_shipment_notification" checked>
								<?php	
								}
                              ?>
                               <label for="send_shipment_notification">Send shipment notification</label>
								</div>		
                               
                                
                                <div>
							   <?php
                             	$pos = strpos($ex_query['transport'], "update_shipment_status");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="update_shipment_status" name="update_shipment_status" value="update_shipment_status">
							    <?php
								}else
								{
								?>
                              <input type="checkbox" id="update_shipment_status" name="update_shipment_status" value="update_shipment_status" checked>
								<?php	
								}
                              ?>
                              <label for="update_shipment_status">Update shipment status</label>
								</div>		
                                
						</article>
                        <article>
                        		<header>
								<h3>Forecasting Business Process</h3>
            
							</header>
                           		
                                <div>
							   <?php
                             	$pos = strpos($ex_query['forecasting'], "export_consump_stock");
								if ($pos === false) {
							   ?>
                              	
                                <input type="checkbox" id="export_consump_stock" name="export_consump_stock" value="export_consump_stock">
							    <?php
								}else
								{
								?>
                              <input type="checkbox" id="export_consump_stock" name="export_consump_stock" value="export_consump_stock" checked>
								<?php	
								}
                              ?>
                              <label for="export_consump_stock">Export consumption and stock on hand report to quantification and forecasting tool. Users should be able to link/interface the collected data with other existing softwares/databases (HMIS, Quantimed, Spectrum, Pipeline)</label>
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
							<p align="center"><input align="left" name="submit" type="submit"  value="Update My Requirements Now" class="button special"/></p>	
							
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