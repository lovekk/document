<?php
namespace app\index\controller;
use think\Controller;
class Base extends Controller
{
    public function _initialize()
    {
    	$this->right();
        $links=db('links')->order('id desc')->select();
    	$this->assign(array(
            'linkList'=>$links
            ));
    }


    public function right(){
    	$clickres=db('journal')->order('id desc')->limit(8)->select();
    	$tjres=db('newspaper')->where('id','>',0)->order('id desc')->limit(8)->select();
    	$this->assign(array(
    			'clickres'=>$clickres,
    			'tjres'=>$tjres
    		));
    }





}
