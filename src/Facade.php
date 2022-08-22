<?php

namespace Seagullmr\Rely;

use Seagullmr\Rely\Safety\Aes;
use Seagullmr\Rely\Safety\Rsa;
use http\Exception\InvalidArgumentException;

class Facade
{
    /**
     * 容器绑定标识
     */
    private static array $bind = [
        'rsa' => Rsa::class,
        'aes' => Aes::class,
    ];

    /**
     * 类库绑定
     */
    public static function bind($class): string
    {
        if (empty(self::$bind[$class]) || !class_exists(self::$bind[$class])) {
            throw new InvalidArgumentException('Class does not exist');
        }
        return self::$bind[$class];
    }
}
