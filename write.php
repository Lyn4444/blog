<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm
 * Name: write.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 13:48
 */

include("config.php");
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
</div>
<div id="comments" class="comments-area">
</div>
<div id="comments" class="comments-area">
    <form name="form1" id="form1" method="post" action="postWrite.php" onsubmit="return CheckPost();">
        <h5>标签：</h5>
        <p><label for="tag"></label><input name="tag" type="text" id="tag" ></p>
        <h5>标题：</h5>
        <p><label for="title"></label><input name="title" type="text" id="title" ></p>
        <h5>内容正文：</h5>
        <p><label for="contents"></label><textarea name="contents" id="contents" cols="135" rows="8"></textarea></p>
        <p>
            <input type="submit" name="button" id="button" value="发送">
            <input type="reset" name="button2" id="button2" value="清空">
        </p>
    </form>
</div>
</html>