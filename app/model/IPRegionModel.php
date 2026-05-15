<?php
namespace app\model;
use think\Model;

/**
 * @title ip属地模型
 * @desc ip属地模型
 * @use app\model\IPRegionModel
 */
class IPRegionModel// extends Model
{
    //表名
    protected $name = 'ip_regions';
    
    /**
     * @title 返回IP对应地区名称
     * @desc 返回IP对应地区名称
     * @author zhaoyj
     * @version v1
     * @param string $ipAddr - ip地址
     * @return array
     * @return string Country - 国家
     * @return string Province - 省
     * @return string City - 市
     */
     public function GetRegion($ip)
    {
        //$DbPath = root_path() . '/extends/IP2Region/ip2region_v4.xdb';
        $IP2Region = new \Ip2Region('file');
        $IPInfo = $IP2Region->getIpInfo($ip);
        $result = [
                'Country'=>$IPInfo['country'],
                'Province'=>$IPInfo['province'],
                'City'=>$IPInfo['city']
                ];
        return $result;
    }
}
