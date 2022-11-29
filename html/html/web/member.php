<?php  
	include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>crakers</title>
</head>
<body>
	<form method="post" action="/web/member_ok.php">
		<h1>회원가입 </h1>
			<fieldset>
				<legend>입력사항</legend>
					<table>
						<tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="id" placeholder="아이디"></td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="password" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>전화번호</td>
							<td><input type="text" size="35" name="tel" placeholder="전화번호"></td>
						</tr>
						<tr>
							<td>성별</td>
							<td>남<input type="radio" name="sex" value="male"> 여<input type="radio" name="sex" value="female"></td>
						</tr>
					</table>

				<input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>
</body>
</html>
