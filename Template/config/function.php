<?php

function getusername($uid, $virtual_con){

$sql="select * from users where UserID='".$uid."'";
  $result=mysqli_query($virtual_con,$sql);
  $row=mysqli_fetch_assoc($result);

  return $row['UserName'];
}
function getlogin($chkU,$chkP,$virtual_con){
  //validation of usersdb
  $sql="select * from users where UserName='".$chkU."' and  UserPasswd='".$chkP."'";
  $result=mysqli_query($virtual_con,$sql);
  return $result;
}

function goto1($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function gotoInterface($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
function goto3 ($Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\")";
}

?>
