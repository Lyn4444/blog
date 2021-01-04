<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm
 * Name: archive.php
 * User: Lyn
 * Date: 2020/12/19
 * Time: 23:20
 */

include("config.php");//引入数据库连接文件
$sql = "select * from articles order by id DESC";
$result = mysqli_query($con, $sql);
$tagsSql = "select distinct tag from articles";
$tagsRes = mysqli_query($con, $tagsSql);
$isLogin = $_COOKIE['isLogin'];
$isAdmin = $_COOKIE['isAdmin'];
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
                if ($isLogin == 1)  {
                    ?>
                    <li><a href="out.php">登出</a></li>
                    <?php
                }
                if ($isAdmin == 1) {
                    ?>
                    <li><a href="management.php">管理</a></li>
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
        <div id="article-catalog">
            <h1 class="catalog">文章分类</h1>
            <ul>
                <?php
                while ($row = mysqli_fetch_array($tagsRes)) {
                    ?>
                    <li><a href="#"><?php echo $row[0] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </aside>


    <div class="article-inner">
        <div class="article-body">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <p><a href="article.php?id=<?php echo $row[0]; ?>"><?php echo $row[1] ?></a>
                    <br/><?php echo $row[3] ?></p>
                <?php
            }
            ?>
        </div>
    </div>

</body>
</html>