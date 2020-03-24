<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/27
 * Time: 16:02
 */

namespace app\admin\controller;

use logicmodel\admin\AuthLogic;
use validate\Authvalidate;
use validate\Rolevalidate;

class Auth extends BaseController
{
    private $authLogic;

    public function __construct()
    {
        parent::__construct();
        $this->authLogic = new AuthLogic();
    }

    //管理员管理

    /**
     * 管理员列表
     * @param int $page
     * @param int $pagesize
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function adminList($page = 1, $pagesize = 10)
    {
        return json($this->authLogic->adminList($page, $pagesize));
    }

    /**
     * 添加管理员
     * @param $name
     * @param $account
     * @param $password
     * @param $role_id
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function addAdmin($name, $account, $password, $role_id)
    {
        (new Authvalidate())->goCheck('add');
        return json($this->authLogic->addAdmin($name, $account, $password, $role_id));
    }

    /**
     * 编辑管理员
     * @param $id
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function editAdmin($id)
    {
        (new Authvalidate())->goCheck('edit', ['id' => $id]);
        return json($this->authLogic->editAdmin($id));
    }

    /**
     * 修改管理员信息
     * @param $id
     * @param $name
     * @param $role_id
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateAdmin($id, $name, $role_id)
    {
        (new Authvalidate())->goCheck('update');
        return json($this->authLogic->updateAdmin($id, $name, $role_id));
    }

    /**
     * 删除管理员
     * @param $id
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteAdmin($id)
    {
        (new Authvalidate())->goCheck('edit', ['id' => $id]);
        return json($this->authLogic->deleteAdmin($id));
    }

    /**
     * 重置管理员密码
     * @param $id
     * @param $password
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resetAdmin($id, $password)
    {
        (new Authvalidate())->goCheck('password');
        return json($this->authLogic->resetAdmin($id, $password));
    }

    /**
     * 禁用启用管理员
     * @param $id
     * @param $status
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function isStatus($id, $status)
    {
        (new Authvalidate())->goCheck('status');
        return json($this->authLogic->isStatus($id, $status));
    }

    //角色管理

    /**
     * 角色列表
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function roleList()
    {
        return json($this->authLogic->roleList());
    }

    /**
     * 添加角色
     * @param $name
     * @param $rules
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     */
    public function addRole($name, $rules, $remark)
    {
        (new Rolevalidate())->goCheck('add');
        return json($this->authLogic->addRole($name, $rules, $remark));
    }

    /**
     * 编辑角色
     * @param $id
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function editRole($id)
    {
        (new Rolevalidate())->goCheck('edit', ['id' => $id]);
        return json($this->authLogic->editRole($id));
    }

    /**
     * 修改角色信息
     * @param $id
     * @param $name
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateRole($id, $name, $remark)
    {
        (new Rolevalidate())->goCheck('update');
        return json($this->authLogic->updateRole($id, $name, $remark));
    }

    /**
     * 删除角色
     * @param $id
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function deleteRole($id)
    {
        (new Rolevalidate())->goCheck('edit', ['id' => $id]);
        return json($this->authLogic->deleteRole($id));
    }

    /**
     * 给角色授权
     * @param $id
     * @param $rules
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function authRole($id, $rules)
    {
        (new Rolevalidate())->goCheck('auth');
        return json($this->authLogic->authRole($id, $rules));
    }

    /**
     * 获取所有权限
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function allRules()
    {
        return json($this->authLogic->allRules());
    }

    /**
     * 获取当前管理员权限
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function adminRole()
    {
        return json($this->authLogic->adminRole(request()->_admin_role_id));
    }
}