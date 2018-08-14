/*
公共js
 */
var popup_html="<div id='popup' class='popup'>" +
    "<div class='wd'>" +
    "<div class='wd-title'>免费预约试听</div>" +
    "<div class='wd-title2'>思明中心：厦门市思明区莲前西路2号莲富大厦3H</div>" +
    "<form>" +
    "<div class='input-text'>" +
    "<div class='course-level'><input type='text' placeholder='预约试听课程级别'/><i class='fa fa-caret-down fa-2x'></i></div>"+
    "<input type='text' placeholder='输入手机号预约课程试听' />" +
    "<input type='submit' value='确认预约试听'>" +
    "</div>" +
    "</form>" +
    "<div class='cease'>&times;</div>" +
    "</div>" +
    "</div>";
function popup(){
    var id  = 'popup';
    if(!$('#'+id).html()){
        $('body').prepend(popup_html);
        $(".cease").click(function(){
            $("#popup").remove();
        });
    }

}


$(function(){
    $("[name='yy']").click(popup);
    $(".agreement").click(function(){
        if($(this).find('i').hasClass("fa-square-o")){
            $(this).find('i').removeClass('fa-square-o')
            $(this).find('i').addClass('fa-check-square-o')
        }else{
            $(this).find('i').removeClass('fa-check-square-o')
            $(this).find('i').addClass('fa-square-o')
        }
    });
    $(".radios-item").mouseover(function(){
        $(this).find('.click').css('display','block');
    });
    $(".radios-item").mouseleave(function(){
        $(this).find('.click').css('display','none');
    });
    $(".comment-item").mouseover(function(){
        $(this).find('.click').css('display','block');
        $(this).find('.title').css('display','none');
    });
    $(".comment-item").mouseleave(function(){
        $(this).find('.click').css('display','none');
        $(this).find('.title').css('display','block');
    });
    var timeoutId = null;
    $("[name='back']").click(function(){
        var obj = $(this).parents('.point-item');
        var self = $(this);
        var isup = $(this).hasClass('fa-chevron-up');
        clearTimeout(timeoutId);
        if(isup)
        {
            //升
            timeoutId = window.setInterval(function(){
                if(obj.height()>40){
                    obj.height(obj.height()-1)
                }else{
                    self.removeClass('fa-chevron-up');
                    self.addClass('fa-chevron-down');
                    clearInterval(timeoutId)
                }
            },1)
        }else{
            //降
            timeoutId = window.setInterval(function(){
                if(obj.height()<177){
                    obj.height(obj.height()+1)
                }else{
                    self.removeClass('fa-chevron-down');
                    self.addClass('fa-chevron-up');
                    clearInterval(timeoutId)
                }
            },1)
        }


    })
    $(".img-left").mousedown(function(){
        var list = $(this).parents('.img-gd').find('.img-list');
        var padding = list.css('marginLeft');
        clearTimeout(timeoutId);
        timeoutId = window.setInterval(function(){
            var newpadding = parseInt(list.css('marginLeft').replace('px',''))+1;
            if(newpadding<=0){
                list.css('marginLeft',newpadding+'px')
            }
        },1)
    });
    $(".img-right").mousedown(function(){
        var list = $(this).parents('.img-gd').find('.img-list');
        var padding = list.css('marginLeft');
        clearTimeout(timeoutId);
        timeoutId = window.setInterval(function(){
            var newpadding = parseInt(list.css('marginLeft').replace('px',''))-1;
            if(-newpadding<=(list.width()-1440)){
                list.css('marginLeft',newpadding+'px')
            }
        },1)
    });
    $(".img-left").mouseup(function(){
        clearTimeout(timeoutId);
    });
    $(".img-right").mouseout(function(){
        clearTimeout(timeoutId);
    });
    $(".img-left").mouseout(function(){
        clearTimeout(timeoutId);
    });
    $(".img-right").mouseup(function(){
        clearTimeout(timeoutId);
    });
    $(".cease").click(function(){
        $(".more-country").hide();
    })
    $(".more").click(function(){
        $(".more-country").show();
    })


    //登录注册弹窗事件
    $(".cease").click(function(){
        $(".l_r_window").hide();
    });
    $(".window-tab div").click(function(){
        var id = $(this).data('id');
        $(".window-tab div").removeClass('active');
        $(this).addClass('active');
        $(".window-tab-item").removeClass('active');
        $("#"+id).addClass('active');
    })
    $("#login").click(function(){
        $(".l_r_window").show();
        $("#login_click").click();
    })
    $("#register").click(function(){
        $(".l_r_window").show();
        $("#register_click").click();
    })
});