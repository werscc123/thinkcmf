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

class RecruitModel extends Model
{

    /**
     * 添加招聘
     * @param $data
     * @return
     */
    public function insertRecruit($data)
    {
        $recruit = [
            'position' => $data['position'],
            'desc' => $data['desc'],
            'require' => $data['require'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ];
        $recruit_existed = Db::name('icr_recruit')->where($recruit);
        if(!empty($feecback_existed)){
            echo "已添加过！";
            return;
        }
        Db::name('icr_recruit')->insert($recruit);
    }

    /**
     * 修改招聘
     * @param $data
     * @return
     */
    public function updateRecruit($data)
    {
        $fid =$data['id'];
        Db::name('icr_recruit')
            ->where('id',$fid)
            ->update([
                    'position' => $data['position'],
                    'desc' => $data['desc'],
                    'require' => $data['require'],
                    'start_time' => $data['start_time'],
                    'end_time' => $data['end_time'],]
                    );
    }

    /**
     * 删除招聘
     * @param $data
     * @return
     */
    public function deleteRecruit($id)
    {
        Db::name('icr_recruit')->where('id',$id)->delete();
    }
}