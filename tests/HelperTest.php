<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\numberToWords\tests;

use phpviet\yii\numberToWords\N2WHelper;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class HelperTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testTransform($expect, $number)
    {
        $this->assertEquals($expect, N2WHelper::toWords($number));
    }


    /**
     * @dataProvider currencyDataProvider
     */
    public function testCurrencyTransform($expect, $number)
    {
        $this->assertEquals($expect, N2WHelper::toCurrency($number));
    }

}
