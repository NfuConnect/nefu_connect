<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url();?>">
    <link rel="shortcut icon" href="assets/fonts/favicon.ico" type="assets/img/x-icon" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/detail.css">
    <title>测试平台</title>
</head>
<body>
<div id="index">
    <!--导航栏开始-->
    <div class="title navbar navbar-fixed-top">
        <div class="title-left" id="logo">
            <a href="">首页</a>
        </div>
        <div class="title-center" id="title">
            NfuConnect
        </div>
        <div class="title-right" >

        </div>
    </div>
    <!--导航栏结束-->
    <!--内容主体开始-->
    <div class="content">
        <ul>
                <li>
                    <div class="wrapper">
                        <div class="content-header">
                            <div class="content-header-left">
                                <img src="<?php echo $detail->portrait;?>" alt="">
                                <span>
                                <?php echo $detail->realname; ?>
                            </span>
                            </div>
                            <div class="content-header-right content-date"><?php echo $detail->post_date; ?></div>
                        </div>
                        <div class="content-middle">
                            <div class="middle-text"><?php echo $detail->content;?></div>
                        </div>
                        <div class="content-footer">
                            <div class="content-footer-love">
                                <p class="content-footer-love-pic">
                                    <img src="<?php echo $detail->is_like;?>" alt="">
                                    <input type="checkbox" value="<?php echo $detail->msg_id;?>">
                                </p>
                                <span><?php echo $detail->love_num;?></span>
                            </div>
                            <div class="content-footer-comment">
                                <a href="javascript:;"><img src="assets/fonts/comment.ico" alt=""></a>
                                <span><?php echo $detail->com_num;?></span>
                            </div>
                        </div>
                    </div>
                </li>
        </ul>
    </div>
    <!--评论主体开始-->
    <div class="comment">
        <ul>
            <?php foreach ($comments as $comment){?>
            <li>
                <div class="wrapper-com">
                    <div class="comment-header">
                        <div class="comment-header-left">
                            <img src="<?php echo $comment->portrait;?>" alt="">
                            <div class="column">
                                <div class="column-one"><?php echo $comment->realname;?></div>
                                <div class="column-two">
                                    <?php echo $comment->post_date_com; ?>
                                </div>
                            </div>
                            <div class="comment-header-right">
                                <img src="assets/fonts/bear.ico" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="comment-footer">
                        <?php echo $comment->content_com;?>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <!--评论主体结束-->
    <!--内容主体结束-->
    <!--尾部开始-->
    <div class="footer">
        <form action="welcome/add_comment" method="post">
            <input type="hidden" value="<?php echo $detail->msg_id;?>" name="hid_msg_id">
            <div class="input-group">
                <?php
                $default="<input type=\"text\" class=\"form-control\" name=\"comment\" placeholder=\"请登录后评论\" disabled>";
                if($is_login == 1 ){
                    $default="<input type=\"text\" class=\"form-control\" name=\"comment\" id=\"content_com\"placeholder=\"发表评论\" autocomplete=\"off\">";
                }
                echo $default;
                ?>
                <span class="input-group-btn">
                    <?php
                    $default_2="<button class=\"btn btn-default\" type=\"submit\" id=\"send_com\" disabled>发表</button>";
                    if($is_login == 1 ){
                        $default_2="<button class=\"btn btn-default\" type=\"submit\" id=\"send_com\">发表</button>";
                    }
                     echo $default_2;
                    ?>
                </span>
            </div>
        </form>

    </div>
    <!--尾部结束-->
</div>
</div>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/nfuConnect.js"></script>
</body>
</html>