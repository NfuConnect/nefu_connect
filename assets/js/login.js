$(function(){
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
});
