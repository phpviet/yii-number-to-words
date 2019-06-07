<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\numberToWords\tests;

use Yii;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class ComponentTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testTransform($expect, $number)
    {
        $this->assertEquals($expect, Yii::$app->n2w->toWords($number));
    }


    /**
     * @dataProvider currencyDataProvider
     */
    public function testCurrencyTransform($expect, $number)
    {
        $this->assertEquals($expect, Yii::$app->n2w->toCurrency($number));
    }

}
