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

class TeacherModel extends Model
{

    /**
     * 添加教师
     * @param $data
     * @return
     */
    public function insertTeacher($data)
    {
        $teacher = [
            'name' => $data['name'],
            'position' => $data['position'],
            'resume' => $data['resume'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'age' => $data['age'],
        ];
        $teacher_existed = Db::name('icr_teacher')->where($teacher);
        if(!empty($teacher_existed)){
            echo "已添加过！";
            return;
        }
        Db::name('icr_teacher')->insert($teacher);
    }

    /**
     * 修改教师
     * @param $data
     * @return
     */
    public function updateTeacher($data)
    {
        $fid =$data['id'];
        Db::name('icr_teacher')
            ->where('id',$fid)
            ->update([
                    'name' => $data['name'],
                    'position' => $data['position'],
                    'resume' => $data['resume'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'age' => $data['age'],]
            );
    }

    /**
     * 删除教师
     * @param $data
     * @return
     */
    public function deleteTeacher($id)
    {
        Db::name('icr_teacher')->where('id',$id)->delete();
    }

    /**
     * 通过id查询教师
     * @param $data
     * @return
     */
    public function getTeacherByID($id)
    {
        return Db::name('icr_teacher')->where('id',$id)->find();
    }

    /**
     * 通过姓名查询教师
     * @param $data
     * @return
     */
    public function getTeacherByName($name)
    {
        return Db::name('icr_teacher')->where('name',$name)->select();
    }

    /**
     * 通过职位查询教师
     * @param $data
     * @return
     */
    public function getTeacherByPosition($position)
    {
        return Db::name('icr_teacher')->where('position',$position)->select();
    }

    /**
     * 通过简历查询教师
     * @param $data
     * @return
     */
    public function getTeacherByResume($resume)
    {
        return Db::name('icr_teacher')->where('resume','like',$resume)->select();
    }

    /**
     * 通过电话查询教师
     * @param $data
     * @return
     */
    public function getTeacherByPhone($phone)
    {
        return Db::name('icr_teacher')->where('phone',$phone)->select();
    }

    /**
     * 通过性别查询教师
     * @param $data
     * @return
     */
    public function getTeacherByGender($gender)
    {
        return Db::name('icr_teacher')->where('gender',$gender)->select();
    }

    /**
     * 通过年龄查询教师
     * @param $data
     * @return
     */
    public function getTeacherByAge($age)
    {
        return Db::name('icr_teacher')->where('age',$age)->select();
    }

    /**
     * 查询不大于指定年龄教师
     * @param $data
     * @return
     */
    public function getTeacherELTAge($age)
    {
        return Db::name('icr_teacher')->where('age','elt',$age)->select();
    }

    /**
     * 查询不小于指定年龄教师
     * @param $data
     * @return
     */
    public function getTeacherEGTAge($age)
    {
        return Db::name('icr_teacher')->where('age','egt',$age)->select();
    }

    /**
     * 通过课程id查询教师
     * @param $cid
     * @return
     */
    public function getTeacherByCourse($cid)
    {
        $tid = Db::name('icr_cteacher_intersect')->where('cid',$cid)->select();
        if(is_array($tid)) {
            $teacher_list = [];
            foreach ($tid as $value) {
                array_push($teacher_list, Db::name('icr_teacher')->where('id',$value)->find());
            }
            return $teacher_list;
        } else {
            return Db::name('icr_teacher')->where('id',$tid)->find();
        }
    }
}