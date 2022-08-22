<?php

namespace Seagullmr\Rely;

use ReflectionClass;
use ReflectionException;

/**
 * 依赖包基础类
 *
 * @method static aes()
 */
class Brain
{
    /**
     * @throws ReflectionException
     */
    public static function __callStatic($class, $arguments)
    {
        return (new ReflectionClass(Facade::bind($class)))->newInstanceArgs($arguments);
    }
}
