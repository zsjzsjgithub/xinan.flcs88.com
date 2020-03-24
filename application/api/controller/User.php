<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/31 0031
 * Time: 15:51
 */

namespace app\api\controller;

use logicmodel\UserLogic;

class User extends BaseController
{
    private $userLogic;

    public function __construct()
    {
        parent::__construct();
        $this->userLogic = new UserLogic();
    }

    /**
     * 百度api识别银行卡信息
     * @param $path
     * @return \think\response\Json
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function recognitionIdcard($path)
    {
        return json($this->userLogic->recognitionIdcard($path));
    }

    /**
     * 修改银行卡信息
     * @param $bank_number
     * @param $bank_card_type
     * @param $bank_name
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateBankCard($bank_number, $bank_card_type=0, $bank_name='')
    {
        return json($this->userLogic->updateBankCard($bank_number, $bank_card_type, $bank_name));
    }

    /**
     * 获取用户信息
     * @return \think\response\Json
     */
    public function userInfo()
    {//

        return json($this->userLogic->userInfo());
    }

    /**
     * 图片上传
     * @param $img
     * @return \think\response\Json
     */
    public function upload($img)
    {
        return json($this->userLogic->upload($img));
    }

    /**
     * 首页红包弹窗
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function getMoney()
    {
        return json($this->userLogic->getMoney(request()->_user_info));
    }
}