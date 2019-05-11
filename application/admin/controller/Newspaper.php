<?php
namespace app\Admin\controller;

/*
 * 报纸 控制器类
 * */
class Newspaper extends Base{
    /*
     * 显示报纸列表
     * */
    public function showList(){

        //查询
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $list = db('newspaper')->where($menuData,'like','%'.$titleData.'%')->paginate(3);
            $this->assign('list',$list);
            return $this->fetch();
        }
        $list = db('newspaper')->where('id','>',0)->paginate(3);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    /*
     *报纸添加
     * */
    public function add(){
        if(request()->isPost()){
            //数据获取
            $data=[
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'paper_name'=>input('paper_name'),
                'version'=>input('version'),
                'publisher'=>input('publisher'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('newspaperAdd')->check($data)){
                $this->error($validate->getError()); die;
            }
            //新增到数据库
            if(db('newspaper')->insert($data)){
                return $this->success('报纸新增成功！','showList');
            }else{
                return $this->error('报纸新增失败！');
            }
        }
        return $this->fetch();
    }

    /*
     * 报纸编辑
     * */
    public function edit(){

        $id=input('id');
        $newspapers=db('newspaper')->find($id);

        if(request()->isPost()){
            //数据获取
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'paper_name'=>input('paper_name'),
                'version'=>input('version'),
                'publisher'=>input('publisher'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];


            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('newspaperEdit')->check($data)){
                $this->error($validate->getError()); die;
            }

            //var_dump( $data);die();
            //更新数据库
            if(db('newspaper')->update($data)){
                $this->success('报纸修改成功！','showList');
            }else{
                $this->error('报纸修改失败！');
            }
        }
        $this->assign('newspapers',$newspapers);
        return $this->fetch();
    }

    /*
     * 报纸删除
     * */
    public function del(){
        $id=input('id');
        if(db('newspaper')->delete(input('id'))){
            $this->success('报纸删除成功！','showList');
        }else{
            $this->error('报纸删除失败！');
        }
    }

}
