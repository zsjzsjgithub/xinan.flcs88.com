<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 生成订单
 * @return string
 * @throws \think\db\exception\DataNotFoundException
 * @throws \think\db\exception\ModelNotFoundException
 * @throws \think\exception\DbException
 */
function uniqueNum()
{
    $res = true;
    while ($res) {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $order_no =
            $yCode[intval(date('Y')) - 2019] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        $order_no = $order_no . time();
        $data = (new \datamodel\Orders())->getByWhere(['order_num' => $order_no]);
        if (!$data) $res = false;
    }
    return $order_no;
}

/**
 * 获取当前时间
 * @return false|string
 */
function nowTime()
{
    return date("Y-m-d H:i:s");
}

/**
 * 添加订单
 * @param $uid
 * @param $order_num
 * @param $money
 * @param $status
 * @param $now_time
 * @return bool
 */
function insertOrders($uid, $order_num, $money, $status, $now_time)
{
    $insert['uid'] = $uid;
    $insert['order_num'] = $order_num;
    $insert['money'] = $money;
    $insert['status'] = $status;
    $insert['now_time'] = $now_time;
    $res = (new \datamodel\Orders())->create($insert);
    if ($res) return true;
    return false;
}
