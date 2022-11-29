<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.
        
		$memo=$_POST['memo'];
		
		if(empty($memo)){
            $errMSG = 2;
        }

        if(!isset($errMSG)){
			$stmt = $con->prepare("UPDATE memo SET contents='$memo' WHERE memo_key = '12341'");
			if($stmt->execute())
			{
				$successMSG = 1;
					}
			else
			{
				$errMSG = "3";
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
                contents: <input type = "text" name = "memo" />
                <input type = "submit" name = "submit" />
            </form>
       
       </body>
    </html>

<?php 
    }
?>
