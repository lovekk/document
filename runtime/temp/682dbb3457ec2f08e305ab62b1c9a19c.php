<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\wamp\www\tp5_blog\public/../application/admin\view\newspaper\add.htm";i:1523944962;s:68:"D:\wamp\www\tp5_blog\public/../application/admin\view\common\top.htm";i:1475309002;s:69:"D:\wamp\www\tp5_blog\public/../application/admin\view\common\left.htm";i:1523944600;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>报纸新增</title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__PUBLIC__/style/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/style/font-awesome.css" rel="stylesheet">
    <link href="__PUBLIC__/style/weather-icons.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="__PUBLIC__/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/style/demo.css" rel="stylesheet">
    <link href="__PUBLIC__/style/typicons.css" rel="stylesheet">
    <link href="__PUBLIC__/style/animate.css" rel="stylesheet">
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img 
src="__PUBLIC__/images/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img 
src="__PUBLIC__/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Request::instance()->session('username'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/logout'); ?>">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/edit',array('id'=>\think\Request::instance()->session('uid'))); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->

        <li>
            <a href="<?php echo url('admin/lst'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">管理员 </span>
                <i class="menu-expand"></i>
            </a>
            <!--<ul class="submenu">
                <li>
                    <a href="#">
                        <span class="menu-text">管理列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>-->
        </li>

        <li>
            <a href="<?php echo url('cate/lst'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">栏目管理</span>
                <i class="menu-expand"></i>
            </a>
        </li>

        <li>
            <a href="<?php echo url('article/lst'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">文档</span>
                <i class="menu-expand"></i>
            </a>
        </li>

        <li>
            <a href="<?php echo url('journal/showList'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">期刊管理</span>
                <i class="menu-expand"></i>
            </a>
        </li>

        <li>
        <a href="<?php echo url('monograph/showList'); ?>" class="menu-dropdown">
            <i class="menu-icon fa fa-file-text"></i>
            <span class="menu-text">专著管理</span>
            <i class="menu-expand"></i>
        </a>
        </li>

        <li>
        <a href="<?php echo url('thesis/showList'); ?>" class="menu-dropdown">
            <i class="menu-icon fa fa-file-text"></i>
            <span class="menu-text">学位论文管理</span>
            <i class="menu-expand"></i>
        </a>
        </li>
        <li>
            <a href="<?php echo url('patent/showList'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">专利管理</span>
                <i class="menu-expand"></i>
            </a>
        </li>

        <li>
            <a href="<?php echo url('standard/showList'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">标准管理</span>
                <i class="menu-expand"></i>
            </a>
        </li>

        <li>
            <a href="<?php echo url('newspaper/showList'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">报纸管理</span>
                <i class="menu-expand"></i>
            </a>
        </li>


        <li>
            <a href="<?php echo url('links/lst'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-link"></i>
                <span class="menu-text">友情链接</span>
                <i class="menu-expand"></i>
            </a>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">系统</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('tags/lst'); ?>">
                        <span class="menu-text">Tags标签管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="#">系统</a>
                    </li>
                    <li>
                        <a href="<?php echo url('newspaper/showList'); ?>">报纸管理</a>
                    </li>
                    <li class="active">报纸新增</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">报纸新增</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="" enctype="multipart/form-data"
                                          method="post">
                                        <div class="form-group">
                                            <label for="title"
                                                   class="col-sm-2 control-label no-padding-right">篇名</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="title" placeholder="" name="title"
                                                       type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="author_ch"
                                                   class="col-sm-2 control-label no-padding-right">作者(中文)</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="author_ch" placeholder="" name="author_ch"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="author_en"
                                                   class="col-sm-2 control-label no-padding-right">作者(英文)</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="author_en" placeholder="" name="author_en"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="type"
                                                   class="col-sm-2 control-label no-padding-right">类型</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="type" placeholder="" name="type"
                                                       type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="paper_name"
                                                   class="col-sm-2 control-label no-padding-right">报纸名称</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="paper_name" placeholder="" name="paper_name"
                                                       type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="version"
                                                   class="col-sm-2 control-label no-padding-right">版次</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="version" placeholder="" name="version"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="publisher"
                                                   class="col-sm-2 control-label no-padding-right">出版者</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="publisher" placeholder="" name="publisher"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="datetime"
                                                   class="col-sm-2 control-label no-padding-right">出版年份</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="datetime" placeholder="" name="datetime"
                                                       type="date">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="abstract"
                                                   class="col-sm-2 control-label no-padding-right">摘要</label>
                                            <div class="col-sm-6">
                                                <textarea name="abstract" class="form-control" id="abstract" rows="10px"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="content"
                                                   class="col-sm-2 control-label no-padding-right">报纸内容</label>
                                            <div class="col-sm-6">
                                                <label>
                                                    <textarea name="content" id="content"></textarea>
                                                </label>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">保存信息</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="__PUBLIC__/style/jquery_002.js"></script>
<script src="__PUBLIC__/style/bootstrap.js"></script>
<script src="__PUBLIC__/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="__PUBLIC__/style/beyond.js"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content', {initialFrameWidth: 800, initialFrameHeight: 600,});


</script>


</body>
</html>