<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\wamp\www\document\public/../application/admin\view\login\login.htm";i:1523984562;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>文献管理系统后台</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__PUBLIC__/style/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="__PUBLIC__/style/beyond.css" rel="stylesheet">
    <link href="__PUBLIC__/style/demo.css" rel="stylesheet">
    <link href="__PUBLIC__/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body style="background-color: #0a246a">

    <div class="login-container animated fadeInDown">
        <p style="font-size: 48px;padding-bottom: 70px">文献管理系统</p>
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">登录</div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="请输入用户名" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="请输入密码" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="验证码" name="code" style="margin:0 0;width:80px;float:left;" type="text">
                    <img  style="float:left; cursor:pointer;" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" />
                </div>

                <br>
                <br>
                <div class="loginbox-submit">
                    <input class="btn btn-maroon" value="登录" type="submit">
                </div>
            </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="__PUBLIC__/style/jquery.js"></script>
    <script src="__PUBLIC__/style/bootstrap.js"></script>
    <script src="__PUBLIC__/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="__PUBLIC__/style/beyond.js"></script>


</body><!--Body Ends--></html>