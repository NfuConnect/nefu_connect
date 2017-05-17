/**
 * Created by Administrator on 2017/4/30.
 */
$(function(){
    $('#send_com').on('click',function(){
        if($('#content_com').val() == ''){
            alert('评论不能为空');
            return false;
        }
    });
});