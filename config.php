<?php
declare(strict_types=1);
/**
 * Created by PhpStorm
 * Name: config.php
 * User: Lyn
 * Date: 2020/12/19
 * Time: 23:00
 */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "blog";

// 创建连接
$con = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($con->connect_error) {
    die("连接失败: " . $con->connect_error);
}
