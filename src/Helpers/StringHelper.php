<?php

namespace Seagullmr\Rely\Helpers;

class StringHelper
{
    /**
     * 随机字符串
     * @param int $length
     * @param bool $spe
     * @return string
     */
    public function random(int $length = 10, bool $spe = false): string
    {
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $spe && $str .= '!@#$%^&*()';
        $randStr = str_shuffle($str);
        return substr($randStr, 0, $length);
    }
}