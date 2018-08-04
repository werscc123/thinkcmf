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

class FeedbackModel extends Model
{

    /**
     * 添加反馈
     * @param $data
     * @return
     */
    public function insertFeedback($data)
    {
        $feedback = [
            'content' => $data['content'],
            'uid' => $data['uid'],
            'cid' => $data['cid'],
            'type' => $data['type'],
            'icon' => $data['icon'],
            'title' => $data['title'],
        ];
        $feecback_existed = Db::name('icr_feedback')->where($feedback);
        if(!empty($feecback_existed)){
            echo "已添加过！";
            return;
        }
        Db::name('icr_feedback')->insert($feedback);
    }

    /**
     * 修改反馈
     * @param $data
     * @return
     */
    public function updateFeedback($data)
    {
        $fid =$data['id'];
        $result = Db::name('icr_feedback')
            ->where('id',$fid)
            ->find();
        if(empty($result))
        {
            echo "不存在";
            return;
        }
        Db::name('icr_feedback')
            ->where('id',$fid)
            ->update([
                    'content' => $data['content'],
                    'uid' => $data['uid'],
                    'cid' => $data['cid'],
                    'icon' => $data['icon'],
                    'title' => $data['title'],
                    'type' => $data['type'],]
                    );
    }

    /**
     * 删除反馈
     * @param $data
     * @return
     */
    public function deleteFeedback($id)
    {
        $result = Db::name('icr_feedback')
            ->where('id',$fid)
            ->find();
        if(empty($result))
        {
            echo "不存在";
            return;
        }
        Db::name('icr_feedback')->where('id',$id)->delete();
    }

    /**
     * 通过id查询反馈
     * @param $data
     * @return
     */
    public function getFeedbackByID($id)
    {
        return  Db::name('icr_feedback')->where('id',$id)->find();
    }

    /**
     * 通过课程id查询反馈
     * @param $data
     * @return
     */
    public function getFeedbackByCID($cid)
    {
        return Db::name('icr_feedback')->where('cid',$cid)->select();
    }

    /**
     * 通过用户id查询反馈
     * @param $data
     * @return
     */
    public function getFeedbackByUID($uid)
    {
        return Db::name('icr_feedback')->where('uid',$uid)->select();
    }

    /**
     * 通过类别查询反馈
     * @param $type
     * @return
     */
    public function getFeedbackByType($type)
    {
        return Db::name('icr_feedback')->where('type',$type)->select();
    }
}