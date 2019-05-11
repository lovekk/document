<?php
namespace app\Admin\controller;

/*
 * 标准 控制器类
 * */
class Standard extends Base{
    /*
     * 显示标准列表
     * */
    public function showList(){

        //查询
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $list = db('standard')->where($menuData,'like','%'.$titleData.'%')->paginate(3);
            $this->assign('list',$list);
            return $this->fetch();
        }
        $list = db('standard')->where('id','>',0)->paginate(3);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    /*
     * 标准添加
     * */
    public function add(){
        if(request()->isPost()){
            //数据获取
            $data=[
                'sta_name'=>input('sta_name'),
                'type'=>input('type'),
                'department'=>input('department'),
                'number'=>input('number'),
                'datetime'=>input('datetime'),
                'datetime_action'=>input('datetime_action'),
                'datetime_abolish'=>input('datetime_abolish'),
                'condition'=>input('condition'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('standardAdd')->check($data)){
                $this->error($validate->getError()); die;
            }
            //新增到数据库
            if(db('standard')->insert($data)){
                return $this->success('标准新增成功！','showList');
            }else{
                return $this->error('标准新增失败！');
            }
        }
        return $this->fetch();
    }

    /*
     * 期刊编辑
     * */
    public function edit(){

        $id=input('id');
        $standard=db('standard')->find($id);

        if(request()->isPost()){
            //数据获取
            $data=[
                'id'=>input('id'),
                'sta_name'=>input('sta_name'),
                'type'=>input('type'),
                'department'=>input('department'),
                'number'=>input('number'),
                'datetime'=>input('datetime'),
                'datetime_action'=>input('datetime_action'),
                'datetime_abolish'=>input('datetime_abolish'),
                'condition'=>input('condition'),
                'content'=>input('content'),
            ];


            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('standardEdit')->check($data)){
                $this->error($validate->getError()); die;
            }

            //var_dump( $data);die();
            //更新数据库
            if(db('standard')->update($data)){
                $this->success('标准修改成功！','showList');
            }else{
                $this->error('标准修改失败！');
            }
        }
        $this->assign('standard',$standard);
        return $this->fetch();
    }

    /*
     * 删除
     * */
    public function del(){
        $id=input('id');
        if(db('standard')->delete(input('id'))){
            $this->success('标准删除成功！','showList');
        }else{
            $this->error('标准删除失败！');
        }
    }

}
