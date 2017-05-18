/**
 * Created by Administrator on 2017/4/14.
 */
require.config({
    paths : {
        "jquery" : "jquery-2.1.1.min"
    }
});
define(["jquery"],function(){
    return {
        open : function(settings){
            var defaultSettings = {

            };
            $.extend(defaultSettings,settings);
            /*创建DOM结构开始*/
            var html =
                '<div class="publish-container">'
                    +'<div class="publish-mask"></div>'
                    +'<div class="publish-box">'
                         +'<header class="publish-header">'
                             +'<span class="publish-btn1 glyphicon glyphicon-remove"></span>'
                             +'<span class="publish-title">发布</span>'
                             +'<span class="publish-btn2 glyphicon glyphicon-ok"></span>'
                         +'</header>'
                         +'<form method="post" action="welcome/save_message">'
                         +'<textarea placeholder="你想说的话" maxlength="200" required="required" name="content"></textarea>'
                         +'<footer class="publish-footer">'
                             +'<div class="publish-checkbox">'
                                +'<input type="checkbox" checked="checked" value="1" name="anonymity"/>'
                                +'<label></label>'
                                +'<span>匿名</span>'
                             +'</div>'
                             +'<button class="publish-send">'
                                +'<span>发送</span>'
                             +'</button>'
                         +'</footer>'
                         +'</form>'
                    +'</div>';
                +'</div>';
            $("#index").append(html);
            /*创建DOM结构结束*/

            /*设置点击事件开始*/
            var PublishBox = $(".publish-box");
            var PublishCon = $(".publish-container");
            var PublishMask = $(".publish-mask");
            PublishBox.addClass('animated fadeInDown');
            PublishMask.addClass('animated fadeIn');
            $(".publish-btn1").on('click',function(){
                PublishBox.addClass('animated fadeOutUp');
                PublishMask.addClass('animated fadeOut');
                setTimeout(function(){
                    PublishCon.remove();
                },600)

            });
            PublishMask.on('click',function(){
                PublishBox.addClass('animated fadeOutUp');
                PublishMask.addClass('animated fadeOut');
                setTimeout(function(){
                    PublishCon.remove();
                },600)
            });
            $('.publish-header .glyphicon-ok').on('click',function(){
                $('.publish-send').click();
            });
            /*设置点击事件结束*/
        }
    };
});