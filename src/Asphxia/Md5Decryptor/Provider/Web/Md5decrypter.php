<?php
namespace Asphxia\Md5Decryptor\Provider\Web;
class Md5decrypter extends \Asphxia\Md5Decryptor\Provider\Web
{
    protected $url = 'http://api.md5decrypter.co.uk/?';

    public function probe($hash) {
        $hash = strtolower($hash);
        $result = \Succinct\Coil\Coil::get($this->url . $hash);
        if (preg_match('/CDATA\[(.*)\]\]/', $result, $matches)){
            return $matches[1];
        }
        return null;
    }
}