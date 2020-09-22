<?php
session_start();
header("Content-type: text/html; charset=utf-8"); //处理数据库用户名乱码
$user=$_POST["username"];
$pwd=$_POST["password"];
if($user==""||$pwd=="")
{
    echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
}
else
{

    $link=mysqli_connect("localhost","root","root","liuyan");//连接数据库
    mysqli_query($link,"set names utf8");
    $sql="select username from user where username='$_POST[username]'";
    $result=mysqli_query($link,$sql);//执行sql语句
    $num=mysqli_num_rows($result);//统计执行结果影响的行数
    if($num)//如果存在该用户
    {
        echo "<script>alert('用户名已存在！'); history.go(-1);</script>";
    }
    else//注册新用户
    {
        $sql_insert="insert into user (username,password)values('$_POST[username]','$_POST[password]')";
        $res_insert=mysqli_query($link,$sql_insert);
        if($res_insert)
        {
            echo "<script>alert('注册成功！');window.location='denglu.html';</script>";
        }
        else
        {
            echo "<script>alert('系统繁忙请重试！'); history.go(-1);</script>";
        }
    }
}
?>


