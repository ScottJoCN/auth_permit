<?php
namespace Mobile\Controller;
use Mobile\Controller\BaseController;
class AuthController extends BaseController {
    public function _initialize(){
        $this->auth = M("auth");
    }
    public function index(){
        $username = session('username');
        $this->assign('username',$username);
        $adminM2 = M();
        $adminData2 = $adminM2->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
        $getauth2 = $adminData2['group_auth'];
        $getauth_arr2 = explode(",", $getauth2);
        $this->assign("getauth_arr2",$getauth_arr2);

        $this->assign("adminData2",$adminData2);

        $pdata2 = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
        $this->assign("pdata2",$pdata2);

        $apdata2 = $this->auth->where("auth_level=1")->select();
        $this->assign("apdata2",$apdata2);

        //
        //$cate = $this->auth->select();
        $count = $this->auth->count();
        $Page  = new \Think\Page($count,10);
        
        /*$Page ->setConfig('header',' %TOTAL_ROW% 条记录 | 每页 10 条记录 | ');*/
        $Page -> setConfig('prev','<');
        $Page -> setConfig('next','>');
        $Page -> setConfig('first','第一页');
        $Page -> setConfig('last','...%TOTAL_PAGE%');
        $Page ->setConfig('theme',' <nav>
  <ul class="pagination"> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE%</li> ');
        
        $show  = $Page->show();
        $list = $this->auth->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('adata',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //$adata = $this->getCate($cate);
        //$this->assign("adata",$adata);
        $this->display();
    }
    // 添加权限页面
    public function add(){
        //头部信息获取
            $username = session('username');
            $this->assign('username',$username);
            $adminM2 = M();
            $adminData2 = $adminM2->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
            $getauth2 = $adminData2['group_auth'];
            $getauth_arr2 = explode(",", $getauth2);
            $this->assign("getauth_arr2",$getauth_arr2);

            $this->assign("adminData2",$adminData2);

            $pdata2 = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata2",$pdata2);

            $apdata2 = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata2",$apdata2);
            //
        $auth_f_name = $this->auth->where("auth_pid=0")->select();
        $this->assign("auth_f_name",$auth_f_name);
        $this->display();
    }
    // 添加权限
    public function insert(){
        $data = $this->auth ->create();
        //var_dump($data);
        $level = $data['auth_pid'];
        if($level ==0){
            $data['auth_level']=0;
        }else{
            $data['auth_level']=1;
        }
        $insertId = $this->auth->add($data);
        if($insertId){
            $this->success("添加成功",U("Auth/index"));
        }else{
            $this->error("添加失败");
        }
    }
    /*编辑权限*/
    public function edit(){
        if(IS_POST){
            $id = I("post.id");
            $data = $this->auth->create();
            /*明天完成编辑功能*/
            $updataId = $this->auth->where("auth_id=$id")->save($data);
            if($updataId){
                $this->success("更新成功",U("Auth/index"));
            }else{
                $this->error("更新失败");
            }
        }else{
            $username = session('username');
            $this->assign('username',$username);
            $adminM2 = M();
            $adminData2 = $adminM2->table("df_admin a,df_group g")->where("a.group_id=g.group_id && a.uname='".$username."'")->field("a.id,a.uname,a.group_id,g.group_name,g.group_auth")->find();
            $getauth2 = $adminData2['group_auth'];
            $getauth_arr2 = explode(",", $getauth2);
            $this->assign("getauth_arr2",$getauth_arr2);

            $this->assign("adminData2",$adminData2);

            $pdata2 = $this->auth->field("auth_id,auth_name")->where("auth_pid=0")->select();
            $this->assign("pdata2",$pdata2);

            $apdata2 = $this->auth->where("auth_level=1")->select();
            $this->assign("apdata2",$apdata2);
            //
            $id = I("get.id");
            $auth_f_name = $this->auth->where("auth_pid=0")->select();
            $this->assign("auth_f_name",$auth_f_name);
            $authData = $this->auth->where("auth_id=$id")->find();
            $this->assign("authData",$authData);
            $this->display();
        }
    }
    /*删除权限*/
    public function del(){
        $id = I('get.id');
        $del = $this->auth->where("auth_id=$id")->delete();
        if($del){
            $this->success("删除成功",U("Auth/index"));
        }else{
            $this->error("删除失败");
        }
        
    }

    public function getCate($cates,$fid = 0){
         static $classes = array();   // 让数据在递归中保持上次得到的结果
         foreach($cates as $vo){
                if($fid== $vo['auth_pid']){
                    $classes[]=$vo;
                    $this->getCate($cates,$vo['auth_id']);
                }
        }
        return $classes;
    }
    
}