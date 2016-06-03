<?php
namespace Mobile\Controller;
use Mobile\Controller\BaseController;
class IndexController extends BaseController {
    public function _initialize(){
        $this->admin = M("admin");
        $this->group = M("group");
        $this->auth = M("auth");
    }
    public function index(){
    	if(!empty($_SESSION["id"])){
            $username = session('username');
            $this->assign('username',$username);
            $adminM = M();
            $adminData = $adminM->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
            $getauth = $adminData['group_auth'];
            $getauth_arr = explode(",", $getauth);
            $this->assign("getauth_arr",$getauth_arr);

            $this->assign("adminData",$adminData);

            $pdata = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata",$pdata);

            $apdata = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata",$apdata);
        }
        $this->display();
    }
    public function header(){
    	if(!empty($_SESSION["id"])){
            $username = session('username');
            $this->assign('username',$username);
            $adminM = M();
            $adminData = $adminM->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
            $getauth = $adminData['group_auth'];
            $getauth_arr = explode(",", $getauth);
            $this->assign("getauth_arr",$getauth_arr);

            $this->assign("adminData",$adminData);

            $pdata = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata",$pdata);

            $apdata = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata",$apdata);
            $this->display();
        }else{
        	$this->msg("请先登录！",U('Login/index'));
        }
        
    }
    
}