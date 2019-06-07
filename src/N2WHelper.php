<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\numberToWords;

use yii\di\Instance;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class N2WHelper
{
    /**
     * Component hổ trợ việc chuyển đổi số sang chữ số.
     *
     * @var array|string|callable|N2W
     */
    protected static $n2w = 'n2w';

    /**
     * Chuyển đổi số sang chữ số.
     *
     * @param $number
     * @param string $dictionary
     * @return string
     */
    public static function toWords($number, string $dictionary = N2W::STANDARD_DICTIONARY): string
    {
        $n2w = Instance::ensure(static::$n2w, N2W::class);
        $currentDictionary = $n2w->dictionary;
        $n2w->dictionary = $dictionary;
        $result = $n2w->toWords($number);
        $n2w->dictionary = $currentDictionary;

        return $result;
    }

    /**
     * Chuyển đổi số sang tiền tệ.
     *
     * @param $number
     * @param string $unit
     * @param string $dictionary
     * @return string
     */
    public static function toCurrency($number, $unit = 'đồng', string $dictionary = N2W::STANDARD_DICTIONARY): string
    {
        $n2w = Instance::ensure(static::$n2w, N2W::class);
        $currentDictionary = $n2w->dictionary;
        $n2w->dictionary = $dictionary;
        $result = $n2w->toCurrency($number, $unit);
        $n2w->dictionary = $currentDictionary;

        return $result;
    }
}
