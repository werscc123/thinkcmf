<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"themes/admin_simpleboot3/admin\recruit\edit.html";i:1534066099;s:93:"E:\php\PHPTutorial\WWW\thinkcmf-5.0.180626\public\themes\admin_simpleboot3\public\header.html";i:1529914518;}*/ ?>
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
<div class="wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo url('recruit/index'); ?>"><?php echo lang('ADMIN_RECRUIT_INDEX'); ?></a></li>
        <li><a href="<?php echo url('recruit/add'); ?>"><?php echo lang('ADMIN_RECRUIT_ADD'); ?></a></li>
        <li class="active" ><a><?php echo lang('ADMIN_RECRUIT_EDIT'); ?></a></li>
    </ul>
    <form method="post" class="form-horizontal js-ajax-form margin-top-20" action="<?php echo url('recruit/editPost'); ?>">

        <div class="form-group">
            <label class="col-sm-2 control-label">ID:</label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="form-required">*</span>职位:</label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" name="position" value="<?php echo $position; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="form-required">*</span>描述:</label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" name="desc" value="<?php echo $desc; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="form-required">*</span>要求:</label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" name="require" value="<?php echo $require; ?>">
            </div>
        </div>

        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang("SAVE"); ?></button>
            <a class="btn btn-default" href="<?php echo url('recruit/index'); ?>">返回</a>
        </div>
    </form>

</div>
<script src="/static/js/admin.js"></script>
</body>
</html>