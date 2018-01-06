<?php 

//获取到页面输入的数据
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
session_start();
//$name=$_SESSION["usernamez"]; 
//$password=$_SESSION["passwordz"];

// echo "新注册用户".$name."<br/>";
// echo "注册密码".$password."<br/>";
// echo "tripplandetail"."<br/>";
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$body=$_POST['body'];


//连接
include("conn/db_conn.php");
include("conn/db_func.php");
if($name==""||$email==""||$subject==""||$body=="")//判断是否填写 
        { 
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完整！"."\"".")".";"."</script>"; 
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."index.html"."\""."</script>";     
          exit; 
        }  
 $sql_check="select submit_id from submit where name='$name' and email='$email' ";
 //echo $sql_check ;
$result = mysql_query($sql_check);


$num = mysql_num_rows($result);//获取记录条数
//echo $sql_check." r=".$result."num=".$num."<br/>";
//echo "r=".$result."<br/>";
//$num = mysql_num_rows($result);//获取记录条数
	if($num==0){  //没有录入了
	  //执行sql
	  $sql="insert into submit(submit_id,name,email,subject,body) values(null,'$name','$email','$subject','$body')";
		echo $sql."<br/>";
	 //mysql_query($sql); 
	 mysql_query('SET NAMES UTF8');
	 $result = mysql_query($sql);
	 if($result){
	   //echo "旅行计划录入成功";
	   echo"<script>";
		echo"alert(\"您的请求我们已收到，稍后为您服务\");";
		echo"location. href=\"index.html\"";
		echo"</script>";
	 }else{
	   echo "反馈问题失败，请联系管理员";
	   return;
	 }
	}




?>

