?php
 
 $username=$_POST['id'];
 
 $conn=mysqli_connect('localhost','root','herewego666','liuyanban');//分别代表对应数据库服务器地址、用户名、密码、所要操作的数据库名称//
 
 mysqli_query($conn,"set names utf8");
 
 if($conn){
     if(isset($_POST['msg'])){
         $sqlstr="insert into msg_board(username,msg) values('".$username."','".$_POST['msg']."')";
         mysqli_query($conn,$sqlstr);
		 
     }
     $sqlstr="select * from msg_board";
     $result=mysqli_query($conn,$sqlstr);
	 if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
     if(mysqli_num_rows($result)){
         while($row=mysqli_fetch_assoc($result)){
             echo "
                 <div>
                     <p id='msg'><span id='username'>".$row['username']."</span> :".$row['msg']."</p>
                 </div>
             ";
         }
     }
 }
 else{
     echo "mysql connect error!";
 }
 ?>
     
 </body>
 </html>
