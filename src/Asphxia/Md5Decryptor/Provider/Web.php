<?php
namespace Md5Decryptor\Provider;
abstract class Web extends \Md5Decryptor\Md5Decryptor
{
    protected $url;

    public function getWordlist($hash)
    {
        $list = FALSE;
        $url = sprintf($this->url, $hash);
        try {
            $response = file_get_contents($url);
        }catch (Exception $e) {}

        if (isset($response)) {
            $list[$response] = 1;
            $list += array_flip(preg_split('/\s+/', $response));
            $list += array_flip(preg_split('/(?:\s|\.)+/', $response));
            $list = array_keys($list);
        }
        return $list;
    }

    public function probe($hash)
    {
        $hash = strtolower($hash);
        return $this->dictionaryAttack($hash, $this->getWordlist($hash));
    }
}