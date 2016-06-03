<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class AuthController extends BaseController {
    public function _initialize(){
        $this->auth = M("auth");
    }
    public function index(){
        //$cate = $this->auth->select();
        $count = $this->auth->count();
        $Page  = new \Think\Page($count,10);
        
        /*$Page ->setConfig('header',' %TOTAL_ROW% 条记录 | 每页 10 条记录 | ');*/
        $Page -> setConfig('prev','<');
        $Page -> setConfig('next','>');
        $Page -> setConfig('first','第一页');
        $Page -> setConfig('last','...%TOTAL_PAGE%');
        /*$Page ->setConfig('theme',' %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %NOW_PAGE% / %TOTAL_PAGE% ');*/
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