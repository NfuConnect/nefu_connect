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
    <link rel="stylesheet" href="assets/css/index.css">
    <title>测试平台</title>
</head>
<body>
<div id="index">
    <div class="content" style="margin-top: 0;">
        <ul>
            <?php foreach($messages as $message){ ?>
                <li>
                    <div class="wrapper">
                        <div class="content-header">
                            <div class="content-header-left">
                                <img src="<?php
                                if($message->is_anonymity){
                                    if($message->sex == '男'){
                                        echo 'assets/img/man2.jpg';
                                    }else{
                                        echo 'assets/img/woman2.jpg';
                                    }
                                }else{
                                    echo $message->portrait;
                                }
                                ?>" alt="">
                                <span>
                                <?php
                                if($message->is_anonymity){
                                    echo "某同学·".$message->sex;
                                }else{
                                    echo $message->realname;
                                }
                                ?>
                            </span>
                            </div>
                            <div class="content-header-right content-date"><?php echo $message->post_date; ?></div>
                        </div>
                        <div class="content-middle">
                            <div class="middle-text"><?php echo $message->content;?></div>
                        </div>
                        <div class="content-footer">
                            <div class="content-footer-love">
                                <p class="content-footer-love-pic">
                                    <img src="<?php
                                    $defalt = 'assets/fonts/love.ico';
                                    if($results) {
                                        foreach ($results as $result) {
                                            if ($message->msg_id == $result->msg_id) {
                                                $defalt = 'assets/fonts/love-2.ico';
                                                break;
                                            }
                                        }
                                    }
                                    echo $defalt;
                                    ?>" alt="">
                                    <input type="checkbox" value="<?php echo $message->msg_id;?>">
                                </p>
                                <span><?php echo $message->love_num;?></span>
                            </div>
                            <div class="content-footer-comment">
                                <a href="welcome/details?msg_id=<?php echo $message->msg_id;?>"><img src="assets/fonts/comment.ico" alt=""></a>
                                <span><?php echo $message->com_num;?></span>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
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
    <?php
    $default=" <div id=\"no_page\">没有更多帖子了╮(╯▽╰)╭</div>";
        if(!$messages){
            echo $default;
        }
    ?>

</div>


<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/nfuConnect.js"></script>
</body>
</html>