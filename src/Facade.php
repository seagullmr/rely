<?php

namespace Seagullmr\Rely;

use InvalidArgumentException;
use Seagullmr\Rely\Helpers\ArrayHelper;
use Seagullmr\Rely\Helpers\StringHelper;
use Seagullmr\Rely\Safety\Aes;
use Seagullmr\Rely\Safety\Rsa;

class Facade
{
    /**
     * 容器绑定标识
     */
    private static array $bind = [
        'arrayHeader' => ArrayHelper::class,
        'stringHelper' => StringHelper::class,
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
