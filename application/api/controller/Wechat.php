<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/3 0003
 * Time: 15:15
 */

namespace app\api\controller;

use app\api\controller\BaseController;
use comservice\Response;
use datamodel\AwardRecord;
use datamodel\Orders;
use enum\CommonEnum;
use enum\OrderEnum;
use logicmodel\WechatLogic;

class Wechat extends BaseController
{
    private $wechatLogic;
    protected $middleware = ['CheckApi' => ['except' => ['notify']]];
    public function __construct()
    {
        parent::__construct();
        $this->wechatLogic = new WechatLogic();
    }

    /**
     * 支付
     * @return \think\response\Json|void
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function wechatPay()
    {
        $userInfo = request()->_user_info;
        if ($userInfo['is_bind'] == CommonEnum::$nobind) return json(Response::fail('请先绑定您的金燕卡'));
        $where['uid']=$userInfo['id'];
        $res = (new AwardRecord())->whereTime('create_time', 'm')->where($where)->select();
        if (count($res) > 0) return json(Response::fail('每月只能领取一次红包'));
        return json($this->wechatLogic->wechatPay($userInfo));
    }

    /**
     * 微信异步回调
     * @return \think\response\Json
     * @throws \EasyWeChat\Kernel\Exceptions\Exception
     */
    public function notify(){
        return json($this->wechatLogic->notify());
    }
}