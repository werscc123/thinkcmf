<?php

/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/7/30
 * Time: 22:40
 */
namespace app\icr\controller;

use app\icr\model\CourseModel;
use cmf\controller\HomeBaseController;
use think\Validate;

class CourseController extends HomebaseController{

    // 首页
    public function index(){
        $head_controller = new HeadController();
        $head_controller->setHeaderActive("course");
        return $this->fetch(':course');
    }

    /**
     * 添加课程
     * @param $data
     * @return
     */
    public function insertCourse() {
        $name = $_GET['name'];
        $describe = $_GET['describe'];
        $level = $_GET['level'];
        $type = $_GET['type'];
        $goal = $_GET['goal'];
        $teacher_id = $_GET['teacher_id'];

        $data = [
            'name' => $name,
            'describe' => $describe,
            'level' => $level,
            'type' => $type,
            'goal' => $goal,
            'teacher_id' => $teacher_id,
        ];

        //验证
        $rule = [
            'name'  => 'require',
            'type' => 'require',
            'level'   => 'require|number|between:1,6',
        ];

        $msg = [
            'name.require' => '课程名必须',
            'type.require' => '课程类别必须',
            'level.require'   => '课程等级必须',
            'level.between'  => '课程等级只能在1-6之间',
            'level.number'        => '课程等级只能是数字',
        ];
        $validate = new Validate($rule, $msg);
        if(!$validate->check($data)){
            dump($validate->getError());
            return;
        }

        $course_model = new CourseModel();
        $course_model->insertCourse($data);
    }

    /**
     * 修改课程
     * @param $data
     * @return
     */
    public function updateCourse() {
        $course_model = new CourseModel();

        $name = $_GET['name'];
        if ($_SESSION['id'])
            $id = $_GET['id'];
        else
            $id = $course_model->getCourseID($name);
        $describe = $_GET['describe'];
        $level = $_GET['level'];
        $type = $_GET['type'];
        $goal = $_GET['goal'];
        $teacher_id = $_GET['teacher_id'];

        $data = [
            'id' => $id,
            'name' => $name,
            'describe' => $describe,
            'level' => $level,
            'type' => $type,
            'goal' => $goal,
            'teacher_id' => teacher_id,
        ];

        //验证
        $rule = [
            'name'  => 'require',
            'type' => 'require',
            'level'   => 'require|number|between:1,6',
        ];

        $msg = [
            'name.require' => '课程名必须',
            'type.require' => '课程类别必须',
            'level.require'   => '课程等级必须',
            'level.between'  => '课程等级只能在1-6之间',
            'level.number'        => '课程等级只能是数字',
        ];
        $validate = new Validate($rule, $msg);
        if(!$validate->check($data)){
            dump($validate->getError());
            return;
        }

        $course_model->updateCourse($data);
    }

    /**
     * 添加课程类别
     * @param $data
     * @return
     */
    public function insertCourseType(){

        $data = [
            'type' => $_GET['type'],
            'content' => $_GET['content'],
        ];

        //验证
        $rule = [
            'type' => 'require',
        ];

        $msg = [
            'type.require' => '课程类别必须',
        ];

        $validate = new Validate($rule, $msg);
        if(!$validate->check($data)){
            dump($validate->getError());
            return;
        }

        $course_model = new CourseModel();
        $course_model->insertCourseType($data);
    }

    /**
     * 预定课程
     * @param $data
     * @return
     */
    public function bookCourse(){

        $data = [
            'cid' => $_GET['type'],
            'phone' => $_GET['phone'],
            'has_notified' => $_GET['has_notified'],
            'time' => $_GET['time'],
        ];

        //验证
        $rule = [
            'cid' => 'require|number',
            'phone' => 'require|number',
            'has_notified' => 'require',
            'time' => 'require',
        ];

        $msg = [
            'cid.require' => '课程id必须',
            'phone.require' => '电话号码必须',
            'has_notified.require' => '是否通知必须',
            'time.require' => '预定时间必须',
        ];

        $validate = new Validate($rule, $msg);
        if(!$validate->check($data)){
            dump($validate->getError());
            return;
        }

        $course_model = new CourseModel();
        $course_model->bookCourse($data);
    }

    /**
     * 预定已提醒
     * @param
     * @return
     */
    public function notifyBook()
    {
        $id = $_GET['id'];
        $course_model = new CourseModel();
        return $course_model->notifyBook($id);
    }

    /**
     * 删除课程
     * @param
     * @return
     */
    public function deleteCourse()
    {
        $id = $_GET['id'];
        $course_model = new CourseModel();
        return $course_model->deleteCourse($id);
    }

    /**
     * 删除课程类别
     * @param
     * @return
     */
    public function deleteCourseType()
    {
        $id = $_GET['id'];
        $course_model = new CourseModel();
        return $course_model->deleteCourseType($id);
    }

    /**
     * 取消预定
     * @param
     * @return
     */
    public function deleteBook()
    {
        $id = $_GET['id'];
        $course_model = new CourseModel();
        return $course_model->deleteBook($id);
    }

    /**
     * 通过手机号查询订单
     * @param $data
     * @return
     */
    public function getBooks()
    {
        $phone = $_GET['phone'];
        $course_model = new CourseModel();
        return $course_model->getBooks($phone);
    }
}