 <?PHP 

/*

/// <summary>

///*********************************************************************************************************

/// MAIN MODULE				: Viasoft Solutions

/// SUB MODULE				: Public

/// AUTHOR					: Chandika Jayawardena

/// CREATED					: 02-June-2010

/// DESCRIPTION				: This module is used to connect the database

/// MODIFICATION HISTORY	: 1.0     02-June-2010      Initial Version

/// COPYRIGHT				: Copyright csolutions24x7.com. All Rights Reserved.

/// ********************************************************************************************************

/// </summary>

*/

$link = mysql_connect(DB_HOST, DB_USER, DB_PWD) or die(RedirectErrorPage());
mysql_select_db(DB_DB) or die(RedirectErrorPage());

function RedirectErrorPage(){
	echo '<script language="javascript">
				document.location.href="conerror.php";
			</script>';
}
?>
