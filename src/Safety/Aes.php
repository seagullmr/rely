<?php

namespace Seagullmr\Rely\Safety;

class Aes
{
    protected string $method = 'AES-128-ECB';
    private string $vector;

    public function method(string $method): static
    {
        $this->method = $method;
        $len = openssl_cipher_iv_length($this->method);
        $this->vector = $len > 0 ? openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method)) : '';
        return $this;
    }

    public function encrypt(string $str, string $aes_key): string
    {

        return base64_encode(openssl_encrypt($str, $this->method, $aes_key, OPENSSL_RAW_DATA, $this->vector));
    }

    public function decrypt(string $str, string $aes_key): string
    {
        return openssl_decrypt(base64_decode($str), $this->method, $aes_key, OPENSSL_RAW_DATA, $this->vector);
    }
}
