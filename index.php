<?php

use Seagullmr\Rely\Brain;

require "vendor/autoload.php";

$str = Brain::aes()->method('AES-128-ECB')->encrypt('abc', '123');
print_r($str);