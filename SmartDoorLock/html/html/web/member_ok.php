<?php
	include('db.php');

	$id = $_POST['id'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$tel = $_POST['tel'];
	$sex = $_POST['sex'];
	
		

		
	if(isset($id) and isset($password) and isset($name) and isset($tel)  and isset($sex)){  
		$sql = "insert into user_wait (id,password,name,tel,sex) values('$id','$password','$name','$tel','$sex')";
		if ($result = $db -> query($sql)) {
				echo "<script>alert('회원가입이 완료되었습니다.'); location.href='/index.php';</script>" . $result -> num_rows;
		// Free result set
				$result -> free_result();
				echo "회원가입이 완료되었습니다.";

				}

		else{
			echo "ERROR";
		}
	}
	else{
		echo "<script>alert('다시 입력해 주세요.'); history.back();</script>";
	}
			
?>

<meta charset="utf-8" />
