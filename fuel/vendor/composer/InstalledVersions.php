<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '1.9.0',
    'version' => '1.9.0.0',
    'aliases' => 
    array (
    ),
    'reference' => NULL,
    'name' => 'fuel/fuel',
  ),
  'versions' => 
  array (
    'composer/installers' => 
    array (
      'pretty_version' => 'v1.12.0',
      'version' => '1.12.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
    ),
    'fuel/auth' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '4ac41cd52e911405e1ba81a7d604f6332b8e9bf9',
    ),
    'fuel/core' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '97401c1298096b542ebb53858ddee77852d229e3',
    ),
    'fuel/docs' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '735f70c38d79258bee37dca3a9a314b65dafc66d',
    ),
    'fuel/email' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => 'abf60db5b9813de3cb2759f51daa98e23d82fbf1',
    ),
    'fuel/fuel' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'fuel/oil' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '793f53bce56a1bf6e9e9088ace57ef1868f29cfa',
    ),
    'fuel/orm' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '9e1322f5634cbecc4aeb0a763cece134be9a6079',
    ),
    'fuel/parser' => 
    array (
      'pretty_version' => 'dev-1.9/develop',
      'version' => 'dev-1.9/develop',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '72a9495293e822b144575329bd7ced8c4cf41e54',
    ),
    'fuelphp/upload' => 
    array (
      'pretty_version' => '2.0.6',
      'version' => '2.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '73b3abfa317c22d6b4d63588e9601c13623ea6f6',
    ),
    'michelf/php-markdown' => 
    array (
      'pretty_version' => '1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5024d623c1a057dcd2d076d25b7d270a1d0d55f3',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '1.27.1',
      'version' => '1.27.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '904713c5929655dc9b97288b69cfeedad610c9a1',
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.100',
      'version' => '9.99.100.0',
      'aliases' => 
      array (
      ),
      'reference' => '996434e5492cb4c3edcb9168db6fbb1359ef965a',
    ),
    'paragonie/sodium_compat' => 
    array (
      'pretty_version' => 'v1.19.0',
      'version' => '1.19.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cb15e403ecbe6a6cc515f855c310eb6b1872a933',
    ),
    'phpseclib/phpseclib' => 
    array (
      'pretty_version' => '2.0.39',
      'version' => '2.0.39.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f3a0e2b715c40cf1fd270d444901b63311725d63',
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0',
      ),
    ),
    'roundcube/plugin-installer' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'shama/baton' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
