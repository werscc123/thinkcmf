<?php

/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/7/30
 * Time: 22:40
 */
namespace app\icr\controller;

use app\icr\model\FeedbackModel;
use cmf\controller\HomeBaseController;

class FeedbackController extends HomebaseController{

    /**
     * 添加反馈
     * @param $data
     * @return
     */
    public function insertFeedback()
    {
        $content = $_GET['content'];
        $uid = $_GET['uid'];
        $cid = $_GET['cid'];
        $type = $_GET['type'];

        $data = [
            'content' => $content,
            'uid' => $uid,
            'cid' => $cid,
            'type' => $type,
        ];

        $feedback_model = new FeedbackModel();
        $feedback_model->insertFeedback($data);
    }

    /**
     * 修改反馈
     * @param $data
     * @return
     */
    public function updateFeedback()
    {
        $id = $_GET['id'];
        $content = $_GET['content'];
        $uid = $_GET['uid'];
        $cid = $_GET['cid'];
        $type = $_GET['type'];

        $data = [
            'id' => $id,
            'content' => $content,
            'uid' => $uid,
            'cid' => $cid,
            'type' => $type,
        ];

        $feedback_model = new FeedbackModel();
        $feedback_model->updateFeedback($data);
    }

    /**
     * 删除反馈
     * @param $data
     * @return
     */
    public function deleteFeedback()
    {
        $feedback_model = new FeedbackModel();
        $feedback_model->deleteFeedback($_GET['id']);
    }
}