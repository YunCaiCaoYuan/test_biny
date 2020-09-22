<?php
session_start();
global  $user;//定义$user
global $user1;
$_SESSION["username"]=$user;
$username=$_SESSION["uesrname"];
$user1=implode("",$_SESSION);//将session中的数组变为字符串元素
$link=mysqli_connect("localhost","root","root","liuyan");//连接数据库

mysqli_query($link,"set names utf8");
$sql="select * from text where receiver='{$username}'";
$result=mysqli_query($link,$sql);//执行语句

if (!$result)
//{
    echo "<script>alert('留言板为空！');</script>";
//} else
//    {}
//if($num=mysqli_num_rows($result))//将HTML嵌入PHP中，实现从数据库中获得留言信息

{?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <div>
        <a href="fabu.html">发布信息</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="tuichu.php">退出系统</a></h3></div>
    <br/><br/>

    <h2>留言信息:</h2>
    <table cellpadding="0" cellspacing="0" border="1" width="60%">
        <tr bgcolor="#8BBCC7">

            <td>发送人</td>
            <td>接收人</td>
            <td>发送时间</td>
            <td>信息内容</td>
            <?php echo '<pre>';
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {?>
        <tr bgcolor="#FFFFFF">
            <td ><?php echo $row['sender'];?>&nbsp;</td>
            <td >&nbsp;<?php echo $row['receiver'];?>&nbsp;</td>
            <td >&nbsp;<?php echo $row['comment'];?>&nbsp;</td>
            <td >&nbsp;<?php echo $row['time'];?>&nbsp;</td>
            <?php
            }
            ?>
        </tr>
    </table>
    </body>
    </html>
    <?php


}?>
