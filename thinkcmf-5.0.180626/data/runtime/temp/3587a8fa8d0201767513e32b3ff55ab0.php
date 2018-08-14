<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:26:"themes/RY/icr\\school.html";i:1534167067;s:33:"../public/themes/RY/icr/head.html";i:1534226396;s:76:"E:\php\PHPTutorial\WWW\thinkcmf-5.0.180626\public\themes\RY\public\head.html";i:1529914518;s:80:"E:\php\PHPTutorial\WWW\thinkcmf-5.0.180626\public\themes\RY\public\function.html";i:1529914518;s:79:"E:\php\PHPTutorial\WWW\thinkcmf-5.0.180626\public\themes\RY\public\scripts.html";i:1529914518;s:33:"../public/themes/RY/icr/foot.html";i:1534077926;}*/ ?>
<!--#include virtual="./head.html" -->
<!DOCTYPE html>
<meta charset="utf-8" lang="zh_cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>睿育国际英语</title>
    <meta name="description" content="睿育国际英语">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--图标库-->
    
<?php 
/*可以加多个方法哟！*/
function _sp_helloworld(){
	echo "hello ThinkCMF!";
}

function _sp_helloworld2(){
	echo "hello ThinkCMF2!";
}


function _sp_helloworld3(){
	echo "hello ThinkCMF3!";
}

 ?>
<meta name="author" content="ThinkCMF">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">

<!-- No Baidu Siteapp-->
<meta http-equiv="Cache-Control" content="no-siteapp"/>

<!-- HTML5 shim for IE8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<link rel="icon" href="/themes/RY/public/assets/images/favicon.png" type="image/png">
<link rel="shortcut icon" href="/themes/RY/public/assets/images/favicon.png" type="image/png">
<link href="/themes/RY/public/assets/simpleboot3/themes/simpleboot3/bootstrap.min.css" rel="stylesheet">
<link href="/themes/RY/public/assets/simpleboot3/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
      type="text/css">
<!--[if IE 7]>
<link rel="stylesheet" href="/themes/RY/public/assets/simpleboot3/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="/themes/RY/public/assets/css/style.css" rel="stylesheet">
<style>
    /*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
    #backtotop {
        position: fixed;
        bottom: 50px;
        right: 20px;
        display: none;
        cursor: pointer;
        font-size: 50px;
        z-index: 9999;
    }

    #backtotop:hover {
        color: #333
    }

    #main-menu-user li.user {
        display: none
    }
</style>
<script type="text/javascript">
    //全局变量
    var GV = {
        ROOT: "/",
        WEB_ROOT: "/",
        JS_ROOT: "static/js/"
    };
</script>
<script src="/themes/RY/public/assets/js/jquery-1.10.2.min.js"></script>
<script src="/themes/RY/public/assets/js/jquery-migrate-1.2.1.js"></script>
<script src="/static/js/wind.js"></script>
	
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/themes/RY/icr/css/main.css" rel="stylesheet"/>
</head>
<body>
<!--[if lte IE 9]>
<p>You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<header>
    <div class="head-main">
        <div class="logo"><img src="/themes/RY/icr/imgs/logo.svg" /></div>
        <div class="position">
            <i class="fa fa-map-marker fa-2x"></i>
            <span class="location">当前位置:&nbsp;&nbsp;&nbsp;&nbsp;广州
                <div class="city_list">
                    <div class="jt"></div>
                    <div class="city_content">
                        <ul>
                            <?php if(is_array($city_list) || $city_list instanceof \think\Collection || $city_list instanceof \think\Paginator): $i = 0; $__LIST__ = $city_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                 <li><a href="#"><?php echo $vo['city']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </span>
            <i class="fa fa-caret-down" style="font-size: 25px"></i>
        </div>
        <div class="menu">
            <ul>
                <li class="<?php echo $home_active; ?>" onclick="{location='../'}">首页</li>
                <li class="<?php echo $course_active; ?>" onclick="{location='../icr/course'}">课程内容</li>
                <li class="<?php echo $teacher_active; ?>" onclick="{location='../icr/teacher'}">优质师资</li>
                <li class="<?php echo $school_active; ?>" onclick="{location='../icr/school'}">校区风采</li>
                <li class="<?php echo $recruit_active; ?>" onclick="{location='../icr/recruit'}">人才招聘</li>
                <li class="<?php echo $join_active; ?>" onclick="{location='../icr/join'}">合作加盟</li>
                <li class="<?php echo $about_active; ?>" onclick="{location='../icr/about'}">关于我们</li>
            </ul>
        </div>
        <div class="account">
            <?php echo $login_html; ?>
        </div>

    </div>
</header>

<section class="l_r_window" style="display: none;">
    <div class="window">
        <div class="window-header">
            <div class="window-logo">
                <img src="/themes/RY/icr/imgs/logo.png" />
            </div>
            <div class='cease'>&times;</div>
        </div>
        <div class="window-content">
            <div class="window-tab">
                <div data-id="tab-login" id="login_click" class="active">登录</div>
                <div data-id="tab-register" id="register_click" >注册</div>

            </div>
            <div class="window-tab-item active" id="tab-login">
                <form class="js-ajax-form" action="<?php echo url('user/login/doLogin'); ?>" method="post">
                    <div class="window-input">
                        <input type="text" id="input_username" name="username" placeholder="手机号/邮箱/用户名" class="form-control">
                    </div>
                <div class="window-input">
                    <input type="password" id="input_password" name="password" placeholder="密码" class="form-control">
                </div>
                <div class="window-input">
                    <input type="text" name="captcha" placeholder="验证码" class="form-control captcha half">
                    <?php $__CAPTCHA_SRC=url('/captcha/new').'?height=50&width=120&font_size=18'; ?>
<img src="<?php echo $__CAPTCHA_SRC; ?>" onclick="this.src='<?php echo $__CAPTCHA_SRC; ?>&time='+Math.random();" title="换一张" class="captcha captcha-img verify_img" style="cursor: pointer;"/>
<input type="hidden" name="_captcha_id" value="">
                </div>
                <div class="window-button">
                    <input type="submit" value="登录" />
                </div>
                </form>
            </div>
            <div class="window-tab-item" id="tab-register">
                <form class="js-ajax-form" action="<?php echo url('user/Register/doRegister'); ?>" method="post">
                <div class="window-input">
                    <input type="text" placeholder="请输入您孩子的名字"/>
                </div>
                <div class="window-input">
                    <select>
                        <option>请选择您孩子的生日</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                    </select>
                    <i class="fa fa-angle-down"></i>
                </div>
                <div class="window-input">
                    <select>
                        <option>请选择离您最近的中心</option>
                        <?php if(is_array($city_list) || $city_list instanceof \think\Collection || $city_list instanceof \think\Paginator): $i = 0; $__LIST__ = $city_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option><?php echo $vo['city']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <i class="fa fa-angle-down"></i>
                </div>
                <div class="window-input">
                    <input type="text" name="username" placeholder="请输入您的手机号" class="form-control"
                           id="js-mobile-input">
                </div>
                    <div class="window-input">
                        <input type="text" name="captcha" placeholder="验证码" class="form-control captcha half">
                        <?php $__CAPTCHA_SRC=url('/captcha/new').'?height=50&width=120&font_size=18'; ?>
<img src="<?php echo $__CAPTCHA_SRC; ?>" onclick="this.src='<?php echo $__CAPTCHA_SRC; ?>&time='+Math.random();" title="换一张" class="captcha captcha-img verify_img" style="cursor: pointer;"/>
<input type="hidden" name="_captcha_id" value="">
                    </div>
                    <?php if(empty($is_open_registration) || (($is_open_registration instanceof \think\Collection || $is_open_registration instanceof \think\Paginator ) && $is_open_registration->isEmpty())): ?>
                        <div class="form-group">
                            <div style="position: relative;">
                                <input type="text" name="code" placeholder="手机验证码" style="width:170px;"
                                       class="form-control">
                                <a class="btn btn-success js-get-mobile-code"
                                   style="width: 163px;position: absolute;top:0;right: 0;"
                                   data-wait-msg="[second]秒后才能再次获取" data-mobile-input="#js-mobile-input"
                                   data-url="<?php echo url('user/VerificationCode/send'); ?>"
                                   daty-type="register"
                                   data-init-second-left="60">获取手机验证码</a>
                            </div>
                        </div>
                    <?php endif; ?>
                <div class="window-button">
                    <input type="submit" value="注册" />
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/themes/RY/public/assets/simpleboot3/bootstrap/js/bootstrap.min.js"></script>
    <script src="/static/js/frontend.js"></script>
	<script>
	$(function(){
		$("#main-menu li.dropdown").hover(function(){
			$(this).addClass("open");
		},function(){
			$(this).removeClass("open");
		});
		
		$("#main-menu a").each(function() {
			if ($(this)[0].href == String(window.location)) {
				$(this).parentsUntil("#main-menu>ul>li").addClass("active");
			}
		});
		
		$.post("<?php echo url('user/index/isLogin'); ?>",{},function(data){
		    console.log(data);
			if(data.code==1){
				if(data.data.user.avatar){
				}

				$("#main-menu-user span.user-nickname").text(data.data.user.user_nickname?data.data.user.user_nickname:data.data.user.user_login);
				$("#main-menu-user li.login").show();
                $("#main-menu-user li.offline").hide();

			}

			if(data.code==0){
                $("#main-menu-user li.login").hide();
				$("#main-menu-user li.offline").show();
			}

		});

        ;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


<div class="main-img">
    <img src="/themes/RY/icr/imgs/banner4.jpg" />
</div>
<div class="main">
    <div class="item">
        <div class="school-path">
            <h1><?=$school[0]['city']?>校区</h1>
            <div class="map-info">
                <div class="map" id="map" style="width: 600px;height: 500px;"></div>
                <div class="point">
                    <div class="point-item">
                        <div class="point-title"><?=$school[0]['name']?><i name="back" class="fa fa-chevron-up"></i></div>
                        <div class="point-content"><i class="fa fa-map-marker"></i><?=$school[0]['location']?></div>
                        <div class="point-button">免费预约试听<i class="fa fa-angle-double-right"></i></div>
                    </div>
                    <div class="point-item">
                        <div class="point-title"><?=$school[1]['name']?><i name="back" class="fa fa-chevron-up"></i></div>
                        <div class="point-content"><i class="fa fa-map-marker"></i><?=$school[1]['location']?></div>
                        <div class="point-button">免费预约试听<i class="fa fa-angle-double-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="item">
        <div class="school-show">
            <h1>校区环境</h1>
            <div class="img-gd">
                <div class="img-list">
                    <?=$school_picture?>
                </div>
                <div class="img-left"><i class="fa fa-angle-left"></i></div>
                <div class="img-right"><i class="fa fa-angle-right"></i></div>
            </div>

        </div>
    </div>
    <div class="item">
        <div class="study">
            <h1>文化活动</h1>
            <div class="comment">
                <div class="comment-item">
                    <div class="img"><img src="<?=$school_activity[0]['icon']?>" /></div>
                    <div class="title"><?=$school_activity[0]['name']?></div>
                </div>
                <div class="comment-item">
                    <div class="img"><img src="<?=$school_activity[1]['icon']?>" /></div>
                    <div class="title"><?=$school_activity[1]['name']?></div>
                </div>
                <div class="comment-item">
                    <div class="img"><img src="<?=$school_activity[2]['icon']?>" /></div>
                    <div class="title"><?=$school_activity[2]['name']?></div>
                </div>
                <div class="comment-item">
                    <div class="img"><img src="<?=$school_activity[3]['icon']?>" /></div>
                    <div class="title"><?=$school_activity[3]['name']?></div>
                </div>
                <div class="comment-item">
                    <div class="img"><img src="<?=$school_activity[4]['icon']?>" /></div>
                    <div class="title"><?=$school_activity[4]['name']?></div>
                </div>
                <div class="comment-item">
                    <div class="img"><img src="<?=$school_activity[5]['icon']?>" /></div>
                    <div class="title"><?=$school_activity[5]['name']?></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=s0x1Cj9VeZ6bVRI249olQM0V"></script>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("map");
    var point = new BMap.Point(116.404, 39.915);
    map.centerAndZoom(point, 15);
    // 编写自定义函数,创建标注
    function addMarker(point){
        var marker = new BMap.Marker(point);
        map.addOverlay(marker);
    }
    // 随机向地图添加25个标注
    var bounds = map.getBounds();
    var sw = bounds.getSouthWest();
    var ne = bounds.getNorthEast();
    var lngSpan = Math.abs(sw.lng - ne.lng);
    var latSpan = Math.abs(ne.lat - sw.lat);
    for (var i = 0; i < 25; i ++) {
        var point = new BMap.Point(sw.lng + lngSpan * (Math.random() * 0.7), ne.lat - latSpan * (Math.random() * 0.7));
        addMarker(point);
    }
</script>
<div class="right_column">
    <div class="item">
        <img src="/themes/RY/icr/imgs/qq.png" />
        <span class="blue">QQ咨询</span>
    </div>
    <div class="item">
        <img src="/themes/RY/icr/imgs/phone.png" />
        <span class="orange">电话咨询</span>
    </div>
    <div class="item">
        <img src="/themes/RY/icr/imgs/wechat1.png" />
        <span class="gre">关注微信</span>
    </div>
</div>
<footer>
    <div class="footer">
        <div class="footer-listen">
            <img  src="/themes/RY/icr/imgs/eye-img.svg"/>
        </div>
        <div class="footer-main">
            <div class="row">
                <div class="qrcode">
                    <div class="wechat">
                        <img src="/themes/RY/icr/imgs/wechat.png" />
                        <span>关注微信</span>
                    </div>
                    <div class="webo">
                        <img src="/themes/RY/icr/imgs/webo.png" />
                        <span>关注微博</span>
                    </div>
                </div>
                <div class="menu-list">
                    <ul>
                        <li><a href="#">关于我们</a></li>
                        <li>师资力量</li>
                        <li>人才招聘</li>
                        <li>商务加盟</li>
                        <li>校区环境</li>
                        <li>课程内容</li>
                        <li>文化活动</li>
                        <li>家长评语</li>
                    </ul>
                </div>
                <div class="tel-phone">
                    <div class="tel-title">联系总部</div>
                    <div class="tel-number">(+65)65918743</div>
                    <div class="tel-number">(+65)64841271</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row">
                <ul class="national">
                    <li>
                        <a href="#">
                            <div>
                                <img src="/themes/RY/icr/imgs/australia-flag.svg" />
                                <span>Australia</span>
                                <span>澳大利亚官网</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/china-flag.svg" />
                            <span>Australia</span>
                            <span>中国官网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/hk-flag.svg" />
                            <span>Australia</span>
                            <span>中国香港官网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/indonesia-flag.svg" />
                            <span>Australia</span>
                            <span>印度尼西亚官网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/malaysia-flag.svg" />
                            <span>Australia</span>
                            <span>马来西亚官网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                            <span>Australia</span>
                            <span>缅甸管网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/singapore-flag.svg" />
                            <span>Australia</span>
                            <span>新家坡官网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/thailand-flag.svg" />
                            <span>Australia</span>
                            <span>印度官网</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="/themes/RY/icr/imgs/vietnam-flag.svg" />
                            <span>Australia</span>
                            <span>越南官网</span>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="row">
                <div class="more">
                    查看全部20个国家
                </div>
            </div>
            <div class="row">
                <div class="footer-info">
                    <div><img src="/themes/RY/icr/imgs/xy.png" /></div>
                    <div>粤ICP备案23597198号</div>
                    <div>&copy;2017 I CAN READ&reg;. All rights reserved</div>
                </div>
            </div>
        </div>
    </div>

</footer>
<section class="more-country" style="display: none;">
    <div class="country-window">
        <div class="cease">
            &times;
        </div>
        <div class="country-row">
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>澳大利亚官网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>China</span>
                <span>中国官网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Hong Kong</span>
                <span>中国香港官网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Indonesia</span>
                <span>印度尼西亚官网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Malaysia</span>
                <span>马来西亚官网</span>
            </div>
        </div>
        <div class="clear"></div>
        <div class="country-row">
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Myanmar</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Singapore</span>
                <span>新家坡官网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Thailand</span>
                <span>印度官网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
        </div>
        <div class="clear"></div>
        <div class="country-row">
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
        </div>
        <div class="clear"></div>
        <div class="country-row">
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
            <div class="country-item">
                <img src="/themes/RY/icr/imgs/myanmar-flag.svg" />
                <span>Australia</span>
                <span>缅甸管网</span>
            </div>
        </div>
    </div>
</section>
</body>
<script src="/themes/RY/icr/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/themes/RY/icr/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/themes/RY/icr/js/main.js"></script>
</html>
<!--#include virtual="./foot.html" -->