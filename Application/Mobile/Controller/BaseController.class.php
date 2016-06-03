<?php
/*
	公共控制器
*/

namespace Mobile\Controller;
use Think\Controller;
class BaseController extends Controller{
	protected $Table; //要操作的数据对象

	public function _initialize(){
		$this->admin = M("admin");
        $this->group = M("group");
        $this->auth = M("auth");
	}

	public  function index(){
		if(!empty($_SESSION["id"])){
			//获得session里面的username
            $username = session('username');
            $this->assign('username',$username);
            //获得用户及所在组的信息
            $adminM = M();
            $adminData = $adminM->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
            $this->assign("adminData",$adminData);

            //将组权限字符串转为数组
            $getauth = $adminData['group_auth'];
            $getauth_arr = explode(",", $getauth);
            $this->assign("getauth_arr",$getauth_arr);

            //获得顶级菜单
            $pdata = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata",$pdata);
            //获得第二级菜单
            $apdata = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata",$apdata);
        }
        $this->display();
	}
	//添加操作
    public function add(){
		$this->display();
	}

	//编辑操作
	public function edit(){
		
		$this->display();	
		
	}
	//删除操作
	public function delete(){
		
	}
	public function msg($messager,$url){
		echo "<script>
            alert('$messager ');
            location.href = '$url ';
        </script>";
	}
}
?>