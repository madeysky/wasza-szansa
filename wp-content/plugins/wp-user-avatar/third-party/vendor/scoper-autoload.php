<?php

// scoper-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/autoload.php';

// Exposed classes. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/configuration.md#exposing-classes
if (!class_exists('ComposerAutoloaderInitdbc01396030b248f2e8e6b1018702c39', false) && !interface_exists('ComposerAutoloaderInitdbc01396030b248f2e8e6b1018702c39', false) && !trait_exists('ComposerAutoloaderInitdbc01396030b248f2e8e6b1018702c39', false)) {
    spl_autoload_call('ProfilePressVendor\ComposerAutoloaderInitdbc01396030b248f2e8e6b1018702c39');
}
if (!class_exists('PAnD', false) && !interface_exists('PAnD', false) && !trait_exists('PAnD', false)) {
    spl_autoload_call('ProfilePressVendor\PAnD');
}

return $loader;