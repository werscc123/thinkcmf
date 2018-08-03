<?php

/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/7/30
 * Time: 22:40
 */
namespace app\icr\controller;

use app\icr\model\TeacherModel;
use cmf\controller\HomeBaseController;

class TeacherController extends HomebaseController{

    // 首页
    public function index(){
        $head_controller = new HeadController();
        $head_controller->setHeaderActive("teacher");
        return $this->fetch(':teachers');
    }

    /**
     * 添加教师
     * @param $data
     * @return
     */
    public function insertTeacher()
    {
        $data = [
            'name' => $_GET['name'],
            'position' => $_GET['position'],
            'resume' => $_GET['resume'],
            'phone' => $_GET['phone'],
            'gender' => $_GET['gender'],
            'age' => $_GET['age'],
        ];

        $teacher_model = new TeacherModel();
        $teacher_model->insertTeacher($data);
    }

    /**
     * 修改教师
     * @param $data
     * @return
     */
    public function updateTeacher()
    {
        $data = [
            'id' => $_GET['id'],
            'name' => $_GET['name'],
            'position' => $_GET['position'],
            'resume' => $_GET['resume'],
            'phone' => $_GET['phone'],
            'gender' => $_GET['gender'],
            'age' => $_GET['age'],
        ];

        $teacher_model = new TeacherModel();
        $teacher_model->updateTeacher($data);
    }

    /**
     * 删除教师
     * @param $data
     * @return
     */
    public function deleteTeacher()
    {
        $teacher_model = new TeacherModel();
        $teacher_model->deleteTeacher($_GET['id']);
    }

}