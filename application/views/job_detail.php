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
    <link rel="stylesheet" href="assets/css/job.css">
    <title>NfuConnect</title>
</head>
<body>
<div id="index">
    <!--导航栏开始-->
    <div class="title navbar navbar-fixed-top" style="background: #00b7ee;opacity:0.7;">
        <div class="title-left" id="logo">
            <a href="job/load_job"><img src="assets/img/back.png" alt=""></a>
        </div>
        <div class="title-center" id="title" style="color:#000;font-weight: 800;padding-right:30px;" >
            ...职位信息...
        </div>
        <div class="title-right" >
        </div>
    </div>
    <!--导航栏结束-->
    <!--内容主体开始-->
    <div class="content">
        <?php foreach ($jobs as $job){?>
        <ul id="job-list">
            <li>

                    <div class="wrapper">
                        <a href="" class="job-logo"><img src="assets/img/job.png" alt="" class="job-left"></a>
                            <div class="job-info">
                                <div class="job-header">
                                    <span class="job-header-left"><?php echo $job->job_name;?></span>
                                    <span class="job-header-right"><?php echo $job->post_date;?></span>
                                </div>
                                <div class="job-middle"><?php echo $job->job_company;?></div>
                                <div class="job-footer">
                                    <div class="job-footer-left">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                        <span><?php echo $job->job_address;?></span>
                                    </div>
                                    <div class="job-footer-moddle">
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        <span><?php echo $job->job_time;?>天/周</span>
                                    </div>
                                    <div class="job-footer-right">
                                        <span>￥<?php echo $job->money_start;?>-<?php echo $job->money_end;?>/天</span>
                                    </div>
                                </div>
                            </div>
                    </div>

            </li>
        </ul>
            <div class="phone">联系电话：<?php echo $job->job_phone;?></div>
            <div class="phone">职位描述：</div>
            <div class="phone" style="text-indent: 35px;"><?php echo $job->job_description;?></div>
        <?php }?>
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
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>