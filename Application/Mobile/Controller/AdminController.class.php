<?php
namespace Mobile\Controller;
use Mobile\Controller\BaseController;
class AdminController extends BaseController {
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
            $adminData2 = $adminM->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
            $this->assign("adminData2",$adminData2);
            
            $getauth2 = $adminData2['group_auth'];
            $getauth_arr2 = explode(",", $getauth2);
            $this->assign("getauth_arr2",$getauth_arr2);

           

            $pdata2 = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata2",$pdata2);

            $apdata2 = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata2",$apdata2);
			//
			$adminData = $this->admin->join("left join df_group on df_admin.group_id= df_group.group_id")->select();
        
			$this->assign("adminData",$adminData);
			$this->display();
        }else{
			$this->msg("请先登录！",U('Login/index'));
		}
		
		
        
        
    }
    public function add(){
        $groupdata = $this->group->order("group_id desc")->select();
        $this->assign("group",$groupdata);
        $this->display();
    }
    public function insert(){
        $data = $this->admin->create();
        $data['password'] = md5(I("post.password"));
        $insertId = $this->admin->add($data);
        if($insertId){
            $this->success("添加成功",U("Admin/index"));
        }else{
            $this->error("添加失败");
        }
    }
    public function edit(){
        if(IS_POST){
            $id = I("post.id");
            $data = $this->admin->create();
            $data['password'] = md5(I("post.password"));
            $updataid = $this->admin->where("id=$id")->save($data);
            if($updataid){
                $this->success("修改成功",U("Admin/index"));
            }else{
                $this->error("修改失败");
            }
        }else{
            $id = I("get.id");
            $adata = $this->admin->where("id=$id")->find();
            $this->assign("adata",$adata);

            $groupdata = $this->group->order("group_id desc")->select();
            $this->assign("group",$groupdata);
            $this->display();
        }
    }
    public function delete(){
        $id = I("get.id");
        if($id == 1){
            $this->msg("不允许删除!",U("Admin/index"));
        }else{
            $del = $this->admin->delete($id);
            if($del){
                $this->success("删除成功",U("Admin/index"));
            }else{
                $this->error("删除失败");
            }
        }
    }

}