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
}