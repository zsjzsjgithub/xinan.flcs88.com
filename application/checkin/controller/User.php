<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/28
 * Time: 13:47
 */

namespace app\checkin\controller;

use logicmodel\checkin\CheckinLogic;
use logicmodel\UserLogic;
use validate\Checkinvalidate;

class User
{
    private $checkinLogic;

    public function __construct()
    {
        $this->checkinLogic = new CheckinLogic();
    }

    /**
     * 图片上传
     * @param $img
     * @return \think\response\Json
     */
    public function upload($img)
    {
        return json((new UserLogic())->upload($img));
    }

    /**
     * 识别用户身份证号，调取百度接口
     * @param $path
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function discernID($path)
    {
     return json($this->checkinLogic->discernID($path));
    }

    /**
     * 用户疫情登记
     * @param $code
     * @param $name
     * @param $address
     * @param $idcard
     * @param $phone
     * @param $animal_heat
     * @param string $company
     * @param string $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function userRegister($code, $name, $address, $idcard, $phone, $animal_heat, $company = '', $remark = '')
    {
        (new Checkinvalidate())->goCheck('add');
        return json($this->checkinLogic->userRegister($code, $name, $address, $idcard, $phone, $animal_heat, $company, $remark));
    }
}