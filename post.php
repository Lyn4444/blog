<?php
/**
 * Created by PhpStorm
 * Name: post.php
 * User: Lyn
 * Date: 2020/12/19
 * Time: 13:30
 */
header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$id = mysqli_num_rows(mysqli_query($con, "select * from msgboard"));
$name = $_COOKIE['username'];
$patch = $_POST['contents'];
$article_id = $_COOKIE['article_id'];
$contents = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $patch));
$date = date('Y-m-d H:i:s', time());
$sql = "insert into msgboard values('$id','$name','$contents','$date','$article_id')";

if ($name != null && $patch != null) {
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('评论成功！返回页面。');location.href = 'article.php?id='+ $article_id</script>";
    }
} else {
    echo "<script>alert('评论失败！返回页面。');location.href = 'article.php?id='+ $article_id</script>";
}

