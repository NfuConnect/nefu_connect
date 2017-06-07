<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <title>测试平台</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/fonts/favicon.ico" type="assets/img/x-icon" />
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div id="index">
    <header class="user-header">
        <a href="welcome/exit_login"><span class="user-more glyphicon glyphicon-option-horizontal"></span></a>
        <button type="button" class="user-more glyphicon glyphicon-option-horizontal" data-toggle="modal" data-target=".bs-example-modal-sm"></button>
        <div class="user-photo">
            <img src="<?php echo $portrait;?>" alt="username">
            <div><?php echo $realname;?></div>
        </div>
        <div class="user-info">
            <div class="user-info-left">
                <a href="welcome/your_msg"><span>帖子</span></a>
                <a href="welcome/your_msg">
                    <span class="number">
                        <?php foreach ($msg_counts as $msg_count){ echo $msg_count->num; }?>
                    </span>
                </a>
            </div>
            <div class="user-info-right">
                <a href="welcome/your_love"><span>喜欢</span></a>
                <a href="welcome/your_love">
                    <span class="number">
                        <?php foreach ($com_counts as $com_count){ echo $com_count->num; }?>
                    </span>
                </a>
            </div>
        </div>
    </header>
    <div class="user-content">
        <div class="user-content-title">
            nefu_connect服务
        </div>
        <div class="user-content-item">
            <ul>
                <li class="col-xs-6 col-sm-4">
                    <a href="http://music.163.com/">
                    <div>
                        <p class="glyphicon glyphicon-music"></p><br/>
                        <span>网易云音乐</span>
                    </div>
                    </a>
                 </li>
                <li class="col-xs-6 col-sm-4">
                    <a href="http://www.meituan.com/">
                    <div>
                        <p class="glyphicon glyphicon-glass"></p><br/>
                        <span>美团</span>
                    </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4">
                    <a href="http://www.youdao.com/">
                    <div>
                        <p class="glyphicon glyphicon-pencil"></p><br/>
                        <span>有道</span>
                    </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4">
                    <a href="https://zhidao.baidu.com/">
                    <div>
                        <p class="glyphicon glyphicon-search"></p><br/>
                        <span>百度知道</span>
                    </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4">
                    <a href="http://map.baidu.com/">
                    <div>
                        <p class="glyphicon glyphicon-map-marker"></p><br/>
                        <span>百度地图</span>
                    </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4">
                    <a href="http://mail.163.com/">
                    <div>
                        <p class="glyphicon glyphicon-envelope"></p><br/>
                        <span>网易邮箱</span>
                    </div>
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4">
                    <a href="https://zh.airbnb.com/">
                    <div>
                        <p class="glyphicon glyphicon-home"></p><br/>
                        <span>Airbnb</span>
                    </div>
                    </a>
                </li>

                <li class="col-xs-6 col-sm-4">
                    <a href="job/load_job">
                        <div>
                            <p class="glyphicon glyphicon-home"></p><br/>
                            <span>大学生兼职</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-left">
            <a href="welcome/index"><img src="assets/fonts/page-1.ico" alt=""></a>
        </div>
        <div class="footer-right">
            <img src="assets/fonts/person-2.ico" alt="">
        </div>
    </footer>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <a href="welcome/update_info"><button type="button" id="amend_name" class="btn btn-default btn-lg btn-block">修改个人资料</button></a>
            </div>
            <div class="modal-content">
                <a href="welcome/update_pass"><button type="button" id="amend_pass" class="btn btn-default btn-lg btn-block">修改密码</button></a>
            </div>
            <div class="modal-content">
                <a href="welcome/exit_login"><button type="button" id="exit_login" class="btn btn-default btn-lg btn-block">退出登录</button></a>
            </div>
        </div>
    </div>

</div>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
