<?php
/**
 * Created by PhpStorm
 * Name: postWrite.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 13:59
 */

header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$name = $_POST['title'];
$tag = $_POST['tag'];
$patch = $_POST['contents'];
$article_id = $_COOKIE['article_id'];
$contents = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $patch));
$date = date('Y-m-d H:i:s', time());
$sql = "insert into articles(`title`, `tag`, `date`, `contents`) values('$name', '$tag', '$date', '$contents')";

if ($name != null && $patch != null && $tag != null) {
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('写Blog成功！返回页面。');location.href = 'write.php'</script>";
    }
} else {
    echo "<script>alert('写Blog失败！请检查标签，标题和内容正文，返回页面。');location.href = 'write.php'</script>";
}
