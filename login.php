<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm
 * Name: login.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 0:24
 */

include("config.php");
$sql2 = "select * from friends";
$result2 = mysqli_query($con, $sql2);
$isLogin = 1
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/markdown.css">
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
                if ($isLogin == 1) {
                    ?>
                    <li><a href="login.php">登录</a></li>
                    <li><a href="register.php">注册</a></li>
                    <?php
                }
                ?>
            </ul>
        </header>
    </div>
    <aside>
        <div id="profile">
            <img class="profile img-circle loading" src="images/me.jpg" alt=""/>
            <p>Lyn</p>
            <p>大三，软件工程在读</p>
        </div>
        <div id="friend-link">
            <h1 class="catalog">友情链接</h1>
            <ul>
                <?php
                while ($row = mysqli_fetch_array($result2)) {
                    ?>
                    <li><a href="<?php echo $row[1] ?>"><span><?php echo $row[0] ?></span></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <br>
    </aside>

    <div id="comments" class="comments-area">
        <center>
            <br>
            <form name="form1" id="form1" method="post" action="postLogin.php" onsubmit="return CheckPost();">
                <p><label for="username"></label>
                    <label>
                        <span>账号：</span>
                        <input name="username" type="text" value="">
                    </label>
                </p>
                <br>
                <p><label for="password"></label>
                    <label>
                        <span>密码：</span>
                        <input name="password" type="password" value="">
                    </label>
                </p>
                <p>
                    <input type="submit" name="button" id="button" value="登录">
                </p>
            </form>
        </center>
    </div>
</div>
</body>
</html>

