<?php
declare(strict_types=1);
/**
 * Created by PhpStorm
 * Name: postDelete.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 13:17
 */

header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$name = $_COOKIE['delete'];
$sql = "delete from users where username = '$name'";

if ($name != null) {
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('删除成功！返回页面。');location.href = 'management.php'</script>";
    }
} else {
    echo "<script>alert('删除失败！请检查对应用户名，返回页面。');location.href = 'management.php'</script>";
}