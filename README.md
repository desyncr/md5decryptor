# Md5Decryptor

Md5Decryptor is a neat tool that searchs for a given MD5 hash in a set of web-based resources, such as Google, md5decrypter.co.uk, decrypt.fr, md5.my-addr.com and md5.noisette.ch.

It can be easily extendible to work with any other similar service.

Based on http://stackoverflow.com/a/10235240

## Usage
```php
<?php
    $plain = Md5Decryptor\Md5Decryptor::plain($hash, 'Web\Google');
````

