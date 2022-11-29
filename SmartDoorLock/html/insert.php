<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.
        
		$id=$_POST['id'];
		$password=$_POST['password'];
        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $sex=$_POST['sex'];
		
		

        if(empty($name)){
            $errMSG = 2;
        }
        else if(empty($id)){
            $errMSG = 3;
        }
        else if(empty($password)){
            $errMSG = 4;
        }
        else if(empty($tel)){
            $errMSG = 5;
        }
        else if(empty($sex)){
            $errMSG = 6;
        }
        
        

        if(!isset($errMSG)) // 이름과 나라 모두 입력이 되었다면 
        {
            try{
                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다. 
                $stmt = $con->prepare('INSERT INTO user_wait(id, password, name, tel, sex) VALUES(:id, :password, :name, :tel, :sex)');
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':tel', $tel);
                $stmt->bindParam(':sex', $sex);
                

                if($stmt->execute())
                {
                    $successMSG = 1;
                }
                else
                {
                    $errMSG = "사용자 추가 에러";
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
            }
        }

    }

?>


<?php 
    if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;

 $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
   
    if( !$android )
    {
?>
    <html>
       <body>

            <form action="<?php $_PHP_SELF ?>" method="POST">
                id: <input type = "text" name = "id" />
                password: <input type = "text" name = "password" />
                name: <input type = "text" name = "name" />
                tel: <input type = "text" name = "tel" />
                sex: <input type = "text" name = "sex" />
                <input type = "submit" name = "submit" />
            </form>
       
       </body>
    </html>

<?php 
    }
?>
