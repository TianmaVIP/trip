<?php 

//获取到页面输入的数据
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
session_start();
$name=$_SESSION["usernamez"]; 
$password=$_SESSION["passwordz"];

// echo "新注册用户".$name."<br/>";
// echo "注册密码".$password."<br/>";
// echo "tripplandetail"."<br/>";
$plan_name=$_POST['plan_name'];
$plan_sex=$_POST['plan_sex'];
$plan_hobby=$_POST['plan_hobby'];
$plan_place=$_POST['plan_place'];
$plan_time=$_POST['plan_time'];
$plan_phone=$_POST['plan_phone'];

//连接
include("conn/db_conn.php");
include("conn/db_func.php");
if($plan_name==""||$plan_sex==""||$plan_hobby==""||$plan_place==""||$plan_time==""||$plan_phone=="")//判断是否填写 
        { 
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完整！"."\"".")".";"."</script>"; 
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."TripPlanDetail.html"."\""."</script>";     
          exit; 
        }   
 $sql_check="select trip_id from register where username='$name' and password='$password' ";
 //echo $sql_check ;
$result = mysql_query($sql_check);
if($row=mysql_fetch_array($result)){
   $trip_id=$row['trip_id'];
}
$sql_check = "select plan_id from plan where trip_id=$trip_id";
$result = mysql_query($sql_check);

$num = mysql_num_rows($result);//获取记录条数
//echo $sql_check." r=".$result."num=".$num."<br/>";
//echo "r=".$result."<br/>";
//$num = mysql_num_rows($result);//获取记录条数
if($num==0){  //没有录入了
  //执行sql
  $sql="insert into plan(plan_id,trip_id,plan_name,plan_sex,plan_hobby,plan_place,plan_time,plan_phone) values(null,'$trip_id','$plan_name','$plan_sex','$plan_hobby','$plan_place','$plan_time','$plan_phone')";
 //echo $sql."<br/>";
 //mysql_query($sql); 
 //mysql_query('SET NAMES UTF8');
 $result = mysql_query($sql);
 if($result){
   //echo "旅行计划录入成功";
   echo"<script>";
	echo"alert(\"旅行计划录入成功\");";
	echo"location. href=\"index.html\"";
	echo"</script>";
 }else{
   echo "数据录入失败，请联系管理员";
   return;
 }
}




?>

