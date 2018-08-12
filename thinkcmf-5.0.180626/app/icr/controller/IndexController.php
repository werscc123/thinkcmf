<?php

/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/7/30
 * Time: 22:40
 */
namespace app\icr\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomebaseController{

    // 首页
    public function index(){
        $head_controller = new HeadController();
        $head_controller->setHeaderActive('home');
        $data = $this->request->param();
        if (!empty($data["login_user"])) {
            $head_controller->setLoginHtml($data["login_user"]);
        }
        return $this->fetch(':home');
    }
    //提交预约
    public function mmmp(){
       $this->result($this->request->param(),0,"success",'json');
    }

}