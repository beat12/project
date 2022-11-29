<?php

    include('../dbcon.php');

    
      if(isset($_GET['del_id']))
    {
	$stmt = $con->prepare('DELETE FROM user_wait WHERE id =:del_id') or die("1");
	$stmt->bindParam(':del_id',$_GET['del_id'])or die("2");
	$stmt->execute()or die("3");	
    }

    header("Location: /web/admin.php");
?>





