<?php
/**
 * Created by PhpStorm.
 * User: pfan8
 * Date: 2018/8/14
 * Time: 13:13
 */

namespace app\admin\controller;

use think\Validate;


class SchoolValidate extends Validate
{
    //验证
    protected $rule = [
                'name'  => 'require',
                'location'   => 'require',
                'city'   => 'require',
                'coordinate' => 'require|checkCoordinate:/^[0-9]+[\.]?[0-9]+,[0-9]+[\.]?[0-9]+$/',
                ];

    protected $msg = [
                'name.require' => '校区名必须',
                'location.require' => '校区地址必须',
                'city.require' => '校区城市必须',
                'coordinate.require' => '校区坐标必须',
                ];
    // 自定义验证规则
    protected function checkCoordinate($value,$rule)
    {
        return preg_match($rule, $value) ? true : '坐标不规范';
    }
}