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
     * @author zhaoyj
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
     * @title 获取访问ip
     * @desc 获取访问ip
     * @author zhaoyj
     * @version v1
     * @url /api/v1/ip
     * @method get
     * @return json
     * @return int status - 状态码,200ok
     * @return string messages - 提示信息
     * @return string ip - ip地址
     * @return info.Country - 国家
     * @return info.Province - 省
     * @return info.City - 市
     */
    public function GetIP()
    {
        $ip = $this->request->ip();
        $Region = $this->IPRegionModel->GetRegion($ip);
        $result = [
            "status" => 200,
            "messages" => lang("success_message"),
            "ip" => $ip,
            "info" => $Region,
            "time" => time(),
        ];
        //返回数据
        return json($result);
    }
}
