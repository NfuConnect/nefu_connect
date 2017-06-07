$(function(){
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
    /*瀑布流加载开始*/
    var jobComp=(function(){
        var Job=function(job_id,job_name,job_company,job_address,post_date,job_time,money_start,money_end){
            this.job_id=job_id;
            this.job_name=job_name;
            this.job_company=job_company;
            this.job_address=job_address;
            this.post_date=post_date;
            this.job_time=job_time;
            this.money_start=money_start;
            this.money_end=money_end;
        };
        var jobWork={//兼职工作相关对象
            $jobList:$("#job-list"),
            pageNo:1,
            isLoaded:true,
            isEnd:false,
            init:function(){
                var _this=this;
                this.loadData();
                $(window).on("scroll", function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop + $(window).height() > $("#index").height()) {
                        _this.loadMore();
                    }
                });
            },
            loadData:function(option,callback){
                var param=$.extend({page:this.pageNo},option);
                $.get("job/get_job",param,function(data){
                    for(var i=0;i<data.job.length;i++){
                        var jobs=data.job;
                        //console.log(jobs[i]);
                        var job=new Job(jobs[i].job_id,jobs[i].job_name,jobs[i].job_company,jobs[i].job_address,jobs[i].post_date,jobs[i].job_time,jobs[i].money_start,jobs[i].money_end);
                        var jobHTML=template("job-push",job);
                        var $job=$(jobHTML);
                        $job.data('job-data',job);
                        this.$jobList.append($job);
                    }
                    this.isLoaded=true;
                    this.isEnd=data.isEnd;
                    callback && callback();
                }.bind(this),'json')
            },
            loadMore:function(){
                if(this.isEnd){
                    return;
                }
                if (this.isLoaded) {//如果isLoaded为true代表已经加载完，可以再次进行加载
                    this.pageNo++;
                    this.isLoaded = false;
                    this.loadData();
                }
            }
        };
        return jobWork;
    })();
    jobComp.init();
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
});
