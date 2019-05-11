<?php
namespace app\Admin\controller;

/*
 * 学位论文 控制器类
 * */
class Thesis extends Base{
    /*
     * 显示学位论文列表
     * */
    public function showList(){

        //查询
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $list = db('thesis')->where($menuData,'like','%'.$titleData.'%')->paginate(3);
            $this->assign('list',$list);
            return $this->fetch();
        }
        $list = db('thesis')->where('id','>',0)->paginate(3);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    /*
     * 期刊添加
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
                'teacher'=>input('teacher'),
                'location'=>input('location'),
                'publisher'=>input('publisher'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('thesisAdd')->check($data)){
                $this->error($validate->getError()); die;
            }
            //新增到数据库
            if(db('thesis')->insert($data)){
                return $this->success('学位论文新增成功！','showList');
            }else{
                return $this->error('学位论文新增失败！');
            }
        }
        return $this->fetch();
    }

    /*
     * 期刊编辑
     * */
    public function edit(){

        $id=input('id');
        $thesis=db('thesis')->find($id);

        if(request()->isPost()){
            //数据获取
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'con_key'=>input('con_key'),
                'teacher'=>input('teacher'),
                'location'=>input('location'),
                'publisher'=>input('publisher'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];


            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('thesisEdit')->check($data)){
                $this->error($validate->getError()); die;
            }

            //var_dump( $data);die();
            //更新数据库
            if(db('thesis')->update($data)){
                $this->success('学位论文修改成功！','showList');
            }else{
                $this->error('学位论文修改失败！');
            }
        }
        $this->assign('thesis',$thesis);
        return $this->fetch();
    }

    /*
     * 删除
     * */
    public function del(){
        $id=input('id');
        if(db('thesis')->delete(input('id'))){
            $this->success('学位论文删除成功！','showList');
        }else{
            $this->error('学位论文删除失败！');
        }
    }

}
