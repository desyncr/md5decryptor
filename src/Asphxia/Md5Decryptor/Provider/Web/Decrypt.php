<?php
namespace Md5Decryptor\Provider\Web;
class Decrypt extends \Md5Decryptor\Provider\Web
{
    protected $url = 'http://decrypt.fr/ajax/liste.php?hash=x%s';

    public function probe($hash) {
        $hash = strtolower($hash);
        $result = \Succinct\Coil\Coil::get($this->url . $hash);
        if (preg_match('/\(length32\)\=\((.*)\)/', $result, $matches)){
            if ($matches[1] != 'NOT FOUND') {
                return $matches[1];
            }
        }
        return null;
    }
}