<?php
/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/8/2
 * Time: 19:07
 */

namespace app\icr\model;

use think\Db;
use think\Model;

class CourseModel extends Model
{

    /**
     * 添加课程
     * @param $data
     * @return
     */
    public function insertCourse($data)
    {
        $course = [
            'name' => $data['name'],
            'describe' => $data['describe'],
            'level' => $data['level'],
            'goal' => $data['goal'],
        ];
        $course_existed = Db::name('icr_course')->where($course);
        if(!empty($course_existed)){
            echo "已添加过！";
            return;
        }
        $cid = Db::name('icr_course')->insertGetId($course);
        //绑定课程类别
        $course_type_id = $data['course_type_id'];
        if(is_array($course_type_id)) {
            foreach ($course_type_id as $value) {
                $tid = $value;
                $ct_intersect = [
                    'cid' => $cid,
                    'tid' => $tid,
                ];
                Db::name('icr_ctype_intersect')->insert($ct_intersect);
            }
        } else {
            $tid = $course_type_id['id'];
            $ct_intersect = [
                'cid' => $cid,
                'tid' => $tid,
            ];
            Db::name('icr_ctype_intersect')->insert($ct_intersect);
        }
        //绑定老师
        $teacher_id = $data['teacher_id'];
        if(is_array($teacher_id)) {
            foreach ($teacher_id as $value) {
                $tid = $value;
                $ct_intersect = [
                    'cid' => $cid,
                    'tid' => $tid,
                ];
                Db::name('icr_cteacher_intersect')->insert($ct_intersect);
            }
        } else {
            $tid = $teacher_id;
            $ct_intersect = [
                'cid' => $cid,
                'tid' => $tid,
            ];
            Db::name('icr_cteacher_intersect')->insert($ct_intersect);
        }
    }

    /**
     * 添加课程类别
     * @param $data
     * @return
     */
    public function insertCourseType($data)
    {
        $course_type = [
            'type' => $data['type'],
            'content' => $data['content'],
        ];
        $result = Db::name('icr_ctype')->where($course_type)->find();
        if(empty($result)) {
            Db::name('icr_ctype')->insert($course_type);
        }
    }

    /**
     * 添加预定课程
     * @param $data
     * @return
     */
    public function bookCourse($data)
    {
        $book = [
            'cid' => $data['type'],
            'phone' => $data['phone'],
            'has_notified' => $data['has_notified'],
            'time' => $data['time'],
        ];
        $result = Db::name('icr_book')->where($book)->find();
        if(empty($result)) {
            Db::name('icr_book')->insert($book);
        }
    }



    /**
     * 获取课程id
     * @param $name 课程名称
     * @return
     */
    public function getCourseID($name)
    {
        $result = Db::name('icr_course')->where('name',$name)->find();
        if (!$result)
            return $result['id'];
        else
            dump($this->error);
            return -1;
    }

    /**
     * 修改课程
     * @param $data
     * @return
     */
    public function updateCourse($data)
    {
        $cid =$data['id'];
        if(empty(Db::name('icr_course')
            ->where('id',$cid)
            ->find()))
        {
            echo "课程不存在";
            return;
        }
        Db::name('icr_course')
            ->where('id',$cid)
            ->update(['name' => $data['name'],
                    'describe' => $data['describe'],
                    'level' => $data['level'],
                    'goal' => $data['goal']]
                    );
        if(!empty(Db::name('icr_ctype_intersect')->where('id',$cid)->select()))
            Db::name('icr_ctype_intersect')->where('id',$cid)->delete();
        //绑定课程类别
        $course_type = $data['type'];
        if(is_array($course_type)) {
            foreach ($course_type as $value) {
                $tid = $course_type['id'];
                $ct_intersect = [
                    'cid' => $cid,
                    'tid' => $tid,
                ];
                Db::name('icr_ctype_intersect')->insert($ct_intersect);
            }
        } else {
            $tid = $course_type['id'];
            $ct_intersect = [
                'cid' => $cid,
                'tid' => $tid,
            ];
            Db::name('icr_ctype_intersect')->insert($ct_intersect);
        }
        //绑定老师
        $teacher_id = $data['teacher_id'];
        if(is_array($teacher_id)) {
            foreach ($teacher_id as $value) {
                $tid = $value;
                $ct_intersect = [
                    'cid' => $cid,
                    'tid' => $tid,
                ];
                Db::name('icr_cteacher_intersect')->insert($ct_intersect);
            }
        } else {
            $tid = $teacher_id;
            $ct_intersect = [
                'cid' => $cid,
                'tid' => $tid,
            ];
            Db::name('icr_cteacher_intersect')->insert($ct_intersect);
        }
    }

    /**
     * 取消预定课程
     * @param $id
     * @return
     */
    public function deleteBook($id)
    {
        Db::name('icr_book')->where('id',$id)->delete();
    }

    /**
     * 删除课程
     * @param $id
     * @return
     */
    public function deleteCourse($id)
    {
        if(empty(Db::name('icr_course')
            ->where('id',$id)
            ->find()))
        {
            echo "课程不存在";
            return;
        }
        Db::name('icr_course')->where('id',$id)->delete();
        Db::name('icr_ctype_intersect')->where('cid',$id)->delete();
        Db::name('icr_cteacher_intersect')->where('cid',$id)->delete();
    }

    /**
     * 添加课程类别
     * @param $data
     * @return
     */
    public function deleteCourseType($id)
    {
        Db::name('icr_ctype')->where('id',$id)->delete();
    }

    /**
     * 预定已提醒
     * @param $id
     * @return
     */
    public function notifyBook($id)
    {
        Db::name('icr_book')
            ->where('id',$id)
            ->update('has_notified', true);
    }

    /**
     * 通过课程id查询课程
     * @param $phone
     * @return
     */
    public function getCourseByID($cid)
    {
        return Db::name('icr_course')->where('id',$cid)->find();
    }

    /**
     * 通过课程名查询课程
     * @param $phone
     * @return
     */
    public function getCourseByName($name)
    {
        return Db::name('icr_course')->where('name','like',$name)->find();
    }

    /**
     * 通过课程等级查询课程
     * @param $phone
     * @return
     */
    public function getCourseByLevel($level)
    {
        return Db::name('icr_course')->where('level',$level)->select();
    }

    /**
     * 通过课程类别查询课程
     * @param $phone
     * @return
     */
    public function getCourseByType($type)
    {
        return Db::name('icr_course')->where('type',$type)->select();
    }

    /**
     * 通过教师id查询课程
     * @param $cid
     * @return
     */
    public function getCourseByTeacher($tid)
    {
        $cid = Db::name('icr_cteacher_intersect')->where('tid',$tid)->select();
        if(is_array($cid)) {
            $course_list = [];
            foreach ($cid as $value) {
                array_push($course_list, Db::name('icr_course')->where('id',$value)->find());
            }
            return $course_list;
        } else {
            return Db::name('icr_course')->where('id',$cid)->find();
        }
    }

    /**
     * 通过手机号查询订单
     * @param $phone
     * @return
     */
    public function getBooks($phone)
    {
        return Db::name('icr_book')->where('phone',$phone)->select();
    }
}