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

class SchoolModel extends Model
{

    /**
     * 添加校区
     * @param $data
     * @return
     */
    public function insertSchool($data)
    {
        $school = [
            'name' => $data['name'],
            'location' => $data['location'],
            'city' => $data['city'],
        ];
        $school_existed = Db::name('icr_school')->where($school);
        if(!empty($school_existed)){
            echo "已添加过！";
            return;
        }
        Db::name('icr_school')->insert($school);
    }

    /**
     * 添加图片
     * @param $data,需要有sid和图片的url
     * @return
     */
    public function insertPicture($data)
    {
        $picture = [
            'sid' => $data['sid'],
            'url' => $data['url'],
        ];
        Db::name('icr_picture')->insert($picture);
    }

    /**
     * 添加活动
     * @param $data,需要有sid
     * @return
     */
    public function insertActivity($data)
    {
        $activity = [
            'sid' => $data['sid'],
            'name' => $data['name'],
            'desc' => $data['desc'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ];
        Db::name('icr_activity')->insert($activity);
    }

    /**
     * 修改校区
     * @param $data
     * @return
     */
    public function updateSchool($data)
    {
        $sid =$data['id'];
        Db::name('icr_school')
            ->where('id',$sid)
            ->update([
                    'name' => $data['name'],
                    'location' => $data['location'],
                    'city' => $data['city'],]
            );
    }

    /**
     * 修改活动
     * @param $data
     * @return
     */
    public function updateActivity($data)
    {
        $aid =$data['id'];
        Db::name('icr_school')
            ->where('id',$aid)
            ->update([
                    'sid' => $data['sid'],
                    'name' => $data['name'],
                    'desc' => $data['desc'],
                    'start_time' => $data['start_time'],
                    'end_time' => $data['end_time'],
                ]);
    }

    /**
     * 删除校区
     * @param $id
     * @return
     */
    public function deleteSchool($id)
    {
        Db::name('icr_school')->where('id',$id)->delete();
    }

    /**
     * 删除图片
     * @param $id
     * @return
     */
    public function deletePicture($id)
    {
        Db::name('icr_picture')->where('id',$id)->delete();
    }

    /**
     * 删除活动
     * @param $id
     * @return
     */
    public function deleteActivity($id)
    {
        Db::name('icr_activity')->where('id',$id)->delete();
    }

    /**
     * 通过id查询校区
     * @param $data
     * @return
     */
    public function getSchoolByID($id)
    {
        return Db::name('icr_school')->where('id',$id)->find();
    }

    /**
     * 通过名称查询校区
     * @param $data
     * @return
     */
    public function getSchoolByName($name)
    {
        return Db::name('icr_school')->where('name','like',$name)->select();
    }

    /**
     * 通过位置查询校区
     * @param $data
     * @return
     */
    public function getSchoolByLocation($location)
    {
        return Db::name('icr_school')->where('location','like',$location)->select();
    }

    /**
     * 通过城市查询校区
     * @param $data
     * @return
     */
    public function getSchoolByCity($city)
    {
        return Db::name('icr_school')->where('city',$city)->select();
    }

    /**
     * 通过id查询图片
     * @param $data
     * @return
     */
    public function getPictureByID($id)
    {
        return Db::name('icr_picture')->where('id',$id)->find();
    }

    /**
     * 通过id查询活动
     * @param $data
     * @return
     */
    public function getActivityByID($id)
    {
        return Db::name('icr_activity')->where('id',$id)->find();
    }

    /**
     * 通过名称查询活动
     * @param $data
     * @return
     */
    public function getActivityByName($name)
    {
        Db::name('icr_activity')->where('name','like',$name)->select();
    }

    /**
     * 通过内容查询活动
     * @param $data
     * @return
     */
    public function getActivityByDesc($desc)
    {
        return Db::name('icr_activity')->where('desc','like',$desc)->select();
    }

    /**
     * 通过开始时间查询活动
     * @param $data
     * @return
     */
    public function getActivityByStartTime($start_time)
    {
        Db::name('icr_activity')->where('start_time',$start_time)->select();
    }

    /**
     * 通过截止时间查询活动
     * @param $data
     * @return
     */
    public function getActivityByEndTime($end_time)
    {
        return Db::name('icr_activity')->where('end_time',$end_time)->select();
    }

    /**
     * 查询指定开始时间之后的活动
     * @param $data
     * @return
     */
    public function getActivityAfterStartTime($start_time)
    {
        return Db::name('icr_activity')->where('start_time','egt',$start_time)->select();
    }

    /**
     * 查询指定截止时间之前的活动
     * @param $data
     * @return
     */
    public function getActivityBeforeEndTime($end_time)
    {
        return Db::name('icr_activity')->where('end_time','elt',$end_time)->select();
    }
}