<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\wamp\www\tp5_blog\public/../application/index\view\cate\cate.html";i:1475997621;s:72:"D:\wamp\www\tp5_blog\public/../application/index\view\common\header.html";i:1523964388;s:71:"D:\wamp\www\tp5_blog\public/../application/index\view\common\right.html";i:1475987682;s:70:"D:\wamp\www\tp5_blog\public/../application/index\view\common\foot.html";i:1523946266;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>童老师ThinkPHP交流群：484519446</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="童老师ThinkPHP交流群：484519446" />
<meta name="description" content="童老师ThinkPHP交流群：484519446" /> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="__PUBLIC__/style/lady.css" type="text/css" rel="stylesheet" />
<!-- <link href="http://www.topthink.com/Public/static/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" /> -->
<script type='text/javascript' src='__PUBLIC__/style/ismobile.js'></script>
</head>

<body>

        <div class="ladytop" style="background-color: black">
            <div class="nav">
                <div class="left"><a href=""><img src="__PUBLIC__/images/logo.png" alt="文献管理网"></a></div>
                <div class="right">
                    <div class="box" style="padding-left: 60px">
                    <a href="<?php echo url('index/index'); ?>">首页</a>

                        <a href="<?php echo url('index/showMonograph'); ?>" >期刊</a>
                        <a href="<?php echo url('monograph/showList'); ?>" >专著</a>
                        <a href="<?php echo url('cate/index'); ?>" >学位论文</a>
                        <a href="<?php echo url('cate/index'); ?>" >专利</a>
                        <a href="<?php echo url('cate/index'); ?>" >标准</a>
                        <a href="<?php echo url('cate/index'); ?>" >报纸</a>

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


<div class="position"><a href="<?php echo url('index/index'); ?>">主页</a> > <a href="<?php echo url('cate/index',array('cateid'=>$cates['id'])); ?>"><?php echo $cates['catename']; ?></a> >  </div>

<div class="overall">

	<div class="left">
				
		<?php if(is_array($articleres) || $articleres instanceof \think\Collection): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<div class="xnews2">
		<div class="pic"><a target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>">
		<img src="<?php if($vo['pic'] != ''): ?>__IMG__<?php echo $vo['pic']; else: ?>__PUBLIC__/images/error.png<?php endif; ?>" alt=""/>
		</a></div>
		<div class="dec">
		<h3><a target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>"><?php echo $vo['title']; ?></a></h3>
		<div class="time">发布时间：<?php echo date("Y-m-d",$vo['time']); ?></div>
		<p><?php echo $vo['desc']; ?></p>
		<div class="time">
		<?php
			$arr=explode(',', $vo['keywords']);
			foreach ($arr as $k=>$v) {
				echo "<a href='http://127.0.0.1/tp5/public/index.php/index/search/index?keywords=$v'>$v</a>";
			}
		?>
		</div>
		</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>

				
				<div class="pages">
				<div class="plist" >
<?php echo $articleres->render(); ?>
				</div>
				</div>
	</div>
	
	<div class="right">
                <!--右侧各种广告-->
                <!--猜你喜欢-->
<div id="hm_t_57953"><div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
<div class="hm-t-container" style="width: 298px;"><div class="hm-t-main"><div class="hm-t-header">热门点击</div><div class="hm-t-body"><ul class="hm-t-list hm-t-list-img">
<?php if(is_array($clickres) || $clickres instanceof \think\Collection): $i = 0; $__LIST__ = $clickres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="hm-t-item hm-t-item-img"><a data-pos="3" title="<?php echo $vo['title']; ?>" target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>" class="hm-t-img-title" style="visibility: visible;"><span><?php echo $vo['title']; ?></span></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div></div></div>

</div></div>
<div style="height:15px"></div>
<div id="hm_t_57953"><div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
<div style="width: 298px;" class="hm-t-container"><div class="hm-t-main"><div class="hm-t-header">推荐阅读</div><div class="hm-t-body"><ul class="hm-t-list hm-t-list-img">
<?php if(is_array($tjres) || $tjres instanceof \think\Collection): $i = 0; $__LIST__ = $tjres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="hm-t-item hm-t-item-img"><a data-pos="3" title="<?php echo $vo['title']; ?>" target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>" class="hm-t-img-title" style="visibility: visible;"><span><?php echo $vo['title']; ?></span></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div></div></div>

</div></div>
<div style="height:15px"></div>

<div id="bdcs"><div class="bdcs-container"><meta content="IE=9" http-equiv="x-ua-compatible">   <!-- 嵌入式 -->  <div id="default-searchbox" class="bdcs-main bdcs-clearfix">      <div id="bdcs-search-inline" class="bdcs-search bdcs-clearfix">
	<form id="bdcs-search-form" autocomplete="off" class="bdcs-search-form" target="_blank" method="get" action="<?php echo url('Search/index'); ?>">
		<input type="text" placeholder="请输入关键词" id="bdcs-search-form-input" class="bdcs-search-form-input" name="keywords" autocomplete="off" style="line-height: 30px; width:220px;">              
		<input type="submit" value="搜索" id="bdcs-search-form-submit" class="bdcs-search-form-submit bdcs-search-form-submit-magnifier">
	</form>      
</div>                <div id="bdcs-search-sug" class="bdcs-search-sug" style="top: 552px; width: 239px;">              <ul id="bdcs-search-sug-list" class="bdcs-search-sug-list"></ul>          </div>                  </div>                           </div></div>

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