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
    <link rel="stylesheet" href="assets/css/publish_job.css">
    <title>NfuConnect</title>
</head>
<body>
<div id="index">
    <div class="title navbar navbar-fixed-top" style="background: #00b7ee;opacity:0.7;">
        <div class="title-left" id="logo">

        </div>
        <div class="title-center" id="title" style="color:#000;font-weight: 800">
            ...发布职位...
        </div>
        <div class="title-right" >

        </div>
    </div>
    <!--导航栏结束-->
    <!--内容主体开始-->
    <div class="content">
        <form action="job/add_job" method="post" id="publish-job">
            <div class="form-group">职位名称：<input type="text" name="job_name" class="form-control"></div>
            <div class="form-group">公司名称：<input type="text" name="company_name" class="form-control"></div>
            <div class="form-group">工作地址：<input type="text" name="job_address" class="form-control"></div>
            <div class="form-group">工作时长：<input type="text" name="job_time" class="form-control"></div>
           <div class="form-group"> <div>工资：</div><input type="text" name="money_start" class="form-control" style="display: inline-block">—<input type="text" name="money_end" class="form-control" style="display: inline-block"></div>
            <div class="form-group">联系电话：<input type="text" name="phone" class="form-control"></div>
            <div class="form-group">职位描述: <textarea name="description" cols="20" rows="5" class="form-control" style="width:82%;"></textarea></div>
            <div style="text-align: center;padding-left: 0;"><button type="submit" class="btn btn-default">发布</button></div>
        </form>
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