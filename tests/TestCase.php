<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\numberToWords\tests;

use Yii;
use yii\helpers\ArrayHelper;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        $this->mockApplication();
    }

    public function tearDown(): void
    {
        $this->destroyApplication();
    }

    /**
     * Populates Yii::$app with a new application
     * The application will be destroyed on tearDown() automatically.
     *
     * @param array  $config   The application configuration, if needed
     * @param string $appClass name of the application class to create
     */
    protected function mockApplication($config = [], $appClass = '\yii\console\Application'): void
    {
        new $appClass(ArrayHelper::merge([
            'id'         => 'test',
            'language'   => 'vi',
            'bootstrap'  => ['phpviet\yii\numberToWords\Bootstrap'],
            'basePath'   => __DIR__,
            'vendorPath' => dirname(__DIR__).'/vendor',
            'components' => [

            ],
        ], $config));
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication(): void
    {
        Yii::$app = null;
    }

    public function dataProvider(): array
    {
        return [
            ['ba trăm sáu mươi tư phẩy mười tám', 364.18],
            ['chín trăm linh năm phẩy ba trăm chín mươi hai', 905.392],
            ['hai trăm tám mươi ba phẩy ba trăm bảy mươi mốt', 283.371],
            ['hai trăm bảy mươi tám phẩy bốn trăm tám mươi sáu', 278.486],
            ['ba mươi hai phẩy bảy trăm sáu mươi chín', 32.769],
            ['bảy trăm linh hai phẩy một trăm bảy mươi bảy', 702.177],
            ['chín trăm hai mươi hai phẩy năm mươi sáu', 922.56],
            ['năm mươi lăm phẩy hai trăm chín mươi sáu', 55.296],
            ['sáu trăm sáu mươi ba phẩy ba trăm hai mươi tám', 663.328],
            ['bảy trăm hai mươi bảy phẩy sáu trăm linh năm', 727.605],
            ['năm trăm ba mươi ba phẩy chín trăm ba mươi bảy', 533.937],
            ['ba trăm năm mươi tư phẩy một trăm năm mươi sáu', 354.156],
            ['hai trăm hai mươi hai phẩy bảy trăm bảy mươi tám', 222.778],
            ['hai trăm linh năm phẩy năm trăm mười lăm', 205.515],
            ['tám trăm chín mươi phẩy sáu trăm sáu mươi tám', 890.668],
            ['sáu trăm mười bốn phẩy năm trăm hai mươi sáu', 614.526],
            ['một trăm tám mươi chín phẩy chín trăm hai mươi chín', 189.929],
            ['chín trăm linh bảy phẩy bốn trăm hai mươi bảy', 907.427],
            ['một trăm tám mươi tám phẩy bốn trăm hai mươi tư', 188.424],
            ['sáu trăm linh sáu phẩy ba trăm năm mươi ba', 606.353],
            ['hai trăm mười bảy phẩy bốn mươi bảy', 217.470],
            ['ba trăm bốn mươi tư phẩy sáu trăm ba mươi hai', 344.632],
            ['bốn trăm bảy mươi chín phẩy bốn mươi tám', 479.480],
            ['tám mươi sáu phẩy năm trăm bảy mươi sáu', 86.576],
            ['hai trăm năm mươi tám phẩy chín trăm bảy mươi tám', 258.978],
            ['ba trăm sáu mươi sáu phẩy hai trăm chín mươi tám', 366.298],
            ['bảy trăm sáu mươi hai phẩy ba trăm bảy mươi hai', 762.372],
            ['năm trăm bảy mươi ba phẩy năm mươi tám', 573.58],
            ['sáu trăm sáu mươi chín phẩy một trăm ba mươi lăm', 669.135],
            ['ba trăm chín mươi lăm phẩy một trăm ba mươi sáu', 395.136],
            ['sáu trăm hai mươi ba phẩy mười lăm', 623.150],
            ['sáu trăm hai mươi tám phẩy tám trăm bảy mươi bảy', 628.877],
            ['tám trăm tám mươi chín phẩy tám trăm hai mươi chín', 889.829],
            ['chín trăm năm mươi lăm phẩy hai trăm hai mươi tư', 955.224],
            ['sáu trăm linh hai phẩy bảy trăm năm mươi tư', 602.754],
            ['tám trăm bốn mươi chín phẩy bảy mươi ba', 849.73],
            ['tám trăm tám mươi bảy phẩy chín trăm tám mươi chín', 887.989],
            ['tám trăm bảy mươi tám phẩy sáu trăm mười bốn', 878.614],
            ['tám trăm mười bảy phẩy hai trăm mười hai', 817.212],
            ['ba trăm sáu mươi hai phẩy năm trăm chín mươi mốt', 362.591],
            ['bốn trăm mười bảy phẩy hai trăm ba mươi bảy', 417.237],
            ['bốn trăm linh năm phẩy bốn trăm linh bốn', 405.404],
            ['một trăm bảy mươi hai phẩy bảy trăm chín mươi sáu', 172.796],
            ['bốn trăm ba mươi mốt phẩy sáu trăm bảy mươi hai', 431.672],
            ['sáu trăm chín mươi chín phẩy bốn trăm ba mươi sáu', 699.436],
            ['hai trăm tám mươi ba phẩy tám trăm hai mươi tám', 283.828],
            ['sáu trăm sáu mươi tám phẩy năm trăm năm mươi hai', 668.552],
            ['hai trăm hai mươi lăm phẩy bốn mươi chín', 225.490],
            ['năm mươi phẩy bảy trăm chín mươi lăm', 50.795],
            ['tám trăm năm mươi tám phẩy bốn trăm linh sáu', 858.406],
            ['một trăm linh bảy phẩy bốn trăm linh một', 107.401],
            ['một trăm mười chín phẩy hai mươi sáu', 119.26],
            ['chín trăm năm mươi tư phẩy bảy trăm sáu mươi lăm', 954.765],
            ['ba trăm ba mươi lăm phẩy một trăm bảy mươi bảy', 335.177],
            ['năm trăm hai mươi ba phẩy bảy trăm sáu mươi mốt', 523.761],
            ['bảy mươi lăm phẩy tám trăm mười một', 75.811],
            ['bốn trăm mười sáu phẩy một', 416.100],
            ['tám mươi phẩy ba trăm ba mươi ba', 80.333],
            ['bốn trăm bảy mươi tư phẩy mười một', 474.110],
            ['chín trăm mười bảy phẩy mười lăm', 917.15],
            ['tám trăm bốn mươi sáu phẩy năm trăm hai mươi mốt', 846.521],
            ['bảy trăm sáu mươi ba phẩy năm trăm sáu mươi lăm', 763.565],
            ['chín trăm tám mươi bảy phẩy bảy trăm bảy mươi bảy', 987.777],
            ['bảy trăm năm mươi hai phẩy mười bốn', 752.140],
            ['một trăm năm mươi sáu phẩy năm trăm bốn mươi tư', 156.544],
            ['một trăm mười một phẩy hai trăm tám mươi chín', 111.289],
            ['tám trăm ba mươi lăm phẩy chín mươi mốt', 835.91],
            ['ba trăm mười bốn phẩy năm trăm ba mươi mốt', 314.531],
            ['mười ba phẩy sáu trăm ba mươi tư', 13.634],
            ['bốn trăm sáu mươi mốt phẩy năm trăm mười sáu', 461.516],
            ['bảy trăm sáu mươi chín phẩy chín mươi tám', 769.980],
            ['hai trăm tám mươi lăm phẩy năm trăm bốn mươi lăm', 285.545],
            ['bảy trăm chín mươi sáu phẩy bảy trăm bốn mươi tám', 796.748],
            ['ba trăm bảy mươi chín phẩy chín trăm chín mươi chín', 379.999],
            ['ba trăm mười ba phẩy ba trăm mười ba', 313.313],
            ['sáu trăm bảy mươi chín phẩy bảy trăm mười ba', 679.713],
            ['bảy mươi sáu phẩy năm trăm tám mươi tư', 76.584],
            ['chín trăm chín mươi tư phẩy bốn trăm tám mươi ba', 994.483],
            ['sáu trăm tám mươi lăm phẩy tám trăm bảy mươi bảy', 685.877],
            ['bảy trăm chín mươi chín phẩy một trăm linh sáu', 799.106],
            ['một trăm chín mươi chín phẩy hai trăm bảy mươi lăm', 199.275],
            ['sáu trăm hai mươi lăm phẩy mười hai', 625.120],
            ['bảy trăm bốn mươi ba phẩy tám trăm hai mươi chín', 743.829],
            ['sáu trăm bảy mươi ba phẩy hai trăm linh năm', 673.205],
            ['tám trăm sáu mươi ba phẩy ba trăm chín mươi chín', 863.399],
            ['một trăm bốn mươi sáu phẩy sáu trăm sáu mươi hai', 146.662],
            ['chín trăm ba mươi tư phẩy chín trăm sáu mươi tám', 934.968],
            ['tám trăm tám mươi tư phẩy ba trăm bốn mươi tám', 884.348],
            ['chín trăm năm mươi tư phẩy hai trăm chín mươi lăm', 954.295],
            ['năm trăm sáu mươi tư phẩy tám mươi tư', 564.840],
            ['bảy trăm bốn mươi ba phẩy chín trăm bốn mươi sáu', 743.946],
            ['ba trăm linh chín phẩy hai', 309.2],
            ['hai trăm sáu mươi tám phẩy ba trăm bảy mươi tư', 268.374],
            ['năm trăm năm mươi sáu phẩy bảy trăm bảy mươi mốt', 556.771],
            ['bảy trăm sáu mươi hai phẩy năm trăm bảy mươi sáu', 762.576],
            ['một trăm tám mươi chín phẩy chín trăm bảy mươi tư', 189.974],
            ['năm trăm ba mươi phẩy tám trăm ba mươi sáu', 530.836],
            ['năm mươi lăm phẩy mười chín', 55.190],
            ['hai trăm tám mươi chín phẩy sáu trăm ba mươi mốt', 289.631],
            ['năm trăm linh một phẩy bảy trăm mười bốn', 501.714],
        ];
    }

    public function currencyDataProvider(): array
    {
        return [
            ['hai mươi sáu triệu một trăm đồng', 26000100],
            ['ba trăm mười triệu năm trăm đồng', 310000500],
            ['chín mươi lăm triệu năm trăm nghìn hai trăm đồng', 95500200],
            ['hai mươi mốt triệu tám trăm nghìn năm trăm đồng', 21800500],
            ['ba mươi chín triệu bốn trăm nghìn năm trăm đồng', 39400500],
            ['sáu mươi nghìn ba trăm đồng', 60300],
            ['ba trăm chín mươi lăm triệu một trăm đồng', 395000100],
            ['bốn mươi nghìn một trăm đồng', 40100],
            ['sáu trăm tám mươi mốt triệu chín trăm đồng', 681000900],
            ['năm triệu tám trăm nghìn một trăm đồng', 5800100],
            ['bốn mươi tư triệu bảy trăm nghìn chín trăm đồng', 44700900],
            ['bảy triệu ba trăm nghìn hai trăm đồng', 7300200],
            ['bốn triệu tám trăm mười nghìn tám trăm đồng', 4810800],
            ['năm trăm sáu mươi tư nghìn bảy trăm đồng', 564700],
            ['hai triệu hai trăm bốn mươi nghìn tám trăm đồng', 2240800],
            ['hai mươi chín triệu năm trăm nghìn tám trăm đồng', 29500800],
            ['bảy trăm chín mươi hai triệu một trăm đồng', 792000100],
            ['năm trăm mười lăm nghìn bảy trăm đồng', 515700],
            ['ba mươi hai nghìn sáu trăm đồng', 32600],
            ['mười chín triệu chín trăm nghìn hai trăm đồng', 19900200],
            ['ba triệu hai trăm hai mươi nghìn tám trăm đồng', 3220800],
            ['tám trăm chín mươi chín nghìn hai trăm đồng', 899200],
            ['ba mươi hai nghìn tám trăm đồng', 32800],
            ['một trăm bốn mươi bảy triệu tám trăm đồng', 147000800],
            ['hai triệu hai trăm hai mươi nghìn sáu trăm đồng', 2220600],
            ['chín triệu tám trăm năm mươi nghìn bốn trăm đồng', 9850400],
            ['năm triệu bốn trăm bốn mươi nghìn một trăm đồng', 5440100],
            ['bốn mươi ba nghìn chín trăm đồng', 43900],
            ['hai trăm nghìn ba trăm đồng', 200300],
            ['bảy trăm ba mươi tư triệu chín trăm đồng', 734000900],
            ['hai mươi tám triệu chín trăm đồng', 28000900],
            ['chín trăm bốn mươi ba nghìn tám trăm đồng', 943800],
            ['ba trăm chín mươi mốt triệu bốn trăm đồng', 391000400],
            ['bốn trăm bảy mươi tư nghìn ba trăm đồng', 474300],
            ['bảy triệu bảy trăm ba mươi nghìn một trăm đồng', 7730100],
            ['bảy trăm ba mươi tám triệu chín trăm đồng', 738000900],
            ['một trăm hai mươi triệu sáu trăm đồng', 120000600],
            ['một trăm chín mươi ba triệu ba trăm đồng', 193000300],
            ['bốn mươi lăm triệu bảy trăm nghìn tám trăm đồng', 45700800],
            ['năm trăm ba mươi sáu triệu ba trăm đồng', 536000300],
            ['bảy triệu không trăm mười nghìn hai trăm đồng', 7010200],
            ['bảy triệu một trăm ba mươi nghìn bốn trăm đồng', 7130400],
            ['ba trăm năm mươi ba triệu năm trăm đồng', 353000500],
            ['một trăm bảy mươi bảy triệu năm trăm đồng', 177000500],
            ['hai triệu bảy trăm nghìn một trăm đồng', 2700100],
            ['tám mươi nghìn chín trăm đồng', 80900],
            ['hai trăm tám mươi hai triệu bảy trăm đồng', 282000700],
            ['ba trăm tám mươi chín triệu chín trăm đồng', 389000900],
            ['sáu triệu sáu trăm hai mươi nghìn chín trăm đồng', 6620900],
            ['ba trăm chín mươi lăm triệu năm trăm đồng', 395000500],
            ['bốn triệu một trăm tám mươi nghìn chín trăm đồng', 4180900],
            ['bảy trăm sáu mươi chín nghìn năm trăm đồng', 769500],
            ['chín mươi tư triệu bảy trăm nghìn ba trăm đồng', 94700300],
            ['tám triệu bảy trăm đồng', 8000700],
            ['bốn mươi tư triệu hai trăm nghìn bảy trăm đồng', 44200700],
            ['năm trăm chín mươi tám nghìn hai trăm đồng', 598200],
            ['năm mươi mốt triệu một trăm nghìn hai trăm đồng', 51100200],
            ['tám mươi sáu triệu năm trăm nghìn ba trăm đồng', 86500300],
            ['bốn trăm năm mươi nghìn một trăm đồng', 450100],
            ['hai triệu hai trăm tám mươi nghìn một trăm đồng', 2280100],
            ['chín mươi triệu hai trăm nghìn năm trăm đồng', 90200500],
            ['bảy mươi ba triệu hai trăm nghìn bốn trăm đồng', 73200400],
            ['một trăm sáu mươi sáu nghìn bốn trăm đồng', 166400],
            ['tám triệu bốn trăm hai mươi nghìn sáu trăm đồng', 8420600],
            ['năm triệu hai trăm năm mươi nghìn sáu trăm đồng', 5250600],
            ['tám trăm năm mươi tư triệu chín trăm đồng', 854000900],
            ['bảy triệu không trăm tám mươi nghìn sáu trăm đồng', 7080600],
            ['tám mươi mốt triệu hai trăm nghìn ba trăm đồng', 81200300],
            ['tám trăm hai mươi hai triệu năm trăm đồng', 822000500],
            ['sáu trăm linh ba nghìn bốn trăm đồng', 603400],
            ['ba trăm linh một nghìn bảy trăm đồng', 301700],
            ['bảy trăm bốn mươi hai nghìn năm trăm đồng', 742500],
            ['năm trăm sáu mươi lăm nghìn ba trăm đồng', 565300],
            ['chín trăm ba mươi triệu một trăm đồng', 930000100],
            ['hai trăm chín mươi mốt nghìn bốn trăm đồng', 291400],
            ['hai triệu không trăm hai mươi nghìn sáu trăm đồng', 2020600],
            ['chín mươi tư triệu hai trăm nghìn bốn trăm đồng', 94200400],
            ['tám mươi bảy nghìn ba trăm đồng', 87300],
            ['chín mươi chín triệu năm trăm nghìn bốn trăm đồng', 99500400],
            ['một trăm sáu mươi hai nghìn bảy trăm đồng', 162700],
            ['một trăm ba mươi tám triệu bảy trăm đồng', 138000700],
            ['tám trăm mười hai nghìn hai trăm đồng', 812200],
            ['sáu trăm mười một triệu một trăm đồng', 611000100],
            ['sáu trăm mười triệu tám trăm đồng', 610000800],
            ['mười triệu ba trăm nghìn sáu trăm đồng', 10300600],
            ['hai triệu chín trăm hai mươi nghìn chín trăm đồng', 2920900],
            ['sáu trăm ba mươi triệu bảy trăm đồng', 630000700],
            ['một trăm mười một nghìn chín trăm đồng', 111900],
            ['bảy mươi mốt triệu sáu trăm nghìn một trăm đồng', 71600100],
            ['chín trăm bốn mươi nghìn bốn trăm đồng', 940400],
            ['tám mươi ba triệu chín trăm nghìn ba trăm đồng', 83900300],
            ['bốn triệu sáu trăm mười nghìn hai trăm đồng', 4610200],
            ['ba trăm linh bảy triệu bảy trăm đồng', 307000700],
            ['một triệu chín trăm mười nghìn hai trăm đồng', 1910200],
            ['bốn mươi tám triệu bốn trăm nghìn một trăm đồng', 48400100],
            ['năm triệu sáu trăm chín mươi nghìn bảy trăm đồng', 5690700],
            ['chín trăm mười bảy triệu bảy trăm đồng', 917000700],
            ['năm trăm nghìn bảy trăm đồng', 500700],
            ['mười bảy triệu bảy trăm nghìn một trăm đồng', 17700100],
        ];
    }
}
