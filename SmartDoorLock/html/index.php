<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<html>
    <head>
        <title>로그인 회원가입</title>
        <link rel="stylesheet" href="/style.css">

        
    </head>
    <body>
        <div class="wrap">
            <div class="form-wrap">
                <div class="button-wrap">
                    <div id="btn"></div>
                    <button type="button" class="togglebtn" onclick="login()">로그인</button>
                    <button type="button" class="togglebtn" onclick="register()">회원가입</button>
                </div>
                
                <form id="login" method="post" action="/web/login_ok.php" class="input-group">
                    <input type="text" name="id" class="input-field" placeholder="아이디 입력" required>
                    <input type="password" name="password" class="input-field" placeholder="비밀번호 입력" required>
                    <button class="submit">로그인</button>
                </form>
                <form id= "register" method="post" action="/web/member_ok.php" class="input-group">
                    <input type="text" name="id" class="input-field" placeholder="아이디" required>
                    <input type="password" name="password" class="input-field" placeholder="비밀번호" required>
                    <input type="text" name="name" class="input-field" placeholder="이름" required>
		    <input type="text" name="tel" class="input-field" placeholder="전화번호" required>
		    <input type="radio" name="sex" value="male">남<input type="radio" name="sex" value="female">여
                    <button class="submit">회원가입</button>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("login"); 
            var y = document.getElementById("register");
            var z = document.getElementById("btn");
            
            
            function login(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0";
            }

            function register(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }
        </script>
    </body>
</html>
