
<?php 
//获取到页面输入的数据
error_reporting(0);
session_start();
$usernamez=$_POST["usernamez"]; 
$passwordz=$_POST["passwordz"];
$password2=$_POST["password2"];
echo "username=".$usernamez."<br/>";
echo "password1=".$passwordz."<br/>";
echo "password2=".$password2."<br/>";
echo "register"."<br/>";

$link=mysql_connect("localhost","root","root");//链接数据库 
header("Content-type:text/html;charset=utf-8"); 
if($link) 
  {   
    //echo"链接数据库成功"; 
    $select=mysql_select_db("trip",$link);//选择数据库 
    if($select) 
    { 
      //echo"选择数据库成功！"; 
      if(isset($_POST["sub"])) 
      { 
        $name=$_POST["usernamez"]; 
        $password1=$_POST["passwordz"];//获取表单数据 
        $password2=$_POST["password2"]; 
        if($name==""||$password1=="")//判断是否填写 
        { 
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完整！"."\"".")".";"."</script>"; 
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";     
          exit; 
        } 
        if($password1==$password2)//确认密码是否正确 
        { 
        $str="select count(*) from register where username="."'"."$name"."'"; 
        $result=mysql_query($str,$link); 
        $pass=mysql_fetch_row($result); 
        $pa=$pass[0]; 
        if($pa==1)//判断数据库表中是否已存在该用户名 
        { 
          
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."该用户名已被注册"."\"".")".";"."</script>"; 
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";    
        exit;  
        } 
          
          
        //$sql="insert into register values('.'\''.'$name'.'\''.','.'\''.'$password1'.'\''.')";//将注册信息插入数据库表中
		$sql="insert into register values('','$name','$password1')";
        //echo "$sql"; 
        mysql_query($sql,$link); 
        mysql_query('SET NAMES UTF8'); 
        $close=mysql_close($link); 
        if($close) 
        { 
			$_SESSION["usernamez"]=$name;
			$_SESSION["passwordz"]=$password1;
			 //echo "新注册用户".$_SESSION["usernamez"]."<br/>";
			 //echo "注册密码".$_SESSION["passwordz"]."<br/>";
			 //echo "tripplandetail"."<br/>";
          //echo"数据库关闭"; 
          //echo"注册成功！"; 
          
		  echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录成功，请继续填写旅行计划"."\"".")".";"."</script>"; 
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."TripPlanDetail.html"."\""."</script>"; 
		  //header("Location:TripPlanDetail.html");		
        } 
        } 
        else
        { 
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密码不一致！"."\"".")".";"."</script>"; 
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";     
        } 
      } 
    } 
  } 
?>