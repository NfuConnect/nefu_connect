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
            <img src="assets/fonts/favicon.ico" alt="">
        </div>
        <div class="title-center" id="title" style="color:#000;font-weight: 800">
          ...职位列表...
        </div>
        <div class="title-right" >
            <a href="job/publish_job"><img id="open" src="assets/fonts/add.ico" alt="" "></a>
        </div>
    </div>
    <!--导航栏结束-->
    <!--内容主体开始-->
    <div class="content">
        <ul id="job-list">


        </ul>
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
<script src="assets/js/template.js"></script>
<script src="assets/js/require.js" data-main="assets/js/job.js"></script>
<script id="job-push" type="text/html">
    <li>
        <a href="">
            <div class="wrapper">
                <a href="job/job_details?job_id={{job_id}}" class="job-logo"><img src="assets/img/job.png" alt="" class="job-left"></a>
                <a href="job/job_details?job_id={{job_id}}" style="text-decoration: none;">
                    <div class="job-info">
                        <div class="job-header">
                            <span class="job-header-left">{{job_name}}</span>
                            <span class="job-header-right">{{post_date}}</span>
                        </div>
                        <div class="job-middle">{{job_company}}</div>
                        <div class="job-footer">
                            <div class="job-footer-left">
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <span>{{job_address}}</span>
                            </div>
                            <div class="job-footer-moddle">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <span>{{job_time}}天/周</span>
                            </div>
                            <div class="job-footer-right">
                                <span>￥{{money_start}}-{{money_end}}/天</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </a>
    </li>

</script>
</body>
</html>
