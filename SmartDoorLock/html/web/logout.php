<meta charset="utf-8">
<?php
	include "db.php";
	include "index.php";
	
	session_destroy();

echo "<script>alert('로그아웃되었습니다.'); location.href='/index.php'; </script>";
?>
