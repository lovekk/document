<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\wamp\www\tp5_blog\public/../application/index\view\article\article.html";i:1475985640;s:72:"D:\wamp\www\tp5_blog\public/../application/index\view\common\header.html";i:1523982405;s:71:"D:\wamp\www\tp5_blog\public/../application/index\view\common\right.html";i:1523983511;s:70:"D:\wamp\www\tp5_blog\public/../application/index\view\common\foot.html";i:1523946266;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>童老师ThinkPHP交流群：484519446</title>
        <meta name="keywords" content="童老师ThinkPHP交流群：484519446" />
        <meta name="description" content="童老师ThinkPHP交流群：484519446" />
        <meta name="mobile-agent" content="format=html5; url=http://m.zx.wed114.cn/shenghuo/20160920156214.html" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<link href="__PUBLIC__/style/lady.css" type="text/css" rel="stylesheet" />
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
        <script src='/jiehun/goto/my-65547.js' language='javascript'></script>

        <div class="position"><a href='<?php echo url('index/index'); ?>'>主页</a> > <a href="<?php echo url('cate/index',array('cateid'=>$cates['id'])); ?>"><?php echo $cates['catename']; ?></a> >  </div>

        <div class="overall">
            <div class="left">
                <div class="scrap">
                    <h1><?php echo $articles['title']; ?></h1>
                    <div class="spread">
                        <span class="writor">发布时间：<?php echo date("Y-m-d",$articles['time']); ?></span>
                        <span class="writor">编辑：<?php echo $articles['author']; ?></span>
                        <span class="writor">标签：
                            <?php
                                $arr=explode(',', $articles['keywords']);
                                foreach ($arr as $k=>$v) {
                                    echo "<a href='#'>$v</a>";
                                }
                            ?>
                        </span>
                        <span class="writor">热度：<?php echo $articles['click']; ?></span>
                    </div>
                </div>

                <!--百度分享-->
                <script src='/jiehun/goto/my-65542.js' language='javascript'></script>

                <div class="takeaway">
                    <span class="btn arr-left"></span>
                    <p class="jjxq"><?php echo $articles['desc']; ?>
</p>
                    <span class="btn arr-right"></span>
                </div>

                  <script src='/jiehun/goto/my-65541.js' language='javascript'></script>

                <div class="substance">
                <?php echo $articles['content']; ?>
                </div>


                <div class="biaoqian">
                   
                </div>



                <!--相关阅读 -->
                <div class="xgread">
                    <div class="til"><h4>相关阅读</h4></div>
                    <div class="lef"><!--相关阅读主题链接--><script src='/jiehun/goto/my-65540.js' language='javascript'></script></div>
                    <div class="rig">
                        <ul>
                            <?php if(is_array($ralateres) || $ralateres instanceof \think\Collection): $i = 0; $__LIST__ = $ralateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li><a href="<?php echo url('article/index',array('arid'=>$vo[0])); ?>" target="_blank"><?php echo $vo['1']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>


                        </ul>
                    </div>
                </div>

                <!--频道推荐-->
                <div class="hotsnew">
                    <div class="til"><h4>频道推荐</h4></div>
                    <ul>
                        <?php if(is_array($recres) || $recres instanceof \think\Collection): $i = 0; $__LIST__ = $recres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><div class="tu"><a href='<?php echo url('article/index',array('arid'=>$vo['id'])); ?>' target="_blank">
                        <img src="<?php if($vo['pic'] != ''): ?>__IMG__<?php echo $vo['pic']; else: ?>__PUBLIC__/images/error.png<?php endif; ?>" alt=""/></a></div><p><a href='<?php echo url('article/index',array('arid'=>$vo['id'])); ?>'><?php echo $vo['title']; ?></a></p></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
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
                            <li class="hm-t-item hm-t-item-img"><a data-pos="3" title="<?php echo $vo['title']; ?>" target="_blank"
                                                                   href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>"
                                                                   class="hm-t-img-title"
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
                            <li class="hm-t-item hm-t-item-img"><a data-pos="3" title="<?php echo $vo['title']; ?>" target="_blank"
                                                                   href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>"
                                                                   class="hm-t-img-title"
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