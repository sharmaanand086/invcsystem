<?php 
session_start();

require("isdk.php");
$app = new iSDK; 
	if ($app->cfgCon("connectionName")) 
{
    $contactId=$_SESSION['contactId'];
    $returnFields = array('ContactId','Contact.FirstName','Contact.Email','Contact.Phone1');
		$query = array('ContactID' => $contactId);
    	$groupId1 = 14951;			// Success payment Tag
		$result5 = $app->grpAssign($contactId, $groupId1);
		
}