<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class AdminController extends BaseController {
    public function _initialize(){
        $this->admin = M("admin");
        $this->group = M("group");
    }
    public function index(){
        $adminData = $this->admin->join("left join df_group on df_admin.group_id= df_group.group_id")->select();
        
        $this->assign("adminData",$adminData);
        $this->display();
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