<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:50:"themes/admin_simpleboot3/admin\feedback\index.html";i:1533990716;s:93:"E:\php\PHPTutorial\WWW\thinkcmf-5.0.180626\public\themes\admin_simpleboot3\public\header.html";i:1529914518;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->


    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo \think\Request::instance()->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo url('feedback/index'); ?>"><?php echo lang('ADMIN_FEEDBACK_INDEX'); ?></a></li>
        <li><a href="<?php echo url('feedback/add'); ?>"><?php echo lang('ADMIN_FEEDBACK_ADD'); ?></a></li>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url('feedback/search'); ?>">
        uid:
        <input type="text" class="form-control" name="uid" style="width: 110px;" value="<?php echo $uid; ?>" placeholder="请输入用户ID">
        cid:
        <input type="text" class="form-control" name="cid" style="width: 110px;" value="<?php echo $cid; ?>" placeholder="请输入课程ID">
        类型（文字1/视频2）：
        <select class="form-control" name="feedback_type">
            <?php echo $option_html; ?>
        </select>
        <input type="submit" class="btn btn-primary" value="搜索" />
        <a class="btn btn-danger" href="<?php echo url('feedback/index'); ?>">清空</a>
    </form>
    <form action="<?php echo url('Rbac/listorders'); ?>" method="post" class="margin-top-20">
        <?php  $is_main=array("1"=>'是',"0"=>'否'); ?>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th width="40">ID</th>
                <th width="40">UID</th>
                <th width="40">CID</th>
                <th width="50">类型</th>
                <th>內容</th>
                <th>封面</th>
                <th>标题</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($feedbacks) || $feedbacks instanceof \think\Collection || $feedbacks instanceof \think\Paginator): if( count($feedbacks)==0 ) : echo "" ;else: foreach($feedbacks as $key=>$vo): ?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['uid']; ?></td>
                    <td><?php echo $vo['cid']; ?></td>
                    <td><?php echo $vo['type']; ?></td>
                    <td><?php echo $vo['content']; ?></td>
                    <td><img src="<?php echo $vo['icon']; ?>" height="100" width="100"></td>
                    <td><?php echo $vo['title']; ?></td>
                    <td width="140">
                        <a href="<?php echo url('feedback/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                        <a class="js-ajax-delete" href="<?php echo url('feedback/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </form>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>