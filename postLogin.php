<?php
declare(strict_types=1);
/**
 * Created by PhpStorm
 * Name: postLogin.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 0:59
 */
header("Content-Type:text/html;charset = utf8");
include("config.php");
ini_set('date.timezone', 'Asia/Shanghai');
$username = $_POST['username'];
$password = $_POST['password'];
$sql = mysqli_num_rows(mysqli_query($con, "select * from users where username = '$username' and password = '$password'"));

if ($username != null && $password != null) {
    if ($sql > 0) {
        $isLogin = 1;
        setcookie('isLogin', strval($isLogin));
        setcookie('username', strval($username));
        $temp = mysqli_query($con, "select distinct admin from users where username = '$username' and password = '$password'");
        $isAdmin = mysqli_fetch_array($temp);
        setcookie('isAdmin', strval($isAdmin[0]));
        echo "<script>alert('登录成功！返回主页。');location.href = 'index.php'</script>";
    }
} else {
    echo "<script>alert('登录失败！请检查账号和密码，返回登录。');location.href = 'login.php'</script>";
}

