<?php 
	include('../dbcon.php'); 
?>
<html>


<div class="container">
	
	<div class="page-header">
    	<h1 class="h2">&nbsp; 사용자 목록</h1><hr>
    </div>
<div class="row">

    <table>  
        <thead>  
        <tr>  
            <th>아이디</th>  
            <th>이름</th>
            <th>   </th>  
            <th>   </th>  
        </tr>  
        </thead> 
  
        <?php  
	    $stmt = $con->prepare('SELECT * FROM user_wait ORDER BY id DESC');
	    $stmt->execute();

            if ($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	        {
		    extract($row);
       
		if ($id != 'admin'){
		?>  
			<tr>  
			<td><?php echo $id;  ?></td> 
			<td><?php echo $name; ?></td>
			<td><a class="btn btn-primary" href="change.php?change_id=<?php echo $id ?>"onclick="return confirm('<?php echo $id ?> 사용자를 활성화할까요??')"><span class="glyphicon glyphicon-pencil"></span> 활성화</a></td> 
			<td><a class="btn btn-warning" href="delete.php?del_id=<?php echo $id ?>" onclick="return confirm('<?php echo $id ?> 사용자를 삭제할까요?')">
			<span class="glyphicon glyphicon-remove"></span>삭제</a></td>
			</tr>
		
        <?php
			}
                }
             }
        ?>  
        </table>  
</div>

</body>
</html>
