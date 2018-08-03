<?php

/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/7/30
 * Time: 22:40
 */
namespace app\icr\controller;

use app\icr\model\RecruitModel;
use cmf\controller\HomeBaseController;

class RecruitController extends HomebaseController{

    // 首页
    public function index(){
        $head_controller = new HeadController();
        $head_controller->setHeaderActive("recruit");
        return $this->fetch(':recruit');
    }

    /**
     * 添加招聘
     * @param $data
     * @return
     */
    public function insertRecruit()
    {
        $data = [
            'position' => $_GET['position'],
            'desc' => $_GET['desc'],
            'require' => $_GET['require'],
            'start_time' => $_GET['start_time'],
            'end_time' => $_GET['end_time'],
        ];

        $recruit_model = new RecruitModel();
        $recruit_model->insertRecruit($data);
    }

    /**
     * 修改招聘
     * @param $data
     * @return
     */
    public function updateRecruit()
    {
        $data = [
            'id' => $_GET['id'],
            'position' => $_GET['position'],
            'desc' => $_GET['desc'],
            'require' => $_GET['require'],
            'start_time' => $_GET['start_time'],
            'end_time' => $_GET['end_time'],
        ];

        $recruit_model = new RecruitModel();
        $recruit_model->updateRecruit($data);
    }

    /**
     * 删除招聘
     * @param $data
     * @return
     */
    public function deleteRecruit()
    {
        $recruit_model = new RecruitModel();
        $recruit_model->deleterecruit($_GET['id']);
    }
}