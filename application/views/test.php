<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo site_url();?>">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="welcome/index">这里跳转</a>
   <div id="container"></div>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery.pjax/1.9.6/jquery.pjax.js"></script>
    <script type="text/javascript">
        $(document).pjax('a', '#container', {fragment:'#container', timeout:5000});
    </script>
</body>
</html>