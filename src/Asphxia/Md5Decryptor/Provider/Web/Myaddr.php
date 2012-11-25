<?php
namespace Asphxia\Md5Decryptor\Provider\Web;
class Myaddr extends \Asphxia\Md5Decryptor\Provider\Web
{
    protected $url = 'http://md5.my-addr.com/md5_decrypt-md5_cracker_online/md5_decoder_tool.php';

    public function probe($hash) {
        $hash = strtolower($hash);

        $result = \Succinct\Coil\Coil::post($this->url, array('md5' => $hash));

        if (preg_match('/Hashed string.*: (.*)\<\/div\>/', $result, $matches)){
            return $matches[1];
        }
        return null;
    }
}