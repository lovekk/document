<?php
namespace app\Admin\controller;

/*
 * 期刊 控制器类
 * */
class Journal extends Base{
    /*
     * 显示期刊列表
     * */
    public function showList(){
    	// $list = ArticleModel::paginate(3);
        //数据表连接查询
        //$list=db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.state,c.catename')->paginate(3);
        //$list = ArticleModel::paginate(5);
        //查询
        if(request()->isPost()){
            $titleData=input('post.search');
            $menuData=input('post.menu');
            //var_dump($menuData);die();

            $list = db('journal')->where($menuData,'like','%'.$titleData.'%')->paginate(3);
            //var_dump($list);die();

            $this->assign('list',$list);
            return $this->fetch();
        }
        $list = db('journal')->where('id','>',0)->paginate(3);
        //var_dump($list);die();
    	$this->assign('list',$list);
        return $this->fetch();
    }
    /*
     * 期刊添加
     * */
    public function add(){

        if(request()->isPost()){
            // dump($_POST); die;
            //数据获取
            $data=[
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'con_key'=>input('con_key'),
                'full_name'=>input('full_name'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('journalAdd')->check($data)){
                $this->error($validate->getError()); die;
            }
            //新增到数据库
            if(db('journal')->insert($data)){
                return $this->success('期刊新增成功！','showList');
            }else{
                return $this->error('期刊新增失败！');
            }
        }
        return $this->fetch();
    }
    /*
     * 期刊编辑
     * */
    public function edit(){
        $id=input('id');
        $journals=db('journal')->find($id);
        if(request()->isPost()){
            //数据获取
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author_ch'=>input('author_ch'),
                'author_en'=>input('author_en'),
                'type'=>input('type'),
                'con_key'=>input('con_key'),
                'full_name'=>input('full_name'),
                'datetime'=>input('datetime'),
                'abstract'=>input('abstract'),
                'content'=>input('content'),
            ];
            //数据验证
            $validate = \think\Loader::validate('Scene');
            if(!$validate->scene('journalEdit')->check($data)){
                $this->error($validate->getError()); die;
            }
            //更新数据库
            if(db('journal')->update($data)){
                $this->success('期刊修改成功！','showList');
            }else{
                $this->error('期刊修改失败！');
            }
        }
        $this->assign('journals',$journals);
        return $this->fetch();
    }
    /*
     * 删除
     * */
    public function del(){
        $id=input('id');
        if(db('journal')->delete(input('id'))){
            $this->success('期刊删除成功！','showList');
        }else{
            $this->error('期刊删除失败！');
        }
    }
}
