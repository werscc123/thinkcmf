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

class SchoolController extends HomebaseController{

    // 首页
    public function index(){
        $head_controller = new HeadController();
        $head_controller->setHeaderActive("school");
        return $this->fetch(':school');
    }

    /**
     * 添加校区
     * @param $data
     * @return
     */
    public function insertSchool()
    {
        $name = $_GET['name'];
        $location = $_GET['location'];
        $city = $_GET['city'];

        $data = [
            'name' => $name,
            'location' => $location,
            'city' => $city,
        ];

        $school_model = new SchoolModel();
        $school_model->insertSchool($data);
    }

    /**
     * 添加图片
     * @param
     * @return
     */
    public function insertPicture()
    {
        $sid = $_GET['sid'];
        $url = $_GET['url'];

        $data = [
            'sid' => $sid,
            'url' => $url,
        ];

        $school_model = new SchoolModel();
        $school_model->insertPicture($data);
    }

    /**
     * 添加活动
     * @param
     * @return
     */
    public function insertActivity()
    {
        $sid = $_GET['sid'];
        $name = $_GET['name'];
        $desc = $_GET['desc'];
        $start_time = $_GET['start_time'];
        $end_time = $_GET['end_time'];

        $data = [
            'sid' => $sid,
            'name' => $name,
            'desc' => $desc,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $school_model = new SchoolModel();
        $school_model->insertActivity($data);
    }

    /**
     * 修改校区
     * @param $data
     * @return
     */
    public function updateSchool()
    {
        $name = $_GET['content'];
        $location = $_GET['location'];
        $city = $_GET['city'];

        $data = [
            'id' => $_GET['id'],
            'name' => $name,
            'location' => $location,
            'city' => $city,
        ];

        $school_model = new SchoolModel();
        $school_model->updateSchool($data);
    }

    /**
     * 修改活动
     * @para $data
     * @return
     */
    public function updateActivity()
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $desc = $_GET['desc'];
        $start_time = $_GET['start_time'];
        $end_time = $_GET['end_time'];

        $data = [
            'id' => $id,
            'name' => $name,
            'desc' => $desc,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $school_model = new SchoolModel();
        $school_model->updateActivity($data);
    }

    /**
     * 删除校区
     * @param $data
     * @return
     */
    public function deleteSchool()
    {
        $school_model = new SchoolModel();
        $school_model->deleteSchool($_GET['id']);
    }

    /**
     * 删除图片
     * @param $data
     * @return
     */
    public function deletePicture()
    {
        $school_model = new SchoolModel();
        $school_model->deletePicture($_GET['id']);
    }

    /**
     * 删除活动
     * @param $data
     * @return
     */
    public function deleteActivity()
    {
        $school_model = new SchoolModel();
        $school_model->deleteActivity($_GET['id']);
    }

}