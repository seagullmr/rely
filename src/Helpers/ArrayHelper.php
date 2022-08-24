<?php

namespace Seagullmr\Rely\Helpers;

use InvalidArgumentException;
use JsonException;

class ArrayHelper
{
    /**
     * 根据某个字段进行升序排序
     * @param array $data
     * @param string $key
     * @return array
     */
    public function sortAsc(array $data, string $key): array
    {
        $sort = array_column($data, $key);
        array_multisort($sort, SORT_ASC, $data);
        return $data;
    }

    /**
     * 根据某个字段进行降序排序
     * @param array $data
     * @param string $key
     * @return array
     */
    public function sortDesc(array $data, string $key): array
    {
        $sort = array_column($data, $key);
        array_multisort($sort, SORT_DESC, $data);
        return $data;
    }

    /**
     * 数组转XML
     * @param array $params
     * @return string
     */
    public function arrayToXml(array $params): string
    {
        if(!is_array($params)|| empty($params)) {
            return '';
        }
        $xml = "<xml>";
        foreach ($params as $key=>$val) {
            if (is_numeric($val)) {
                $xml.="<".$key.">".$val."</".$key.">";
            } else {
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }


    /**
     * XML转数组
     * @param $xml
     * @return array
     */
    public function xmlToArray($xml): array
    {
        if (empty($xml)) {
            return [];
        }
        libxml_disable_entity_loader();
        try {
            $arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA), JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new InvalidArgumentException($e->getMessage(), $e->getCode());
        }
        return $arr;
    }
}
