<?PHP
	session_start();
	require_once('config.php');
	include_once('DBConnectivity.php');
	require('classes/user.class.php');

	if($_GET['action']=="add")
	{
		$user = User::getInstance();
		$user_result = $user->IsExistsUser($_POST['email']);
		
				
		if($user_result==true)
		{
				echo '<script language="javascript">
					document.location.href="signup.php?type=user&res=1";
				</script>';
		}
		else
		{
				
				//do if logo upload specified 
						
				$photo ="nofile";
				$user = User::getInstance();
				$m_userid = $user->userToken(10,$_POST['email']);
				$user_result = $user->addUser($photo,$m_userid);
				
				if($user_result==true)
				{
					echo '<script language="javascript">
						document.location.href="index.php?type=done";
					</script>';
				}else
				{
					echo '<script language="javascript">
						document.location.href="signup.php?type=pass";
					</script>';
				}
			
		}
	}else if($_GET['action']=='login')
	{
		$user = User::getInstance();
		$user_result = $user->onlineLogin();
		if($user_result==true)
			{
				echo '<script language="javascript">
					document.location.href="requirements.php";
				</script>';
			}else
			{
				echo '<script language="javascript">
					document.location.href="index.php?res=fail";
				</script>';
			}
	
	}else if($_GET['action']=='fpass')
	{
		$partner = Partner::getInstance();
		$partner_result = $partner->requestPassword();
		if($partner_result==true)
		{
			echo '<script language="javascript">
				document.location.href="index.php?res=1&action=fpass";
			</script>';
		}else
		{
			echo '<script language="javascript">
				document.location.href="index.php?res=2&action=fpass";
			</script>';
		}
	
	}else if($_GET['action']=='verify')
	{
		$user = User::getInstance();
		$user_result = $user->verifyUser();
		if($user_result==true)
		{
			echo '<script language="javascript">
				document.location.href="pending_users.php?val='.$_GET['val'].'";
			</script>';
		}else
		{
			echo '<script language="javascript">
				document.location.href="pending_users.php";
			</script>';
		}
	
	}else if($_GET['action']=='delete')
	{
		$user = User::getInstance();
		$user_result = $user->deleteUser();
		if($user_result==true)
		{
			echo '<script language="javascript">
				document.location.href="pending_users.php?res=2";
			</script>';
		}else
		{
			echo '<script language="javascript">
				document.location.href="pending_users.php?res=3";
			</script>';
		}

	
	}else if($_GET['action']=='logout')
	{
		session_unset();
		session_destroy();
		echo "<script language=\"javascript\" type=\"text/javascript\">window.location.replace('index.php');</script>";	
	}else if($_GET['action']=='subscribe')
	{
		$my_email= $_POST['txtonlineid1'];
		$advisor_id=$_SESSION['ARTICLE_ANY'];
		$sqlInsert = "INSERT INTO subscriber (EMAIL,ADVISOR_ID,SUB_DATE) values ('".$my_email."','".$advisor_id."','".date('F j, Y')."')";
		$result_insert = mysql_query($sqlInsert) or die (mysql_error());	
		echo '<script language="javascript">
				document.location.href="advisor_page.php?action=viewAdvisor&id='.$advisor_id.'";
	
		</script>';
	}else if($_GET['action']=='mybenefitsuserpassword')
	{
		
		$my_password= $_POST['txtpassword'];
		$sqlUpdate = "UPDATE user set USER_ID='".$my_password."' WHERE USER_ID='".$_SESSION['TOKEN']."'";
		$result_update = mysql_query($sqlUpdate) or die (mysql_error());
		echo '<script language="javascript">
				document.location.href="requirements.php";
	
		</script>';
	}
	
?>