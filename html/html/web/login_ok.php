<meta charset="utf-8" />
<?php	
	include('db.php');
	
	$id = $_POST['id'];
	$pw = $_POST['password'];

	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["id"] == "" || $_POST["password"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}
	else{
		//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
		$sql = "select * from user where id='$id'";
		$result = mysqli_query($db,$sql) or die("제발 죽어라");
		$member = mysqli_fetch_array($result);
		$hash_pw = $member['password']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 

		if($hash_pw == $pw) //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
		{
			session_start();
			$_SESSION['userid'] = $member["id"];
			$_SESSION['userpw'] = $member["password"];

			echo "<script>alert('로그인되었습니다.'); location.href='/web/admin.php';</script>";
		}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
			$sql2 = "select * from user_wait where id='$id'"or die("1");
			$result2 = mysqli_query($db,$sql2)or die("2");
			$member2 = mysqli_fetch_array($result2)or die("<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.back();</script>");
			$hash_password = $member2['password']or die("4");
			if($hash_password==$pw){
				echo "<script>alert('활성화되지 계정입니다. 관리자에게 문의하세요'); history.back();</script>";
			}
			else{	 
				echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.back();</script>";
			}
		}
	}
?>
