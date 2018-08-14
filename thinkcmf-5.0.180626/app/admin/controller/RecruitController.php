<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: kane <chengjin005@163.com> 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\icr\model\RecruitModel;
use cmf\controller\AdminBaseController;
use think\Collection;
use think\Validate;

/**
 * Class NavController 招聘类别管理控制器
 * @package app\admin\controller
 */
class RecruitController extends AdminBaseController
{
    /**
     * 招聘管理
     * @adminMenu(
     *     'name'   => '招聘管理',
     *     'parent' => 'admin/Setting/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 30,
     *     'icon'   => '',
     *     'remark' => '招聘管理',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $recruitModel = new RecruitModel();

        $recruits = $recruitModel->getRecruitList();
        $this->assign('recruits', $recruits);
        $this->assign('s_position','');
        $this->assign('s_desc','');
        $this->assign('s_require','');

        return $this->fetch();

    }

    /**
     * 添加招聘
     * @adminMenu(
     *     'name'   => '添加招聘',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加招聘',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 添加招聘提交保存
     * @adminMenu(
     *     'name'   => '添加招聘提交保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加招聘提交保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        $data = $this->request->post();

        $validate = $this->getRecruitValidate();
        if(!$validate->check($data)){
            $msg = $validate->getError();
            $this->error(lang($msg), url('recruit/add'));
        }
        $recruit_model = new RecruitModel();
        $recruit_model->insertRecruit($data);
        $this->success(lang('ADD_SUCCESS'), url('recruit/index'));
    }

    /**
     * 编辑招聘
     * @adminMenu(
     *     'name'   => '编辑招聘',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑招聘',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $recruit_model = new RecruitModel();
        $id    = $this->request->param("id", 0, 'intval');

        $recruit = $recruit_model->getRecruitByID($id);
        $arrNavCat = $recruit ? $recruit : [];
        $this->assign($arrNavCat);
        return $this->fetch();
    }


    /**
     * 编辑招聘提交保存
     * @adminMenu(
     *     'name'   => '编辑招聘提交保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑招聘提交保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {

        $recruit_model = new RecruitModel();
        $arrData  = $this->request->post();

        $validate = $this->getRecruitValidate();
        if(!$validate->check($arrData)){
            $msg = $validate->getError();
            $this->error(lang($msg), url('recruit/edit',array('id' => $arrData['id'])));
        }
        $recruit_model->updateRecruit($arrData);
        $this->success(lang("EDIT_SUCCESS"), url("recruit/index"));

    }

    /**
     * 删除招聘
     * @adminMenu(
     *     'name'   => '删除招聘',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除招聘',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $recruit_model = new RecruitModel();
        $id    = $this->request->param("id", 0, "intval");

        if (empty($id)) {
            $this->error(lang("NO_ID"));
        }

        $recruit_model->deleteRecruit($id);

        return $this->success(lang("DELETE_SUCCESS"), url("recruit/index"));

    }

    public function search()
    {
        $recruit_model = new RecruitModel();
        //通过职位
        $s_position = $this->request->param("s_position","");
        $recruit_list = $recruit_model->getRecruitList();
        if ($s_position != "")
        {
            $recruit_list = $recruit_model->getRecruitByPosition($s_position);
            if(empty($recruit_list))
                $recruit_list = new Collection();
        }
        //通过描述
        $s_desc = $this->request->param("s_desc","");
        if($s_desc != "") {
            $temp_list = $recruit_model->getRecruitByDesc($s_desc);
            $recruit_list = $this->removeRedundentRecruit($recruit_list, $temp_list);
        }
        //通过要求
        $s_require = $this->request->param("s_require");
        if ($s_require != "")
        {
            $temp_list = $recruit_model->getRecruitByRequire($s_require);
            if(!empty($temp_list))
                $recruit_list = $this->removeRedundentRecruit($recruit_list, $temp_list);
        }
        $this->assign('recruits', $recruit_list);
        $this->assign('s_position', $s_position);
        $this->assign('s_desc', $s_desc);
        $this->assign('s_require', $s_require);
        return $this->fetch("recruit/index");
    }

    private function removeRedundentRecruit($cl1, $cl2)
    {

        $recruit_list = new Collection();
        foreach ($cl1 as $recruit1)
        {
            foreach ($cl2 as $recruit2)
            {
                if($recruit1['id'] == $recruit2['id'])
                {
                    $recruit_list->push($recruit1);
                }
            }
        }
        return $recruit_list;
    }

    private function getRecruitValidate()
    {
        //验证
        $rule = [
            'position'  => 'require',
            'desc'   => 'require',
            'require'   => 'require',
        ];

        $msg = [
            'position.require' => '职位必须',
            'desc.require' => '描述必须',
            'require.require' => '要求必须',
        ];
        return new Validate($rule, $msg);
    }

}