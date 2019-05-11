<?php
namespace app\admin\validate;
use think\Validate;
/*
 * 管理员验证器类
 * */
class Admin extends Validate{
    //验证规则
    protected $rule = [
        'username'  =>  'require|max:10|unique:admin',
        'password' =>  'require',
    ];

    //错误提示
    protected $message  =   [
        'username.require' => '管理员名称必须填写',
        'username.max' => '管理员名称长度不得大于10位',
        'username.unique' => '管理员名称不得重复',
        'password.require' => '管理员密码必须填写',
    ];

    //验证场景
    protected $scene = [
        //可以另外加验证规则(自定义规则后，相应的原始规则会失效)
        //像password就是使用的在rule里定义好的规则
        'add'  =>  ['username'=>'require|unique:admin','password'],
        'edit'  =>  ['username'=>'require|unique:admin'],
    ];




}
