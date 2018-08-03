<?php
/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/8/2
 * Time: 19:07
 */

namespace app\icr\model;

use think\Model;

class CourseModel extends Model
{

//    protected $type = [
//        'more' => 'array',
//    ];

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
        DB::name('icr_course')->insert($course);
    }


}