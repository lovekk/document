<?php
namespace app\Admin\controller;
use app\Admin\model\Links as LinksModel;
use app\admin\controller\Base;
class Links extends Base
{
    public function lst()
    {
    	$linkList = $list = db('links')->where('id','>',0)->select();
    	$this->assign('linkList',$linkList);
        return $this->fetch();
    }
}
