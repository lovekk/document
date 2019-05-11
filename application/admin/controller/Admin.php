<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel; //本类也是Admin类，避免冲突可另命名为AdminModel
use app\admin\controller\Base;
use think\Validate;
/*
 * 管理员类
 * */
class Admin extends Base{
    /*
     * 显示管理员列表方法
     * */
    public function lst(){
        $model= new AdminModel();
    	$list = AdminModel::paginate(5);//分页显示
    	$this->assign('list',$list); //$list传给'list' 视图使用{volist name="list" id="vo"} 取值{$vo.id}
        return $this->fetch();
    }

    /*
     * 增加管理员方法
     * */
    public function add(){
    	if(request()->isPost()){ //判断是否为post提交
            //var_dump(input('post.'));//查看post提交的数据
            //接收提交的数据
			$data=[
			    //字段名       //表单name值
    			'username'=>input('username'),
    			'password'=>MD5(input('password')),
    		];
			//数据验证
            /*$validate = new \think\Validate([
                'usernem' => 'require|max:25',
                'password' => 'require|max25'
            ]);
            if(!$validate->check($data)){
                $this->error($validate->getError()); die;
            }*/
            //数据验证
    		$validate = \think\Loader::validate('Admin');
    		if(!$validate->scene('add')->check($data)){
			   $this->error($validate->getError()); die;
			}
            //tp助手函数添加数据
            //db('表名') -> insert($data);//添加单条
            //db('表名') -> insertAll($list);//添加多条
    		if(db('admin')->insert($data)){
    		    //修改成功，跳到list
    			return $this->success('添加管理员成功！','lst');
    		}else{
    			return $this->error('添加管理员失败！');
    		}
    	}
        return $this->fetch();
    }

    /*
     * 编辑管理员方法
     * */
    public function edit(){
    	$id=input('id');//获取传来的id
    	$admins=db('admin')->find($id);//返回的是一维数组
    	//var_dump($admins);die();
        //修改管理员信息
    	if(request()->isPost()){
    	    //接收数据
    		$data=[
    		    //'数据表字段' => input('视图表单name值')
    			'id'=>input('id'),
    			'username'=>input('username'),
    		];
    		//判断是否修改了密码
    		if(input('password')){
				$data['password']=md5(input('password'));
			}else{
				$data['password']=$admins['password'];
			}
			//场景验证校验
			$validate = \think\Loader::validate('Admin');
    		if(!$validate->scene('edit')->check($data)){
			   $this->error($validate->getError()); die;
			}
			//修改保存
            $save=db('admin')->update($data);
    		if($save !== false){
                //修改成功，跳到list
    			$this->success('修改管理员成功！','lst');
    		}else{
    			$this->error('修改管理员失败！');
    		}
    		return false;
    	}
        //传递数据，视图展示
        //视图里可以直接使用{$admins.username}
    	$this->assign('admins',$admins);
    	return $this->fetch();
    }

    /*
     * 删除管理员方法
     * */
    public function del(){
    	$id=input('id');
    	if($id != 2){
    		if(db('admin')->delete(input('id'))){
    			$this->success('删除管理员成功！','lst');
    		}else{
    			$this->error('删除管理员失败！');
    		}
    	}else{
    		$this->error('初始化管理员不能删除！');
    	}
    	
    }

    /*
     * 退出方法
     * */
    public function logout(){
        session(null);
        $this->success('退出成功！','Login/index');
    }
}
