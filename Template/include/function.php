

<?php

//session_start();

function convertarray($seledate)
{
	$mystring = $seledate;
	$findme   = 'SelectedDates';
	$pos = strpos($mystring, $findme);
	
	 function str_between($string, $searchStart, $searchEnd, $offset = 0) {
        $startPosition = strpos($string, $searchStart, $offset);
        if ($startPosition !== false) {
            $searchStartLength = strlen($searchStart);
            $endPosition = strpos($string, $searchEnd, $startPosition + 1);
            if ($endPosition !== false) {
                return substr($string, $startPosition + $searchStartLength, $endPosition - $searchStartLength);
            }
            return substr($string, $startPosition + $searchStartLength);
        }
        return $string;
    }
	$test=str_between($seledate,'SelectedDates":',"}}");
	$level1= str_replace("}}","}",$test);
	$level2= str_replace("{","",$level1);
	$level3= str_replace("}","",$level2);
	$level4= str_replace(":1","",$level3);
	$level5= str_replace("\"","'",$level4);
	$level5= str_replace("/","-",$level5);
	
	

	
	$level6= str_replace(":","=>",$level5);
		$array = explode(',', $level6);
		$totalElements = count($array);
    return $array;
	
}
//parameter- fungsi ini

function checksubjectid($subjectcode){

$sql="SELECT * FROM `subject` where SubjectCode ='".$subjectcode."'";
//$result=mysql_query($sql);
$result=mysqli_query($virtual_con,$sql);
$rowtrainer=mysqli_fetch_assoc($result);
return $rowtrainer['Subjectid']; // total number rows

}



function checkLogin($username,$password){

$sql="select UserType from tblUser where UserId='".$username."' and Password ='".$password."'";
$result=mysql_query($sql);
//$row=mysql_fetch_row($result);
//echo $row[0] ."<br>";
//echo ' test value row '.$row[0] ."<br>    test value".$row;
/*
$sql1="SELECT interface FROM category WHERE  UserType='".$row[0]."'";
//echo $sql1;
session_register("interface");
$result1=mysql_query($sql1);
$row1=mysql_fetch_row($result1);
$_SESSION["interface"]=$row1[2];*/
//echo 'User Descrip '. $row1[0]."<br>";

return $result; // total number rows

//return $row;
}
/*
function checkCategory($username,$password){

$sql="select UserType from tblUser where UserId='".$username."' and Password ='".$password."'";
$result=mysql_query($sql);

//return mysql_num_rows($result);  total number rows
$row=mysql_fetch_row($result);
return $row[0];
}*/

function goto1($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function gotoInterface($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}

function alert ($str){
	print "<script>alert(\"".$str."\")</script>";
}
//function utk retrieve webpage mana utk user mana
function checkPage($webname){

$sql="select interface from category where UserType='".$webname."'";
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
//echo $sql;
return $row[0]; 

}

function genericquery($sql,$virtual_con){
	
$resultc=mysqli_query($virtual_con,$sql);
 return $resultc;
}


?>
