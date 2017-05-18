<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/fonts/favicon.ico" type="assets/img/x-icon" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/publish.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <title>测试平台</title>
</head>
<body>
<div id="index">
    <!--导航栏开始-->
    <div class="title navbar navbar-fixed-top">
        <div class="title-left" id="logo">
            <img src="assets/fonts/favicon.ico" alt="">
        </div>
        <div class="title-center" id="title">
            NfuConnect
        </div>
        <div class="title-right" >
            <?php
            if($is_login == 'yes'){
                $open_defalt = '<img id="open" src="assets/fonts/add.ico" alt="">';
            }else{
                $open_defalt = '<img id="to_login" src="assets/fonts/add.ico" alt="">';
            }
            echo $open_defalt;
            ?>
        </div>
    </div>
    <!--导航栏结束-->
    <!--内容主体开始-->
    <div class="content">
        <ul id="message-list"></ul>
    </div>
    <!--内容主体结束-->
    <!--底部导航栏开始-->
    <footer class="footer">
        <div class="footer-left">
            <img src="assets/fonts/page-2.ico" alt="">
        </div>
        <div class="footer-right">
            <a href="welcome/user"><img src="assets/fonts/person-1.ico" alt=""></a>
        </div>
    </footer>
    <!--底部导航栏结束-->
</div>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/require.js" data-main="assets/js/index"></script>
<script id="messages-push" type="text/html">
    <li>
        <div class="wrapper">
            <div class="content-header">
                <div class="content-header-left">
                    <img src="{{portrait}}" alt="">
                    <span>{{realname}}</span>
                </div>
                <div class="content-header-right content-date">{{post_date}}</div>
            </div>
            <div class="content-middle">
                <div class="middle-text">{{content}}</div>
            </div>
            <div class="content-footer">
                <div class="content-footer-love">
                    <p class="content-footer-love-pic">
                        <img src="{{is_like}}" alt="" class="content-footer-love-img">
                        <input type="checkbox" value="{{msg_id}}" class="content-footer-love-input">
                    </p>
                    <span>{{love_num}}</span>
                </div>
                <div class="content-footer-comment">
                    <a href="welcome/details?msg_id={{msg_id}}"><img src="assets/fonts/comment.ico" alt=""></a>
                    <span>{{com_num}}</span>
                </div>
            </div>
        </div>
    </li>
</script>
</body>
</html>