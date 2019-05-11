<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"D:\wamp\www\document\public/../application/index\view\index\showpatent.html";i:1524566139;s:72:"D:\wamp\www\document\public/../application/index\view\common\header.html";i:1525964967;s:71:"D:\wamp\www\document\public/../application/index\view\common\right.html";i:1523983835;s:70:"D:\wamp\www\document\public/../application/index\view\common\foot.html";i:1523946266;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>专利列表</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
                        <a href="<?php echo url('index/showpaper'); ?>" >报纸</a>
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
<div class="overall">
	<div class="left">
		<div class="xnews2" style="float: left;width: 800px;height: 50px;margin-top: 40px">
			<form role="form" action="" enctype="multipart/form-data" method="post">
		    <span>
			<input type="text" id="search" name="search"
				   style="width: 400px;height:40px;border-radius: 5px;font-size: 18px" placeholder="请输入专利检索关键词">
            </span>
				<select name="menu" style="width: 100px;height:40px;border-radius: 5px;font-size: 16px">
					<option value="title">专利名称</option>
					<option value="author_ch">申请人</option>
					<option value="type">专利类型</option>
					<option value="datetime">申请日期</option>
					<option value="country">国别</option>
					<option value="number">专利号</option>
					<option value="abstract">摘要</option>
					<option value="content">全文内容</option>
				</select>
				<button type="submit" class="btn btn-default"
						style="width: 100px;height:40px;border-radius: 5px;font-size: 18px">检索
				</button>
			</form>
		</div>
	</div>
</div>
<div class="position"></div>
<div class="overall">
	<div class="left">
		<?php if(is_array($patentList) || $patentList instanceof \think\Collection): $i = 0; $__LIST__ = $patentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<div class="xnews2">
			<div class="dec">
				<a style="font-size: 20px" target="_blank" href="<?php echo url('index/showPatent',array('id'=>$vo['id'])); ?>"><?php echo $vo['title']; ?></a>&nbsp;&nbsp;&nbsp;点击量：<?php echo $vo['cnum']; ?>
				<br>
				<span class="writor">
                    发明人：<?php echo $vo['author_ch']; ?>|<?php echo $vo['author_en']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    申请日期：<?php echo $vo['datetime']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    专利号：<?php echo $vo['number']; ?><br>

					<a style="font-size: 20px" target="_blank" href="<?php echo url('index/outwordD',array('id'=>$vo['id'],'qufen'=>4)); ?>"><input type="button" value="下载" ></a>
					&nbsp;&nbsp;&nbsp;下载量：<?php echo $vo['dnum']; ?>
                </span>
			</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="pages">
			<div class="plist">
				<?php echo $patentList->render(); ?>
			</div>
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