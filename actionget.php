<?php
 set_time_limit(0);
if(isset($_POST['tagname']))
{
	include("isdk.php");
	//include('adler32.php');	 
    	$withtagid= filter_input(INPUT_POST, 'tagname', FILTER_VALIDATE_INT);
        $email1= filter_input(INPUT_POST, 'tagname', FILTER_SANITIZE_STRING); 
        
       // var_dump($email);    
 		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{                 $contact;
			        if(is_int($contact))
                                 {
                                 var_dump($withtagid);
                                $contactId1= $withtagid;					 
				$returnFields=array('Id','FirstName','Email','Phone1');
				$contacts = $app->dsFind("Contact",1000,0,'Id',$contactId1, $returnFields);
				
				$contactId=$contacts[0]['Id'];
				$first=$contacts[0]['FirstName'];
				$email=$contacts[0]['Email'];
				$phone=$contacts[0]['Phone1'];
				
				//echo $contactId;
				//echo $first;
				//echo $email;
				//echo $phone; 
                                $myObj->name = $first;
                                $myObj->contactid= $contactId;
                                $myObj->phone= $phone;
                                $myJSON = json_encode($myObj);
                                 echo $myJSON;
                                 
                                 }
                                 $email1;
                                 if(is_string($email1))
                                {
                                  // var_dump($email);
                                $contactId1= $email1;					 
				$returnFields=array('Id','FirstName','Email','Phone1');
				$contacts = $app->dsFind("Contact",1000,0,'Email',$contactId1, $returnFields);
				
				$contactId=$contacts[0]['Id'];
				$first=$contacts[0]['FirstName'];
				$email=$contacts[0]['Email'];
				$phone=$contacts[0]['Phone1'];
                                $myObj->name = $first;
                                $myObj->phone= $phone;
                                $myObj->contactid= $contactId;
                                $myJSON = json_encode($myObj);
                                 echo $myJSON;
                               }

			       
				
				 
		}
	}

?>