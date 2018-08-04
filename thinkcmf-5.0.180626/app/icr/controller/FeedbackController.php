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

    /**
     * 通过id查询反馈
     * @param $data
     * @return
     */
    public function getFeedbackByID()
    {
        $feedback_model = new FeedbackModel();
        return $feedback_model->getFeedbackByID($_GET['id']);
    }

    /**
     * 通过课程id查询反馈
     * @param $data
     * @return
     */
    public function getFeedbackByCID()
    {
        $feedback_model = new FeedbackModel();
        return $feedback_model->getFeedbackByCID($_GET['cid']);
    }

    /**
     * 通过用户id查询反馈
     * @param $data
     * @return
     */
    public function getFeedbackByUID()
    {
        $feedback_model = new FeedbackModel();
        return $feedback_model->getFeedbackByUID($_GET['uid']);
    }

    /**
     * 通过类别查询反馈
     * @param $type
     * @return
     */
    public function getFeedbackByType()
    {
        $feedback_model = new FeedbackModel();
        return $feedback_model->getFeedbackByType($_GET['type']);
    }
}