<?php
namespace app\controller;
use think\facade\Lang;
use app\model\IPRegionModel;

class ApiController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
        Lang::load('../lang/zh-cn.php');
        $this->IPRegionModel = new IPRegionModel();
    }

    /**
     * @title 未命中路由处理
     * @desc 未命中路由处理
     * @author silveridc
     * @version v1
     * @return json
     * @return int status - 状态码
     * @return string messages - 提示信息
     * @return string path - 访问路径
     */
    public function NotFound()
    {
        $result = [
            "status" => 404,
            "messages" => lang("route_not_found"),
            "path" => $this->request->url(),
        ];
        return json($result,404);
    }
    /**
     * @title 获取IP地址
     * @desc 获取IP地址
     * @author zhaoyj
     * @version v1
     * @url /api/v1/ip
     * @method get
     * @return json
     * @return int status - 状态码
     * @return string msg - 提示信息
     * @return string ip - ip地址
     */
    public function GetIP()
    {
        $ip = $this->request->ip();
        $result = [
            "status" => 200,
            "msg" => lang("success_message"),
            "ip" => $ip,
            "region" => $this->IPRegionModel->GetRegion($ip),
        ];
        return json($result);
    }
}
