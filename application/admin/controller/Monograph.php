<?php
namespace app\Admin\controller;
/*
 * 专著 控制器类
 * */
class Monograph extends Base{
    /*
     * 显示专著列表
     * */
    public function showList(){

        //查询
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $list = db('monograph')->where($menuData,'like','%'.$titleData.'%')->paginate(3);
            $this->assign('list',$list);
            return $this->fetch();
        }
        $list = db('monograph')->where('id','>',0)->paginate(3);
    	$this->assign('list',$list);
        return $this->fetch();
    }
    /*
     * 专著添加
     * */
    public function add(){
        if(request()->isPost()){
            //数据获取
            $data=[
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'con_key'=>input('con_key'),
                'version'=>input('version'),
                'publisher'=>input('publisher'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('monographAdd')->check($data)){
                $this->error($validate->getError()); die;
            }
            //新增到数据库
            if(db('monograph')->insert($data)){
                return $this->success('专著新增成功！','showList');
            }else{
                return $this->error('专著新增失败！');
            }
        }
        return $this->fetch();
    }
    /*
     * 专著编辑
     * */
    public function edit(){
        $id=input('id');
        $monographs=db('monograph')->find($id);
        if(request()->isPost()){
            //数据获取
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'con_key'=>input('con_key'),
                'version'=>input('version'),
                'publisher'=>input('publisher'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('monographEdit')->check($data)){
                $this->error($validate->getError()); die;
            }
            //var_dump( $data);die();
            //更新数据库
            if(db('monograph')->update($data)){
                $this->success('专著修改成功！','showList');
            }else{
                $this->error('专著修改失败！');
            }
        }
        $this->assign('monographs',$monographs);
        return $this->fetch();
    }
    /*
     * 专著删除
     * */
    public function del(){
        $id=input('id');
        if(db('monograph')->delete(input('id'))){
            $this->success('专著删除成功！','showList');
        }else{
            $this->error('专著删除失败！');
        }
    }
}
