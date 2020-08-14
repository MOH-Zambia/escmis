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
        
     table {
		border-collapse:separate;
		border:solid #60CCCC 1px;
		border-radius:6px;
		-moz-border-radius:6px;
		width:75%;
		
		
		}
	
	td, th {
		border-left:#60C8F2;
		border-top:#60C8F2;
		color:#333;
		alignment-adjust:top;
		text-align:left;
		vertical-align:text-top;
		
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
			
           
	<p align="center" class="style2">These are the Custom Requirements you have Managed to Create so far!</p>
				<div align="center">
 				<form  action="" method="post" name="frm1" id="frm1"> 
                         
                <table width="40%">
          
                   
                 
                        <tr valign="middle">
                        	<thead>
                            <!--<th scope="col" class="rounded">Select to Edit</th>-->
                            <th scope="col" class="rounded">Functional Domain</th>
                            <th scope="col" class="rounded">Actor </th>
                            <th scope="col" class="rounded">Business Process</th>
                            <th scope="col" class="rounded" >Description</th>
                            <th scope="col" class="rounded">Priority</th>
                            <th scope="col" class="rounded">Edit</th>
                         	<th scope="col" class="rounded">Repeat</th>
                            <th scope="col" class="rounded">Comments</th>
				
                       
                            <!--<th scope="col" class="rounded-q4">Delete</th>-->
                            </thead>
                        </tr>
                  <?PHP
                  
                  $SelQuery="select * FROM escmis_custom_requirements WHERE user_id='".$_SESSION['TOKEN']."' order by CNT desc";
		    	
					$ex_query=mysql_query($SelQuery);
					//$num_rows=mysql_num_rows($ex_query);
					//$neworder=0;
					//if($num_rows>0)
					//{
			
					while($amazon=mysql_fetch_array($ex_query))
					{
						?>
						<tr style="font-weight:normal"  bgcolor="#FFFFCC">	  
					    	<!--<td>
                            <div class="flex flex-3">
                            <input name=<?php echo $amazon['CNT']; ?> id=<?php echo $amazon['CNT']; ?> type="checkbox" value=<?php echo $amazon['CNT']; ?>/>
                            <label for=<?php echo $amazon['CNT']; ?>></label>
                            </div>
                            -->
                            </td>
                            <td><?php echo $amazon['FUNCTIONAL_DOMAIN']; ?></td>
                            <td><?php echo $amazon['ACTOR']; ?></td>
                            <td><?php echo $amazon['BUSINESS_PROCESS']; ?></td>
						  	<td><?php echo $amazon['AS_A']." ".$amazon['SO_THAT']; ?></td>
                            <td><?php echo $amazon['PRIORITY']; ?></td>
                            <td valign="middle"><a href="requirements.php?edit=<?php echo $amazon['CNT']; ?>"><img src="images/edit2.png" width="50"></a></td>
                          	<td><a href="requirements.php?repeat=<?php echo $amazon['CNT']; ?>" class="urllinka">REPEAT</a></td>
                            
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
						
					//}
         ?>         
                  
                  
                  
				</table>
                
			</form>
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