<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

error_reporting(E_ALL);

define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_DEBUG', true);
define('YII_ENV', 'test');

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@phpviet/yii/numberToWords/tests', __DIR__);
Yii::setAlias('@phpviet/yii/numberToWords', dirname(__DIR__).'/src');
