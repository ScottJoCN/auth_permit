<?php
namespace Mobile\Controller;
use Mobile\Controller\BaseController;
class GroupController extends BaseController {
    public function _initialize(){
        $this->group = M("group");
        $this->auth = M("auth");
    }
    public function index(){
        $gdata = $this->group->select();
        $this->assign("gdata",$gdata);
        $this->display();
    }
    public function insert(){
        $data = $this->group->create();
        $insertId = $this->group->add($data);
        if($insertId){
            $this->success("添加成功",U("group/power"));
        }else{
            $this->error("添加失败");
        }
    }
    /*权限分配页面*/
    public function power(){
        $gdata = $this->group->order("group_id desc")->select();
        $this->assign("gdata",$gdata);
        $pdata = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
        $this->assign("pdata",$pdata);
        
        $apdata = $this->auth->where("auth_level=1")->select();
        $this->assign("apdata",$apdata);
        // var_dump($pdata);
        $this->display();
    }
    /*权限分配、添加*/
    public function powerin(){
        $data['group_auth'] = implode(",",I("post.auth_id"));
        $groupid = I("post.groupid");
        $updataid = $this->group->where("group_id=$groupid")->save($data);
        if($updataid){
            $this->success("添加成功",U("Group/index"));
        }else{
            $this->error("添加失败");
        }
    }
    //组更改权限
    public function authchm(){
        if(IS_POST){
            $groupid = I("post.groupid");
            $data['group_auth'] = implode(",",I("post.auth_id"));
            
            // 编辑组权限
            $updataid = $this->group->where("group_id=$groupid")->save($data);
            if($updataid){
                $this->success("更改成功",U("Group/index"));
            }else{
                $this->error("更改失败");
            }
        }else{
            // 编辑组权限页面
            $gdata = $this->group->order("group_id desc")->select();
            $this->assign("gdata",$gdata);
            $pdata = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata",$pdata);
            
            $apdata = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata",$apdata);

            $id = I("get.id");
            $getgroup = $this->group->where("group_id=$id")->find();
            $this->assign("getgroup",$getgroup);

            $getauth = $getgroup['group_auth'];
            $getauth_arr = explode(",", $getauth);
            $this->assign("getauth_arr",$getauth_arr);
            
            $this->display();
        }
        
    }
    // 删除组
    public function delete(){
        $id = I('get.id');
        if($id == 1){
            $this->msg("不允许删除!",U("Group/index"));
        }else{
            $del = $this->group->delete($id);
            if($del){
                $this->success("删除成功",U("Group/index"));
            }else{
                $this->error("删除失败");
            }
        }
        
    }
    //修改组
    public function edit(){
        if(IS_POST){
            $id = I("post.id");
            $data = $this->group->create();
            $updataid=$this->group->where("group_id=$id")->save($data);
            if($updataid){
                $this->success("更新成功",U("Group/index"));
            }else{
                 $this->error("更新失败");
            }
        }else{
            $id = I("get.id");
            $group = $this->group->where("group_id=$id")->find();
            $this->assign("group",$group);
            $this->display();
        }
    }

}