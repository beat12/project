<?php

    include('../dbcon.php');

    
      if(isset($_GET['change_id']))
    {
	$stmt = $con->prepare('INSERT INTO user (id, password, name, tel, sex)
SELECT user_wait.id, user_wait.password, user_wait.name, user_wait.tel, user_wait.sex
  FROM user_wait
 WHERE user_wait.id= :change_id;')or die("1");
	$stmt->bindParam(':change_id',$_GET['change_id'])or die("2");
	$stmt->execute()or die("3");
	
	$stmt = $con->prepare('DELETE FROM user_wait WHERE id =:change_id') or die("1");
	$stmt->bindParam(':change_id',$_GET['change_id'])or die("2");
	$stmt->execute()or die("3");	
    }

    header("Location: /web/admin.php");
?>





