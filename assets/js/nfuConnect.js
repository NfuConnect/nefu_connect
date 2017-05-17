/**
 * Created by Administrator on 2017/5/4.
 */
$(function(){
    /*评论验证开始*/
    $('#send_com').on('click',function(){
        if($('#content_com').val() == ''){
            alert('评论不能为空');
            return false;
        }
    });
    /*评论验证结束*/

    /*登录页面交互开始*/
    $('.btn-login').on('click',function () {
        $('.btn-login').removeClass('btn-default').addClass('btn-primary');
        $('.btn-reg').removeClass('btn-primary').addClass('btn-default');
        $('.reg').removeClass('login-select');
        $('.login').addClass('login-select');
    });
    $('.btn-reg').on('click',function () {
        $('.btn-login').removeClass('btn-primary').addClass('btn-default');
        $('.btn-reg').removeClass('btn-default').addClass('btn-primary');
        $('.reg').addClass('login-select');
        $('.login').removeClass('login-select');
    });
    /*登录页面交互结束*/

    /*注册验证开始*/
    var Flag1;
    var Flag2;
    var Flag3;
    var Flag4;
    $("#name").on("blur",function(){
        var str = $(this).val();
        var str2 =  $("#pass").val();
        if(str == ''){
            $('.name-alert').html("账号不能为空").css({display: 'block'});
            Flag4 = false;
        }else if(str.length < 4){
            $('.name-alert').html("账号不能小于4位").css({display: 'block'});
            Flag4 = false;
        }else if(str == str2){
            $('.name-alert').html("账号密码不能一样").css({display: 'block'});
            Flag1 = false;
        }else{
            $.get('welcome/check_reg_name', {
                'str': str
            }, function (data) {
                if(data == 'success'){
                    $('.name-alert').css({display: 'none'});
                    Flag4 = true;
                }else if (data == 'fail') {
                    $('.name-alert').html("web攻击不可取，年轻人").css({display: 'block'});
                    Flag4 = false;
                }else if (data == 'blank_fail') {
                    $('.name-alert').html("账号不能为空").css({display: 'block'});
                    Flag4 = false;
                }else if(data == 'repeat_fail'){
                    $('.name-alert').html("用户名重复").css({display: 'block'});
                    Flag4 = false;
                }else if(data == 'none_fail'){
                    $('.name-alert').html("账号不能含有空格").css({display: 'block'});
                    Flag4 = false;
                }
            });
        }
    });
    $("#realname").on("blur",function(){
        var str = $(this).val();
        if(str == ''){
            $('.realname-alert').html("昵称不能为空").css({display: 'block'});
            Flag1 = false;
        }else if(str.length > 10){
            $('.realname-alert').html("昵称不能超过10个字").css({display: 'block'});
            Flag1 = false;
        }else{
            $.get('welcome/check_reg_realname',{
                'str': str
            },function(data){
                if(data == 'success'){
                    $('.realname-alert').css({display: 'none'});
                    Flag1 = true;
                }else if(data == 'fail'){
                    $('.realname-alert').html("昵称不能有非法字符").css({display: 'block'});
                    Flag1 = false;
                }else if(data == 'none_fail'){
                    $('.realname-alert').html("昵称不能含有空格").css({display: 'block'});
                    Flag4 = false;
                }
            });
        }
    });
    $("#pass").on("blur",function(){
        var str = $(this).val();
        var str2 = $("#name").val();
        if(str == ''){
            $('.pass-alert').html("密码不能为空").css({display: 'block'});
            Flag2 = false;
        }else if(str.length < 6){
            $('.pass-alert').html("密码不能小于6位").css({display: 'block'});
            Flag2 = false;
        }else if(str == str2){
            $('.pass-alert').html("账号密码不能一样").css({display: 'block'});
            Flag2 = false;
        }else{
            $.get('welcome/check_reg_pass',{
                'str': str
            },function(data){
                if(data == 'success'){
                    $('.pass-alert').css({display: 'none'});
                    Flag2 = true;
                }else if(data == 'fail'){
                    $('.pass-alert').html("密码过于简单").css({display: 'block'});
                    Flag2 = false;
                }else if(data == 'none_fail'){
                    $('.pass-alert').html("密码不能含有空格").css({display: 'block'});
                    Flag4 = false;
                }
            });

        }
    });
    $("#repass").on("blur",function(){
        var str = $(this).val();
        if(str == ''){
            $('.repass-alert').html("请重复密码").css({display: 'block'});
            Flag3 = false;
        }else{
            $('.repass-alert').css({display: 'none'});
            Flag3 = true;
            if(str == $("#pass").val()){
                Flag3 = true;
                $('.repass-alert').css({display: 'none'});
            }else{
                Flag3 = false;
                $('.repass-alert').html("两次密码不一致").css({display: 'block'});
            }
        }
    });
    $("#regSubmit").on("click",function(){
        $("#name").trigger('blur');
        $("#realname").trigger('blur');
        $("#pass").trigger('blur');
        $("#repass").trigger('blur');
        return Flag1 && Flag2 && Flag3 && Flag4;
    });
    /*注册验证结束*/

    /*点赞开始*/
    $(".content-footer-love img").each(function(){
        $(this).siblings().on('click',function(){
            $(this).siblings().click();
        });
        var flag = false;
        $(this).on("click",function(){
            var url = $(this).attr("src");
            if(url == 'assets/fonts/love.ico'){
                flag = false;
            }else{
                flag = true;
            }
            var html=$(this).parent().siblings().html();
            var html2=parseInt(html);
            if(flag){
                html2-=1;
                $(this).parent().siblings().html(html2);
                $(this).attr("src","assets/fonts/love.ico");
                flag=false;
                var str = $(this).siblings().val();
                var that = this;
                $.get('welcome/reduce_like',{
                    'ids' : str
                }, function (data) {
                    if(data == 'fail'){
                        html2+=1;
                        $(that).parent().siblings().html(html2);
                        $(that).attr("src","assets/fonts/love-2.ico");
                        flag=true;
                    }
                });
            }else{
                html2+=1;
                $(this).parent().siblings().html(html2);
                $(this).attr("src","assets/fonts/love-2.ico");
                flag=true;
                var str = $(this).siblings().val();
                var that = this;
                $.get('welcome/add_like',{
                    'ids' : str
                }, function (data) {
                    if(data == 'fail'){
                        html2-=1;
                        $(that).parent().siblings().html(html2);
                        $(that).attr("src","assets/fonts/love.ico");
                        flag=false;
                    }
                });
            }
        });
    });
    /*点赞结束*/
    /*展开开始*/
    $(".content li .middle-text").each(function () {
        var btn = "<div></div>";
        var text = $(this).html();
        var text2 = text.substring(0, 80) + ".....";
        $(this).html(text.length > 80 ? text2 : text);
        if (text.length > text2.length) {
            var bFlag = false;
            $(btn).appendTo($(this).parent());
            $(this).siblings().addClass("middle-btn");
            $(this).siblings().html("展开全文");
            $(this).siblings().on("click", function () {
                if (bFlag) {
                    $(this).last().html("展开全文");
                    $(this).siblings().html(text2);
                    bFlag = false;
                } else {
                    $(this).last().html("收起");
                    $(this).siblings().html(text);
                    bFlag = true;
                }
            });
        }
    });
    /*展开结束*/
});