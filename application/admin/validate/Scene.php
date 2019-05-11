<?php
namespace app\admin\validate;
use think\Validate;
class Scene extends Validate
{
    /*
     * 规则
     * */
    protected $rule = [
        'title'  =>  'require|max:100', //标题
        'author_cn' =>  'require', //中文名
        'author_en' =>  'require', //英文名
        'type' =>  'require',  //类型
        'con_key' =>  'require',  //关键词
        'version' =>  'require',  //版本
        'datetime' =>  'require',  //出版年份
        'publisher' =>  'require', //出版人
        'abstract' =>  'require',  //摘要
        'content' =>  'require',  //内容
        'country' =>  'require',  //国别
        'sta_name' =>  'require',  //标准名称
        'teacher' =>  'require',  //指导老师
        'location' =>  'require',  //地区
        'department' =>  'require',  //部门
        'number' =>  'require',  //编号
        'paper_name' =>  'require',  //名称
    ];

    /*
     * 提示
     * */
    protected $message  =   [
        'title.require' => '标题必须填写',
        'title.max' => '标题长度不得大于100位',
        'author_cn.require' => '中文名必须填写',
        'author_en.require' => '英文名必须填写',
        'type.require' => '类型必须填写',
        'con_key.require' => '关键词必须填写',
        'version.require' => '版本必须填写',
        'datetime.require' => '出版年份必须填写',
        'publisher.require' => '出版人必须填写',
        'abstract.require' => '摘要必须填写',
        'content.require' => '内容必须填写',
        'country.require' => '国别必须填写',
        'sta_name.require' => '标准名称必须填写',
        'teacher.require' => '指导老师必须填写',
        'location.require' => '地区必须填写',
    ];
    /*
     * 场景
     * */
    protected $scene = [
        'journalAdd'  =>  ['title','type','con_key','abstract','content'],
        'journalEdit'  =>  ['title','type','con_key','abstract','content'],
        'monographAdd'  =>  ['title','type','con_key','abstract','content'],
        'monographEdit'  =>  ['title','type','con_key','abstract','content'],
        'thesisAdd'  =>  ['title','type','con_key','abstract','content'],
        'thesisEdit'  =>  ['title','type','con_key','abstract','content'],
        'patentAdd'  =>  ['title','type','con_key','abstract','content'],
        'patentEdit'  =>  ['title','type','con_key','abstract','content'],
        'standardAdd'  =>  ['sta_name','type','department','number'],
        'standardEdit'  =>  ['sta_name','type','department','number'],
        'newspaperAdd'  =>  ['title','type','paper_name','content'],
        'newspaperEdit'  =>  ['title','type','paper_name','content'],
    ];
}
