<?php
namespace app\controller;
//use App;
//
//include "../../app/controller/base/baseAction.php";
//include "../../app/controller/boardHelper.php";
//include "../../lib/Autoload.php";
//
//Autoload::init();

session_start();
$user=$_POST["username"];
$_SESSION["uesrname"]=$user;//session超全局变量
//$pwd=$_POST["password"];//获取密码
if($user=""||$pwd="")
{
    echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
}
else
{

//    $boardHelper = new boardHelper();
//    $ret = $boardHelper->check_login();


    $link=mysqli_connect("localhost","root","root","liuyan");//连接数据库
    mysqli_query($link,"set names utf8");
    $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
    $result=mysqli_query($link,$sql);//执行sql语句
    $num=mysqli_num_rows($result);//统计影响结果行数，作为判断条件

    if($num)
    {
        echo "<script>alert('登录成功！');window.location='003.php';</script>";//登录成功页面跳转
    }
    else
    {
        echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
    }
}
?>
