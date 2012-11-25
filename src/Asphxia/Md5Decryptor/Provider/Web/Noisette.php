<?php
namespace Asphxia\Md5Decryptor\Provider\Web;
class Noisette extends \Asphxia\Md5Decryptor\Provider\Web
{
    protected $url = 'http://md5.noisette.ch/index.php';

    public function probe($hash) {
        $hash = strtolower($hash);

        $result = \Succinct\Coil\Coil::post($this->url, array('hash' => $hash));
         
        if (preg_match('/\= md5\("(.*)"\)/', $result, $matches)){
            return $matches[1];
        }
        return null;
    }
}