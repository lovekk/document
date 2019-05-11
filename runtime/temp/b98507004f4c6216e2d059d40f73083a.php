<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\wamp\www\tp5_blog\public/../application/index\view\index\oneThesis.html";i:1523981017;s:72:"D:\wamp\www\tp5_blog\public/../application/index\view\common\header.html";i:1523982405;s:71:"D:\wamp\www\tp5_blog\public/../application/index\view\common\right.html";i:1523983835;s:70:"D:\wamp\www\tp5_blog\public/../application/index\view\common\foot.html";i:1523946266;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>论文-全文</title>
    <link href="__PUBLIC__/style/lady.css" type="text/css" rel="stylesheet"/>
    <script type='text/javascript' src='__PUBLIC__/style/ismobile.js'></script>
</head>

<body>
<div class="ladytop" style="background-color: black">
            <div class="nav">
                <div class="left"><a href=""><img src="__PUBLIC__/images/logo.png" alt="文献管理网"></a></div>
                <div class="right">
                    <div class="box" style="padding-left: 60px">
                    <a href="<?php echo url('index/index'); ?>">首页</a>
                        <a href="<?php echo url('index/showJournal'); ?>" >期刊</a>
                        <a href="<?php echo url('index/showMonograph'); ?>" >专著</a>
                        <a href="<?php echo url('index/showThesis'); ?>" >学位论文</a>
                        <a href="<?php echo url('index/showPatent'); ?>" >专利</a>
                        <a href="<?php echo url('index/showStandard'); ?>" >标准</a>
                        <a href="<?php echo url('index/showNewspaper'); ?>" >报纸</a>
                    </div>
                </div>
            </div>
        </div>

<div class="hotmenu">
	<div class="con">友情连接：
    <?php if(is_array($linkList) || $linkList instanceof \think\Collection): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a href='<?php echo $vo['url']; ?>' target="_blank"><?php echo $vo['title']; ?></a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!--顶部通栏-->
<div class="position"><a href='<?php echo url(' index/index'); ?>'>主页</a> </div>

<div class="overall">
    <div class="left">
        <!--头部-->
        <div class="scrap">
            <h1><?php echo $oneThesis['title']; ?></h1>
            <div class="spread" >
                <span class="writor">发布日期：<?php echo $oneThesis['datetime']; ?></span>
                <span class="writor">作者：<?php echo $oneThesis['author_ch']; ?> | <?php echo $oneThesis['author_en']; ?></span>
                <span class="writor">导师：<?php echo $oneThesis['teacher']; ?></span><br><br>

                <span class="writor">论文类型：<?php echo $oneThesis['type']; ?></span>
                <span class="writor">关键词：<?php echo $oneThesis['con_key']; ?></span>
                <span class="writor">学位授予：<?php echo $oneThesis['location']; ?></span>
            </div>
        </div>
        <br>
        <!--摘要-->
        <div class="takeaway">
            <span class="btn arr-left"></span>
            <p class="jjxq">摘要：<?php echo $oneThesis['abstract']; ?></p>
            <span class="btn arr-right"></span>
        </div>
        <!--内容-->
        <div class="substance">
            <?php echo $oneThesis['content']; ?>
        </div>

    </div>
    <div class="right">
    <!--右侧各种广告-->
    <!--猜你喜欢-->
    <div>
        <div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
            <div class="hm-t-container" style="width: 298px;">
                <div class="hm-t-main">
                    <div class="hm-t-header">最新期刊</div>
                    <div class="hm-t-body">
                        <ul class="hm-t-list hm-t-list-img">
                            <?php if(is_array($clickres) || $clickres instanceof \think\Collection): $i = 0; $__LIST__ = $clickres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li class="hm-t-item hm-t-item-img">
                                <a data-pos="3" title="<?php echo $vo['title']; ?>" target="_blank"
                                   href="<?php echo url('index/showJournal',array('id'=>$vo['id'])); ?>" class="hm-t-img-title"
                                   style="visibility: visible;"><span><?php echo $vo['title']; ?></span></a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="height:15px"></div>
    <div id="hm_t_57953">
        <div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
            <div style="width: 298px;" class="hm-t-container">
                <div class="hm-t-main">
                    <div class="hm-t-header">报纸阅读</div>
                    <div class="hm-t-body">
                        <ul class="hm-t-list hm-t-list-img">
                            <?php if(is_array($tjres) || $tjres instanceof \think\Collection): $i = 0; $__LIST__ = $tjres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li class="hm-t-item hm-t-item-img" style="border-radius: 2px"><a data-pos="3" title="<?php echo $vo['title']; ?>" target="_blank"
                                href="<?php echo url('index/showNewspaper',array('id'=>$vo['id'])); ?>" class="hm-t-img-title"
                                style="visibility: visible;"><span><?php echo $vo['title']; ?></span></a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="height:15px"></div>



</div>
</div>
<div class="footerd">
<ul>
<li>Copyright &#169; 2018  all rights 张伟伟 版权所有   <a href="#" target="_blank" rel="nofollow">苏 备00000000号</a></li>
</ul>
</div>

</body>
</html>