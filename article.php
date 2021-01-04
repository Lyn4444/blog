<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("config.php");//引入数据库连接文件
$id = isset($_GET['id']);
if (isset($id)) {
    setcookie('article_id', $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM articles WHERE id =  ". $_GET['id']);
}
$sql = "select * from msgboard where article_id = " . $_GET['id'];
$result1 = mysqli_query($con,$sql);
$sql2 = "select * from friends";
$result2 = mysqli_query($con, $sql2);
$tagsSql = "select distinct tag from articles";
$tagsRes = mysqli_query($con, $tagsSql);
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
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="css/markdown.css">
    <script language=javascript>
        function CheckPost() {
            if (form1.name.value === "") {
                alert("请填写用户名");
                form1.name.focus();
                return false;
            }
            if (form1.content.value === "") {
                alert("必须填写留言内容");
                form1.content.focus();
                return false;
            }
        }
    </script>
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
    <!-- 文章目录放在这里-->


    <aside>
        <div id="profile">
            <img class="profile img-circle loading" src="images/me.jpg" alt=""/>
            <p>Lyn</p>
            <p>大脸猫</p>
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

    </aside>


    <!--文章内容这里咯-->

    <div class="article-inner">
        <div class="article-header">

            <?php
            while ($row = mysqli_fetch_array($result))
            {
            ?>
            <h1 class="article-title"><a href="#"><?php echo $row[1] ?></a></h1>
            <p><?php echo $row[3] ?></p></div>
        <div class="article-body"><p><?php echo $row[4] ?></p></div>
        <?php
        }
        ?>
    </div>

    <!-- 分享文章咯-->
    <div class="bdsharebuttonbox">
        <a href="#" class="bds_more" data-cmd="more"></a>
        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
        <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
    <div id="other-comments" class="other-comments">
        <?php
        while ($row = mysqli_fetch_array($result1)) {
            ?>
            <h6 class="commenter">用户名：<?php echo $row[1]; ?></h6>
            <h6 class="date">评论时间：<?php echo $row[3]; ?></h6>
            <h6 class="comments">评论内容：<?php echo $row[2]; ?></h6>
            <div class="divider-for-comments"></div>
        <?php
        }
        ?>
    </div>

    <div id="comments" class="comments-area">
        <h4>编写评论:</h4>
        <form name="form1" id="form1" method="post" action="post.php" onsubmit="return CheckPost();">
            <p><label for="contents"></label><textarea name="contents" id="contents" cols="135" rows="1"></textarea></p>
            <p>
                <input type="submit" name="button" id="button" value="发送">
                <input type="reset" name="button2" id="button2" value="清空">
            </p>
        </form>
    </div>
</div>

    <!-- 分享文章-->
    <script type="text/javascript">
    window._bd_share_config = {
            "common": {
                "bdSnsKey": {
                    "tsina": "分享LynBlog的文章",
                    "tqq": "分享LynBlog的文章",
                    "t163": "分享LynBlog的文章",
                    "tsohu": "分享LynBlog的文章"
                },
                "bdText": "LynBlog的博客技术日志",
                "bdMini": "2",
                "bdMiniList": ["qzone", "tsina", "weixin", "sqq", "hi", "youdao", "mail", "copy"],
                "bdPic": "",
                "bdStyle": "2",
                "bdSize": "24"
            }, "share": {}
        };
        with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
    </script>

</body>
</html>