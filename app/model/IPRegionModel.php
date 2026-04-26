<?php
namespace app\api\models;
use think\Model;

/**
 * @title ip属地模型
 * @desc ip属地模型
 * @use app\api\model\IPRegionModel
 */
class IPRegionModel extends Model
{
    //表名
    protected $name = 'ip_regions';
    
    /**
     * @title 返回IP对应地区名称
     * @desc 返回IP对应地区名称
     * @author zhaoyj
     * @return string - region: CN - 中国
     */
     public function GetRegion($ipAddr)
     {
         //格式化
         $iplong = ip2long($ipAddr);
         $ip = sprintf("%u", $iplong);
         //获取数据库
         $result = $this->where('start_ip_num', '<=', $ip)->where('end_ip_num', '>=', $ip)->value('country_code');
         return $result;
     }
}
