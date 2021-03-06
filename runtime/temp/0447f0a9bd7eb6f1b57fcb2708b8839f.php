<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"D:\wamp\www\document\public/../application/admin\view\newspaper\showlist.htm";i:1523945705;s:68:"D:\wamp\www\document\public/../application/admin\view\common\top.htm";i:1523986191;s:69:"D:\wamp\www\document\public/../application/admin\view\common\left.htm";i:1524399328;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>报纸列表</title>

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

</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner" style="background-color: black;">
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
                                            src="__PUBLIC__/images/we.png">
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
            <a href="<?php echo url('links/showList'); ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-link"></i>
                <span class="menu-text">友情链接</span>
                <i class="menu-expand"></i>
            </a>
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
                    <li class="active">报纸列表</li>
                </ul>
            </div>
            <br>
            <!-- /Page Breadcrumb -->
            <form class="form-horizontal" role="form" action="" enctype="multipart/form-data"
                  method="post">

                <span class="input-icon" style="width: 20%;margin-left: 20px">
                    <input type="text" class="form-control input-sm" id="search" name="search">
                    <i class="glyphicon glyphicon-search blue"></i>
                </span>
                <select name="menu">
                    <option value="title">篇名</option>
                    <option value="author_ch">作者</option>
                    <option value="type">类型</option>
                    <option value="con_key">报纸名称</option>
                    <option value="publisher">出版者</option>
                    <option value="datetime">出版年份</option>
                    <option value="abstract">摘要</option>
                </select>
                <button type="submit" class="btn btn-default">查询</button>
            </form>




            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="报纸期刊" class="btn btn-sm btn-azure btn-addon"
                        onClick="javascript:window.location.href = '<?php echo url('newspaper/add'); ?>'"><i class="fa fa-plus"></i> 报纸新增
                </button>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center" width="4%">ID</th>
                                            <th class="text-center" width="10%">篇名</th>
                                            <th class="text-center">作者</th>
                                            <th class="text-center">类型</th>
                                            <th class="text-center" width="10%">报纸名称</th>
                                            <th class="text-center">版次</th>
                                            <th class="text-center">出版者</th>
                                            <th class="text-center">出版年份</th>
                                            <th class="text-center" width="20%">摘要</th>
                                            <th class="text-center" width="14%">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td align="center"><?php echo $vo['id']; ?></td>
                                            <td align="center"><?php echo $vo['title']; ?></td>
                                            <td align="center"><?php echo $vo['author_ch']; ?> <?php echo $vo['author_en']; ?></td>
                                            <td align="center"><?php echo $vo['type']; ?></td>
                                            <td align="center"><?php echo $vo['paper_name']; ?></td>
                                            <td align="center"><?php echo $vo['version']; ?></td>
                                            <td align="center"><?php echo $vo['publisher']; ?></td>
                                            <td align="center"><?php echo $vo['datetime']; ?></td>
                                            <td align="center"><?php echo mb_substr($vo['abstract'],0,30,'utf-8'); ?>...</td>

                                            <td align="center">
                                                <a href="<?php echo url('newspaper/edit',array('id'=>$vo['id'])); ?>"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#"
                                                   onClick="warning('确实要删除吗', '<?php echo url('newspaper/del',array('id'=>$vo['id'])); ?>')"
                                                   class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="text-align:right; margin-top:10px;">
                                    <?php echo $list->render(); ?>
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


</body>
</html>