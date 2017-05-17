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