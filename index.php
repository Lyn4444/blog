<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
/**
 * Created by PhpStorm
 * Name: index.php
 * User: Lyn
 * Date: 2020/12/19
 * Time: 23:30
 */

include("config.php");
$sql = "select * from msgboard order by date DESC,id DESC";
$result = mysqli_query($con, $sql);
$sql1 = "select * from articles order by id DESC";
$result1 = mysqli_query($con, $sql1);
$sql2 = "select * from friends";
$result2 = mysqli_query($con, $sql2);
$tagsSql = "select distinct tag from articles";
$tagsRes = mysqli_query($con, $tagsSql);
$perNumber = 5;
$page = $_GET['page'];
$count = mysqli_query($con, "select count(*) from articles");
$rs = mysqli_fetch_array($count);
$totalNumber = $rs[0];
$totalPage = ceil($totalNumber / $perNumber);
if (!isset($page)) {
    $page = 1;
}
$startCount = ($page - 1) * $perNumber;
$result3 = mysqli_query($con, "select * from articles order by id DESC limit $startCount, $perNumber");
$isLogin = $_COOKIE['isLogin'];
$isAdmin = $_COOKIE['isAdmin'];
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
</head>
<body>

<div id="container">
    <div id="wrap">
        <header id="header">
            <div id="banner">
                <img src="images/banner.png" alt="">
            </div>
            <ul>
                <li><a href="index.php">主页</a></li>
                <li><a href="archives.php">归档</a></li>
                <li><a href="about.php">关于我</a></li>
                <?php
                    if ($isLogin == 0) {
                        ?>
                        <li><a href="login.php">登录</a></li>
                        <li><a href="register.php">注册</a></li>
                        <?php
                    }
                    if ($isLogin == 1)  {
                        ?>
                        <li><a href="out.php">登出</a></li>
                        <?php
                    }
                    if ($isAdmin == 1) {
                        ?>
                        <li><a href="management.php">管理</a></li>
                        <?php
                    }
                ?>
            </ul>
        </header>
    </div>

    <aside>
        <div id="profile">
            <img class="profile img-circle loading" src="images/me.jpg" alt=""/>
            <p>Lyn</p>
            <p>大三，软件工程在读</p>
        </div>
        <div id="article-catalog">
            <h1 class="catalog">文章分类</h1>
            <ul>
                <?php
                while ($row = mysqli_fetch_array($tagsRes)) {
                    ?>
                    <li><a href="#"><?php echo $row[0] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div id="friend-link">
            <h1 class="catalog">友情链接</h1>
            <ul>
                <?php
                while ($row = mysqli_fetch_array($result2)) {
                    ?>
                    <li><a href="<?php echo $row[1] ?>"><span><?php echo $row[0]?></span></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <br>
        <div id="last-comments">
            <h1 class="catalog">最新评论</h1>
            <ul>
                <?php
                $i = 1;
                while ($i < 10) {
                    $row = mysqli_fetch_array($result);
                    ?>
                    <li><?php echo $row[1] ?>&nbsp;&nbsp; <?php echo $row[2] ?></li>
                    <?php
                    $i++;
                }
                ?></ul>
        </div>
    </aside>

    <?php
    while ($row = mysqli_fetch_array($result3)) {
        ?>
        <div class="article-inner">
            <div class="article-header"><h1 class="article-title"><a
                            href="article.php?id=<?php echo $row[0]; ?>"><?php echo $row[1] ?></a></h1>
                <p>发表于<?php echo $row[3] ?></p>
                <p>分类于<?php echo $row[2] ?></p></div>
            <div class="article-body"><p class="content"><?php echo $row[4] ?></p>
                <p><a href="article.php?id=<?php echo $row[0]; ?>" class="article-more-link">阅读全文 >></a></p>
            </div>
        </div>
        <?php
    }
    ?>
    <footer>
        <div class="foot-nav">
            <center>
                <table>
                    <tr>
                        <?php
                        for ($i = 1; $i <= $totalPage; $i++) {
                            ?>
                            <td>
                                <a href="index.php?page=<?php echo $i; ?>">
                                    <span class="page"><?php echo $i; ?></span></a>&nbsp;&nbsp;
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </center>
            <br>
        </div>
    </footer>
</div>
</body>
</html>
