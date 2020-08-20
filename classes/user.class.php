<?php
/*

/// <summary>

///*********************************************************************************************************

/// MAIN MODULE				: Viasoft Solutions web site

/// SUB MODULE				: Classes

/// AUTHOR					: Chandika Jayawardena

/// CREATED					: 08-Jun-2011

/// DESCRIPTION				: User class file

/// MODIFICATION HISTORY	: 1.0     08-Jun-2011       Initial Version

/// COPYRIGHT				: Copyright csolutionsinfo.com. All Rights Reserved.

/// ********************************************************************************************************

/// </summary>

*/

class User{

	private static $instance;
	
	public static function getInstance() 
	{
		if (self::$instance == NULL) {
			self::$instance = new User();
		}//end if
		return self::$instance;
	}//end function getInstance()
	
	
	public function userToken($numStr,$strPrx) 
	{ 
		srand((double)microtime()*rand(1000000,9999999)); // Seed random number generator 
		$arrChar=array(); // New array 
		$uId=$strPrx; // Write prefix in the uniq id 
		 
		for($i=65;$i<90;$i++) 
		{ 
			array_push($arrChar,chr($i)); // Add A-Z to array 
			array_push($arrChar,strtolower(chr($i))); // Add a-z to array 
		} 
		for($i=48;$i<57;$i++) 
		{ 
			array_push($arrChar,chr($i)); // Add 0-9 to array 
		} 
		for($i=0;$i<$numStr;$i++) 
		{ 
			$uId.=$arrChar[rand(0,count($arrChar))]; // Write random picked chars in the uniq id 
		} 
		//print "Uniq ID is : $uId"; // Print uniq ID on the screen
		return $uId;
	}


	public function addUser($photo,$token) 
	{
		$m_pass1 = $_POST['password1'];
		$m_pass2 = $_POST['password2'];

		if($m_pass1==$m_pass2) {
			extract($_POST);
			//get posted values
			$m_empid = $_POST['email'];
			$m_fname = $_POST['fullname'];
			$m_province = $_POST['province'];
			$m_title = $_POST['title'];
			$m_email = $_POST['email'];
			$m_user = $_POST['username'];
			$m_upass = $m_pass1;
	
			$sqlInsert = "INSERT INTO escmis_user (USER_ID,FULLNAME,USERNAME,UPASS,TITLE,PROVINCE,EMAIL,PHOTO,ACCEPT,REG_DATE) VALUES (NULL,'".$m_fname."','".$m_user."','".$m_upass."','".$m_title."','".$m_province."','".$m_email."','".$photo."','0','".date('Y-m-d H:i:s')."')";
				
			$result = mysql_query($sqlInsert) or die (mysql_error());
			//Here Send email to user
			$sql1="select * from  escmis_email_templates where t_id=11";
			$template=mysql_fetch_array(mysql_query($sql1));
			$msg=$template['templates'];
		
			$sql="select * from escmis_admin_settings";
			$from_mail=mysql_fetch_array(mysql_query($sql));
			$adminemail=$from_mail['admin_email'];
			$site_url=$from_mail['siteurl'];
			$fname=$_SESSION['fname'];
			$email_id=$_POST['email'];
			$pwd=$m_upass;
			
			$emp=mysql_query("select * from escmis_user where email='".$email_id."'");
			$fetch_emp=mysql_fetch_array($emp);
			$random_id=$fetch_emp['user_id'];
			
			/*$psql = "SELECT * FROM pdflog WHERE UDATE LIKE '%".$_POST['hndyear']."%' AND YEND='0' AND NID='".$_POST['txtnid']."' ORDER BY UDATE DESC";    
			$presult = mysql_query($psql) or die (mysql_error());
			while ($pdata = mysql_fetch_array($presult))
            {
					$file_path = "pdf/".$pdata['PDF'].".pdf";
					unlink($file_path);
					$sql_update = "UPDATE pdflog set ISDELETE='1' WHERE PDF='".$pdata['PDF']."'";
					$result_update = mysql_query($sql_update) or die (mysql_error());	
			}*/
			
			$_SESSION['email_id']="";
			$from=$from_mail['company_name'];
			$url_link="$site_url/index.php?task=update&url=$email_id";
			$email_subject="Confirm Your Registration to eSCMIS";
			$headers .= "From: $from <$adminemail>\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				   $api=array(
								'$email_id'=>$m_user,
								'$pwd'=>$pwd,
								'$url_link'=>$url_link,		   
							   );
		    $message=strtr($msg,$api);
   			$mail_cnt=mail($email_id, $email_subject, $message, $headers);
			
			return true;
		} else {
			return false;
		}
	}
	
	//check for existence of partner
	public function IsExistsUser($email)
	{
		$sqlExists = "SELECT * FROM escmis_user WHERE EMAIL='".$email."'";  
		$result_exists = mysql_query($sqlExists) or die (mysql_error());
		$num_rows = mysql_num_rows($result_exists);

		if($num_rows==0) {
			return false;
		} else {
			return true;
		}
	}

	public function chkLogin_front()
	{
		//global $_SESSION;
		if(isset($_SESSION['EMAIL']) && !empty($_SESSION['EMAIL'])) {
			return true;
		} else {
			header("location:index.php");
		}
	}
	
	//check online login
	public function onlineLogin()
	{
		extract($_POST);
		$sql = "SELECT * FROM escmis_user WHERE USERNAME='".$_POST['username']."' AND UPASS='".$_POST['password']."' and ACCEPT='1'";  
		$result = mysql_query($sql) or die (mysql_error());
		$num_rows = mysql_num_rows($result);

		if($num_rows==0) {
			return false;
		} else {
			$row_request = mysql_fetch_array($result);
			//session_unset();
			//session_start();
			$_SESSION['FNAME'] = $row_request['FULLNAME'];
			$_SESSION['TOKEN'] = $row_request['USER_ID'];
			$_SESSION['EMAIL'] = $row_request['EMAIL'];
			return true;
		}
	}
	
	public function verifyUser()
	{
		$sql_update = "UPDATE user set ACCEPT='".$_GET['val']."' WHERE USER_ID='".$_GET['id']."'";
		$result_update = mysql_query($sql_update) or die (mysql_error());
		
		if ($_GET['val']=="1") {
			$sql = "SELECT * FROM user WHERE USER_ID='".$_GET['id']."' AND ACCEPT='1'";    
			$result = mysql_query($sql) or die (mysql_error());
			$num_rows = mysql_num_rows($result);

			$row_request = mysql_fetch_array($result);
			/////////// Sending email
			$to  = $row_request['EMAIL'];
			$subject = 'From iBenefits <admin> - YOUR ACCOUNT APROOVED BY '.$_SESSION['COMPANY_NAME'];
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Admin<ibenefits.com>' . "\r\n";
			
			// message
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title>YOUR ACCOUNT APROOVED BY '.$_SESSION['COMPANY_NAME'].'</title>
			<style type="text/css">
			<!--
			.style1 
			{
			color: #FF0000;
			font-size:12px;
			
			}
			.style2 {font-size: 12px}
			.style3 {font-size: 12px; font-weight: bold; }
			-->
			</style>
			</head>
			
			<body>
			<table width="35%" border="0" align="left" cellpadding="2" cellspacing="2">
			<tr>
			  <td colspan="3"><img src="'.HTTP_PATH.'images/logo.png"/></td>
			</tr>
			<tr>
			  <td height="40" colspan="3">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3"><span class="style2">We are happy to tell you'.$_SESSION['COMPANY_NAME'].' is activate your account.<br />Please use the following online id to <a href="'.HTTP_PATH.'" title="SignIn">Signin</a>. Keep this ID as private.</span></td>
			</tr>
			<tr>
			<td width="20%">&nbsp;</td>
			<td width="5%">&nbsp;</td>
			<td width="75%">&nbsp;</td>
			</tr>
			<tr>
			<td class="style3"> Name </td>
			<td class="style3">:</td>
			<td class="style2">'.$row_request['FNAME']." ".$row_request['LNAME'].'</td>
			</tr>
			<tr>
			<td class="style3">Online ID</td>
			<td class="style3">:</td>
			<td class="style2">'.$row_request['USER_ID'].'</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3"><p class="style1">*** Please do<strong> NOT</strong> reply to this email</p>
			  </td>
			</tr>
			<tr>
			  <td height="70" colspan="3" valign="bottom"><span class="style2">From <br />
			    iBenifits Adminstrator</span></td>
			</tr>
			</table>
			</body>
			</html>';
			//echo $message;
			@mail($to, $subject, $message, $headers);
		}

		return true;
	}
	
	public function deleteUser()
	{
		$sql_del = "DELETE FROM user WHERE USER_ID='".$_GET['id']."'";
		$result_del = mysql_query($sql_del) or die (mysql_error());	
		return true;
	}
}