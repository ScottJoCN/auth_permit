<?php
namespace Mobile\Controller;
use Mobile\Controller\BaseController;
class PersonController extends BaseController {
    public function _initialize(){
        $this->admin = M("admin");
        $this->group = M("group");
        $this->auth = M("auth");
    }
    public function index(){
        if(empty($_SESSION["id"])){
            $this->msg("请先登录！",U('Login/index'));
        }
        $this->display();
    }
    

}