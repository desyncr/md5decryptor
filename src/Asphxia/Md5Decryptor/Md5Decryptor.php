<?php
namespace Md5Decryptor;
abstract class Md5Decryptor
{
    abstract public function probe($hash);
    public static function plain($hash, $class = NULL)
    {
        if ($class === NULL) {
            $class = get_called_class();
        } else {
            $class = sprintf('Md5Decryptor\Provider\%s', $class);
        }
        $decryptor = new $class();

        if (count($hash) > 1) {
            foreach ($hash as $one) {
                $one = $decryptor->probe($one);
            }
            $hash = $one;
        } else {
            $hash = $decryptor->probe($hash);
        }
        return $hash;
    }

    public function dictionaryAttack($hash, array $wordlist)
    {
        $hash = strtolower($hash);
        foreach ($wordlist as $word) {
            if (md5($word) === $hash)
                return $word;
        }
    }
}
