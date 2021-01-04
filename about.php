<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm
 * Name: about.php
 * User: Lyn
 * Date: 2020/12/19
 * Time: 23:40
 */

$isLogin = $_COOKIE['isLogin'];
?>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="description" content="MyBlog">
    <meta name="keywords" content="MyBlog">
    <link rel="shortcut icon" href="images/logo.ico" type="images/x-icon"/>
    <link rel="icon" href="images/logo.png" type="images/gif"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MyBlog</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/article.css">
</head>
<body>
<div id="container">
    <div id="wrap">
        <header id="header">
            <div id="banner">
                <img src="images/banner.png" alt="">
            </div>
            <ul>
                <li><a href="index.php">主页</a></li>
                <li><a href="archives.php">归档</a></li>
                <li><a href="about.php">关于我</a></li>
                <?php
                if ($isLogin == 0) {
                    ?>
                    <li><a href="login.php">登录</a></li>
                    <li><a href="register.php">注册</a></li>
                    <?php
                }
                ?>
            </ul>
        </header>
    </div>


    <div class="article-inner">
        <div class="article-header">

            <h1 class="article-title"><a href="">关于</a></h1>
            <p>2020,12,20</p></div>
        <div class="article-body"><p>喜欢音乐， 大三软件工程在读。</p>
            <p>喜欢看电影，热爱光影交错之中的福尔摩斯。还记得书里的他对华生说——</p>
            <p><em>“笨蛋虽笨，但还有更笨的人为他们鼓掌。”</em></p>
            <br/><br/>
            联系方式：QQ邮箱： 3077002706@qq.com
        </div>
    </div>


</body>
</html>