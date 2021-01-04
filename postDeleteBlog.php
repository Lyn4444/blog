<?php
/**
 * Created by PhpStorm
 * Name: postDeleteBlog.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 14:18
 */

header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$title = $_COOKIE['deleteBlogName'];
$id = $_COOKIE['deleteBlogId'];
$sql = "delete from articles where title = '$title' and id = '$id'";

if ($title != null && $id != null) {
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('删除Blog成功！返回页面。');location.href = 'deleteBlog.php'</script>";
    }
} else {
    echo "<script>alert('删除Blog失败！请检查Blog是否已经删除，返回页面。');location.href = 'deleteBlog.php'</script>";
}
