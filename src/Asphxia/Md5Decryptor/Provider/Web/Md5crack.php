<?php
namespace Asphxia\Md5Decryptor\Provider\Web;
class Md5crack extends \Asphxia\Md5Decryptor\Provider\Web
{
    protected $url = 'http://www.md5crack.com/crackmd5.php?';

    public function probe($hash) {
        $hash = strtolower($hash);

        $result = \Succinct\Coil\Coil::post($this->url, array('term' => $hash));
        if (preg_match('/Found\:\ md5\(\"(.*)\"\)/', $result, $matches)){
            return $matches[1];
        }
        return null;
    }
}