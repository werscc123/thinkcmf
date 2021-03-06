<?php

/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/7/30
 * Time: 22:40
 */
namespace app\icr\controller;

use app\icr\model\SchoolModel;
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
        $schoolModel=new SchoolModel();
        $city_list = $schoolModel->getCityList();
        if(isset($city_list[0])&&isset($city_list[0]['city'])){
            $school_list = $schoolModel->getSchoolByCity($city_list[0]['city'])->toArray();//加载第一个校区列表
            $this->assign('school_list',$school_list);
        }

        return $this->fetch(':home');
    }
    //提交预约
    public function mmmp(){
       $this->result($this->request->param(),0,"success",'json');
    }
    public function getSchoolList(){
        $city = $this->request->param('city');
        $schoolModel=new SchoolModel();
        $school_list = $schoolModel->getSchoolByCity($city)->toArray();
        $this->result($school_list,0,'success','json');
    }

}