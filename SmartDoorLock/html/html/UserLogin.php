<?php

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');
    $id = $_POST["id"];
    $password = $_POST["password"];
    
    $statement = $con->prepare('SELECT * FROM user WHERE id LIKE (:id) AND password LIKE (:password)');
    $statement->bindParam(':id', $id);
    $statement->bindParam(':password', $password);
    $statement->execute();
    
  
    $row = $statement->fetchall(); 
    
   
        if(empty($id)){
            $errMSG = 3;
        }
        else if(empty($password)){
            $errMSG = 4;
        } 
        if(!isset($errMSG)) // 이름과 나라 모두 입력이 되었다면 
        {
            if($row==True){
            //로그인성공 1보냄
                $successMSG = 1;
    
            }
            else{
        //실패 2보냄
                $successMSG = 2;
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
                <input type = "submit" name = "submit" />
            </form>
       
       </body>
    </html>

<?php 
    }
?>

