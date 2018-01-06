<?php
error_reporting(0); 
header("Content-type:text/html;charset=utf-8");
//获取到页面输入的数据

session_start();

$name=$_SESSION["usernamel"]; 
$password=$_SESSION["password"];
// echo "hahahha".$name;
// echo "mimama密码".$password;


$trip_id=$_POST['trip_id'];
$plan_name=$_POST['plan_name'];
$plan_sex=$_POST['plan_sex'];
$plan_hobby=$_POST['plan_hobby'];
$plan_place=$_POST['plan_place'];
$plan_time=$_POST['plan_time'];
$plan_phone=$_POST['plan_phone'];


// 连接
include("conn/db_conn.php");
include("conn/db_func.php"); 

$sql_id="select trip_id from register where username='$name' and password='$password'";
//echo "sql=".$sql_id."<br/>";
//$sql_id="select plan_id from plan where trip_id='$sql_id'"; 
//echo "sql=".$sql_id."<br/>";
$result = mysql_query($sql_id); 
$trip_id='';
if($row=mysql_fetch_array($result)){
   $trip_id=$row['trip_id'];
}
if($trip_id!=''){
 $sql_plan="select trip_id,plan_name,plan_sex,plan_hobby,plan_place,plan_time,plan_phone from  plan where trip_id=$trip_id   order by plan_id"; 
// echo "sql_plan=".$sql_plan."<br/>";
 $result = mysql_query($sql_plan); 
 
  echo "<html>"; 
  echo "<head>"; 
  echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
  echo "<title>说走就走的旅行会员注册</title>";

  echo "<!-- Font Awesome -->";
  echo "<link rel='stylesheet' href='font-awesome/css/font-awesome.min.css'>";
	
  echo "<!-- Bootstrap -->";
  echo "<link rel='stylesheet' href='css/bootstrap.min.css'>";
	
  echo "<!-- Owl Carousel-->";
  echo "<link rel='stylesheet' href='css/owl.carousel.css'>";
  echo "<link rel='stylesheet' href='css/owl.theme.css'>";	
	
  echo "<!-- Preloader -->";
  echo "<link rel='stylesheet' href='css/preloader.css' media='screen,print'/>";
    
  echo "<!-- Styles -->";
  echo "<link rel='stylesheet' href='css/style.css'>";
  echo "</head>"; 
  echo "<body >";   
 //echo "<div style='height:100px'></div>";
 echo "<section>";
 echo "<header id='home'>";
 echo "<div class='section_overlay' >";
	 echo "<nav class='navbar navbar-default navbar-fixed-top' >";
	 echo "<div class='container'>";
	 echo "<div class='navbar-header'>";
	 echo "<a class='navbar-brand' href='#'><span class='logo'><i class='fa fa-paper-plane-o' aria-hidden='true'></i>说走就走的旅行</span></a><br>";  
	 echo "</div>";					
	 echo "</div>";
	 echo "</nav>";	
		echo "<div class='container'>";
		echo "<div class='row'>";
		echo "<div class='col-md-12 text-center'>";
		echo "<div style='height:50px'></div>";
		
		echo "<div class='home_text' style='text-align:center;width:800px; hight:300px; border:0px solid #46C7C7;margin:0 auto; color: #000000;background-size: cover;' >";
			echo "<h1> 说 走 就 走 的 旅 行 计 划</h1>"."<br/>" ;
				echo "<div style='text-align:right;margin:0 auto;color:black;'>";    // 1  
				echo " <span>用户： ";
				echo $_SESSION["usernamel"]."<br/>"; 
				echo " </span> "."<br/>"; 
				echo " <a  style='color:red;' href='./index.html'>返回首页</a>"."<br/>" ; 
				echo "</div>"."<br/>" ; 
			echo "<table align='center' border='1' cellspacing='0' cellpadding='8'  bordercolor='1px solid #46C7C7' style='color:#000000'>";                                                                                           
			echo "<tr>";
			echo "<td style='width:100px;text-align:center;font-weight:bold;'>&nbsp;姓名$plan_name</td>";
			echo "<td style='width:100px;text-align:center;font-weight:bold;'>性别$plan_sex</td>";
			echo "<td style='width:100px;text-align:center;font-weight:bold;'>爱好$plan_hobby</td>";
			echo "<td style='width:100px;text-align:center;font-weight:bold;'>时间$plan_time</td>";
			echo "<td style='width:100px;text-align:center;font-weight:bold;'>地方$plan_place</td>";
			echo "<td style='width:150px;text-align:center;font-weight:bold;'>联系方式$plan_phone</td>";
			//echo "<td style='width:150px;text-align:center;font-weight:bold;'>邮箱$username</td>";
			echo "</tr>";
			 $rows=0;
			 while($row=mysql_fetch_array($result)){
			   $rows=$rows+1;
			   $trip_id=$row['trip_id'];
			   $plan_name=$row['plan_name'];
			   $plan_sex=$row['plan_sex'];
			   $plan_hobby=$row['plan_hobby'];
			   $plan_time=$row['plan_time'];
			   $plan_place=$row['plan_place'];
			   $plan_phone=$row['plan_phone'];
			   //username=$row['username'];
				echo "<tr style='text-align:center;color:#000000; font-weight:10px;'>
						  <td>$plan_name</td>
						  <td>$plan_sex</td>
						  <td>$plan_hobby</td>
						  <td>$plan_time</td>
						  <td>$plan_place</td>
						  <td>$plan_phone</td>  
					</tr>";
			   
			 }
			 
			 while(($rows++)<1){
			 echo "<tr><td style='text-align:center;'>&nbsp;</td><td  style='text-align:center;'>&nbsp;</td><td  style='text-align:center;'>&nbsp;</td></tr>";
			 }


			 echo "</table>"; 	
		echo "</div>";					
		echo "</div>";
		echo "</div>";					
		echo "</div>";
		
		echo "<div class='container'>";
		echo "<div class='row'>";
		echo "<div class='col-md-12 text-center'>";	
		echo "<div style='height:90px'></div>";
		echo "</div>";
		echo "</div>";					
		echo "</div>";	
  echo "</div>";															
echo "</header>";
echo "<div class='content-wrap'>";
	echo "<div class='content'>"; 
		echo "<footer id='more'>";  
			echo "<div class='container'>";  
				echo "<div class='container'>";  
				echo "<div class='row'>";
				echo "<div class='col-md-12 text-center'>"; 
				echo "<div class='social'>"; 
				
					echo "<h2>更多资讯</h2>"; 
					echo "<ul class='icon_list'>";
						echo "<li><a href='http://w.qq.com/'><i class='fa fa-qq' aria-hidden='true'></i></a></li>";
						echo "<li><a href='http://wx.qq.com/'><i class='fa fa-weixin' aria-hidden='true'></i></a></li>";
						echo "<li><a href='https://weibo.com/'><i class='fa fa-weibo' aria-hidden='true'></i></a></li>";
						echo "<li><a href='http://www.renren.com/'><i class='fa fa-renren' aria-hidden='true'></i></a></li><br/>";
					echo "</ul>";
					echo "</div>";	
					echo "<div class='copyright_text'>";
					echo "<p>&copy; 2017 <span>天马行空</span></p>";
					echo "</div>";		
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				
			echo "</div>";		 
		echo "</footer>"; 
	echo "</div>";
echo "</div>";	 
 
 echo "</body>";

}


?>



