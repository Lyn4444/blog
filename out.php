<?php
/**
 * Created by PhpStorm
 * Name: out.php
 * User: Lyn
 * Date: 2020/12/23
 * Time: 15:06
 */

setcookie('isLogin', strval(0));
setcookie('isAdmin', strval(0));
echo "<script>location.href='index.php'</script>";