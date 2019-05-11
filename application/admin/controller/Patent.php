<?php
namespace app\Admin\controller;

/*
 * 专利 控制器类
 * */
class Patent extends Base{
    /*
     * 显示专利列表
     * */
    public function showList(){

        //查询
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            $list = db('patent')->where($menuData,'like','%'.$titleData.'%')->paginate(3);
            $this->assign('list',$list);
            return $this->fetch();
        }
        $list = db('patent')->where('id','>',0)->paginate(3);
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
                'country'=>input('country'),
                'number'=>input('number'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('patentAdd')->check($data)){
                $this->error($validate->getError()); die;
            }
            //新增到数据库
            if(db('patent')->insert($data)){
                return $this->success('专利新增成功！','showList');
            }else{
                return $this->error('专利新增失败！');
            }
        }
        return $this->fetch();
    }

    /*
     * 期刊编辑
     * */
    public function edit(){

        $id=input('id');
        $patent=db('patent')->find($id);

        if(request()->isPost()){
            //数据获取
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'con_key'=>input('con_key'),
                'country'=>input('country'),
                'number'=>input('number'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];


            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('patentEdit')->check($data)){
                $this->error($validate->getError()); die;
            }

            //var_dump( $data);die();
            //更新数据库
            if(db('patent')->update($data)){
                $this->success('专利修改成功！','showList');
            }else{
                $this->error('专利修改失败！');
            }
        }
        $this->assign('patent',$patent);
        return $this->fetch();
    }

    /*
     * 删除
     * */
    public function del(){
        $id=input('id');
        if(db('patent')->delete(input('id'))){
            $this->success('专利删除成功！','showList');
        }else{
            $this->error('专利删除失败！');
        }
    }

}
