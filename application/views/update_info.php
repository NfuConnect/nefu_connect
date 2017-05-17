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
    <title>东林匿名信息平台nefu_connect</title>
</head>
<body>
<div id="index">
    <header class="login-header">
        修改个人资料
    </header>
    <form class="update_info" method="post" action="welcome/update_realname">
        <div class="user-photo">
            <a href="upload/clip"><img src="<?php echo $portrait;?>" alt="username"></a>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">昵称</label>
            <div class="alert alert-warning realname-alert" role="alert"></div>
            <input name="realname" class="form-control" id="realname" placeholder="<?php echo $realname;?>" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-default" id="regSubmit">修改</button>
    </form>

    <!--底部导航栏开始-->
    <footer class="footer">
        <div class="footer-left">
            <a href="welcome/index"><img src="assets/fonts/page-1.ico" alt=""></a>
        </div>
        <div class="footer-right">
            <a href="welcome/user"><img src="assets/fonts/person-1.ico" alt=""></a>
        </div>
    </footer>
    <!--底部导航栏结束-->
</div>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/nfuConnect.js"></script>
</body>
</html>