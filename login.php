<?php 
//获取到页面输入的数据
error_reporting(0);
session_start();
$username2=$_POST["usernamel"]; 
$password2=$_POST["passwordl"];
//echo "username=".$username2."<br/>";
//echo "password=".$password2."<br/>";
//echo "login"."<br/>";

?>

<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include("conn/db_conn.php");
include("conn/db_func.php"); 
$link=mysql_connect("localhost","root","root"); 
if($link) 
{ 
  $select=mysql_select_db("trip",$link); 
  if($select) 
  { 
    if(isset($_POST["subl"])) 
    { 
      $name=$_POST["usernamel"]; 
      $password=$_POST["passwordl"]; 
      if($name==""||$password=="")//判断是否为空 
      { 
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写正确的信息！"."\"".")".";"."</script>"; 
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>"; 
        exit; 
      } 
      $str="select password from register where username="."'"."$name"."'"; 
      mysql_query('SET NAMES UTF8');     
	  $result=mysql_query($str,$link); 
      $pass=mysql_fetch_row($result); 
      $pa=$pass[0]; 
      if($pa==$password)//判断密码与注册时密码是否一致 
      { 
        echo"登录成功！";
		$_SESSION["usernamel"]=$name;
		$_SESSION["password"]=$pa;
		//echo "username=".$name."<br/>";
		//echo "password=".$pa."<br/>";
		//echo "yes"."<br/>";
		header("Location:success.php");		
        //echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."success.php"."\""."</script>"; 
      } 
      else{   
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录失败！"."\"".")".";"."</script>"; 
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>"; 
      } 
    } 
      
  } 
} 
?>