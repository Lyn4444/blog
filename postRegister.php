<?php
declare(strict_types=1);
/**
 * Created by PhpStorm
 * Name: postRegister.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 0:59
 */
header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$id = mysqli_num_rows(mysqli_query($con, "select * from users"));
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "insert into users values('$username', '$password', 0, '$id')";

if ($username != null && $password != null) {
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('注册成功！返回登录。');location.href = 'login.php'</script>";
    }
} else {
    echo "<script>alert('注册失败！请检查账号和密码，返回注册。');location.href = 'register.php'</script>";
}



