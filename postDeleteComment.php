<?php
declare(strict_types=1);
/**
 * Created by PhpStorm
 * Name: postDeleteComment.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 13:36
 */

header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$name = $_COOKIE['deleteCommentsName'];
$id = $_COOKIE['deleteCommentsId'];
$sql = "delete from msgboard where name = '$name' and article_id = '$id'";

if ($name != null && $id != null) {
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('删除评论成功！返回页面。');location.href = 'comments.php'</script>";
    }
} else {
    echo "<script>alert('删除评论失败！请检查对应评论用户名，返回页面。');location.href = 'comments.php'</script>";
}
