<?php

use Seagullmr\Rely\Brain;

require "vendor/autoload.php";

//$str = Brain::aes()->method('AES-128-ECB')->encrypt('abc', '123');
$str = Brain::stringHelper()->random(32);
print_r($str);