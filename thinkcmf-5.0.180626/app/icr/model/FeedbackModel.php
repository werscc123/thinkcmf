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
        Db::name('icr_feedback')
            ->where('id',$fid)
            ->update([
                    'content' => $data['content'],
                    'uid' => $data['uid'],
                    'cid' => $data['cid'],
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
        Db::name('icr_feedback')->where('id',$id)->delete();
    }
}