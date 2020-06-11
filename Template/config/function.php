<?php
function goto1($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function gotoInterface($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}

?>
