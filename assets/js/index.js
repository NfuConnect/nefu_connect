/*使用弹出层组件开始*/
require(["publish"], function (publish) {
    var oOpen = document.getElementById("open");
    if (oOpen) {
        oOpen.onclick = function () {
            var settings = {};
            publish.open(settings);
        }
    }
});
/*使用弹出层组件结束*/
$(function () {
    /*导航栏淡入淡出开始*/
    var scrollFunc = function (e) {
        e = e || window.event;
        if (e.wheelDelta) {  //判断浏览器IE，谷歌滑轮事件
            if (e.wheelDelta > 0) { //当滑轮向上滚动时
                $(".title").fadeIn();
            }
            if (e.wheelDelta < 0) { //当滑轮向下滚动时
                $(".title").fadeOut();
            }
        } else if (e.detail) {  //Firefox滑轮事件
            if (e.detail > 0) { //当滑轮向上滚动时
                $(".title").fadeIn();
            }
            if (e.detail < 0) { //当滑轮向下滚动时
                $(".title").fadeOut();
            }
        }
    };
    if (document.addEventListener) {//firefox
        document.addEventListener('DOMMouseScroll', scrollFunc, false);
    }
//滚动滑轮触发scrollFunc方法  //ie 谷歌
    window.onmousewheel = scrollFunc;
    var beforeScrollTop = $(window).scrollTop();
    $(window).scroll(function () {
        var afterScrollTop = $(window).scrollTop();
        var delta = afterScrollTop - beforeScrollTop;
        if (delta > 0) {
            $(".title").fadeOut();
        } else {
            $(".title").fadeIn();
        }
        beforeScrollTop = afterScrollTop;
    });
    /*导航栏淡入淡出结束*/
    var bFlag = false;
    $(".footer-left img").on("click", function () {
        if (bFlag) {
            $(this).attr("src", "assets/fonts/page-2.ico");
            $(".footer-right img").attr("src", "assets/fonts/person-1.ico");
            bFlag = false;
        }

    });
    $(".footer-right img").on("click", function () {
        if (bFlag) {

        } else {
            $(".footer-left img").attr("src", "assets/fonts/page-1.ico");
            $(this).attr("src", "assets/fonts/person-2.ico");
            bFlag = true;
        }
    });



    /*瀑布流加载开始*/
    var msgComp = (function () {
        var Message = function (msg_id, realname, post_date, portrait, content, is_like, love_num, com_num) {
            this.msg_id = msg_id;
            this.realname = realname;
            this.post_date = post_date;
            this.portrait = portrait;
            this.content = content;
            this.is_like = is_like;
            this.love_num = love_num;
            this.com_num = com_num;
        };
        var messageComp = {//消息相关功能对象
            $messageList: $('#message-list'),
            isLoaded: true,
            pageNo: 1,
            isEnd: false,
            init: function () {
                var _this = this;
                this.loadData();//先加载一批数据
                /*点赞开始*/
                this.$messageList.on('click', '.content-footer-love-input', function () {
                    $(this).siblings().click();
                });
                this.$messageList.on('click', '.content-footer-love-img', function () {
                    var flag = false;
                    var url = $(this).attr("src");
                    if (url == 'assets/fonts/love.ico') {
                        flag = false;
                    } else {
                        flag = true;
                    }
                    var html = $(this).parent().siblings().html();
                    var html2 = parseInt(html);
                    if (flag) {
                        html2 -= 1;
                        $(this).parent().siblings().html(html2);
                        $(this).attr("src", "assets/fonts/love.ico");
                        flag = false;
                        var str = $(this).siblings().val();
                        var that = this;
                        $.get('welcome/reduce_like', {
                            'ids': str
                        }, function (data) {
                            if (data == 'fail') {
                                html2 += 1;
                                $(that).parent().siblings().html(html2);
                                $(that).attr("src", "assets/fonts/love-2.ico");
                                flag = true;
                            }
                        });
                    } else {
                        html2 += 1;
                        $(this).parent().siblings().html(html2);
                        $(this).attr("src", "assets/fonts/love-2.ico");
                        flag = true;
                        var str = $(this).siblings().val();
                        var that = this;
                        $.get('welcome/add_like', {
                            'ids': str
                        }, function (data) {
                            if (data == 'fail') {
                                html2 -= 1;
                                $(that).parent().siblings().html(html2);
                                $(that).attr("src", "assets/fonts/love.ico");
                                flag = false;
                            }
                        });
                    }
                });
                /*点赞结束*/
                $(window).on("scroll", function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop + $(window).height() > $("#index").height()) {
                        _this.loadMore();
                    }
                });
            },
            express:function(){
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
            },
            loadData: function (option, callback) {
                var param = $.extend({page: this.pageNo}, option);
                $.get('welcome/get_message', param, function (data) {
                    for (var i = 0; i < data.messages.length; i++) {
                        var messages = data.messages;
                        var message = new Message(messages[i].msg_id, messages[i].realname, messages[i].post_date, messages[i].portrait, messages[i].content, messages[i].is_like, messages[i].love_num, messages[i].com_num);
                        var messageHtml = template('messages-push', message);
                        var $message = $(messageHtml);
                        $message.data('item-data', message);
                        this.$messageList.append($message);
                    }
                    this.isLoaded = true;
                    this.isEnd = data.isEnd;
                    callback && callback();
                    this.express();
                }.bind(this), 'json');

            },
            loadMore: function () {
                var _this = this;
                if (this.isEnd) {
                    return;
                }
                if (this.isLoaded) {//如果isLoaded为true代表已经加载完，可以再次进行加载
                    this.pageNo++;
                    this.isLoaded = false;
                    this.loadData();
                }

            },
            clear: function () {
                this.pageNo = 1;
                this.$messageList.empty();
            }
        };
        return messageComp;
    })();
    msgComp.init();

    /*瀑布流加载结束*/

    /*双击导航栏回到顶部开始*/
    $('#logo').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 'fast');
        return false;
    });
    $('#title').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 'fast');
        return false;
    });
    /*双击导航栏回到顶部结束*/
    $('#to_login').on('click', function () {
        alert('请先登录再发布');
        top.location = 'welcome/login';
    });
});





