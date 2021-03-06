<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm
 * Name: deleteBlog.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 14:10
 */

include("config.php");
$sql = "select * from articles order by id DESC";
$result1 = mysqli_query($con, $sql);
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
                <li><a href="management.php">用户管理</a></li>
                <li><a href="comments.php">评论管理</a></li>
                <li><a href="write.php">写Blog</a></li>
                <li><a href="deleteBlog.php">删除Blog</a></li>
            </ul>
        </header>
    </div>

    <div id="other-comments" class="other-comments">
        <?php
        while ($row = mysqli_fetch_array($result1)) {
            ?>
            <h6 class="comments">Blog名：<?php echo $row[1]; ?></h6>
            <h6 class="comments-right"><a href="postDeleteBlog.php">删除Blog<?php setcookie('deleteBlogName', strval($row[1])); setcookie('deleteBlogId', strval($row[0])); ?></a></h6>
            <div class="divider-for-comments"></div>
            <?php
        }
        ?>
    </div>

    <div id="comments" class="comments-area"></div>
</body>
</html>
