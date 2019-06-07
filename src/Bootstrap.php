<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\numberToWords;

use yii\base\Application;
use yii\base\BootstrapInterface;
use PHPViet\NumberToWords\Dictionary;
use PHPViet\NumberToWords\SouthDictionary;
use PHPViet\NumberToWords\DictionaryInterface;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Bootstrap implements BootstrapInterface
{

    /**
     * Đối tượng application đang cần boot.
     *
     * @var Application
     */
    protected $app;

    /**
     * @inheritDoc
     */
    public function bootstrap($app): void
    {
        $this->app = $app;
        $this->registerComponent();
        $this->registerSingletonClasses();
    }

    /**
     * Đăng ký component vào app.
     */
    protected function registerComponent(): void
    {
        if (!$this->app->get('n2w', false)) {
            $this->app->set('n2w', ['class' => N2W::class]);
        }
    }


    /**
     * Đăng ký các singleton classes vào container tối ưu việc khởi tạo đối tượng mới khi thay đổi từ điển.
     */
    protected function registerSingletonClasses(): void
    {
        $this->app->setContainer([
            'singletons' => [
                Dictionary::class => Dictionary::class,
                DictionaryInterface::class => Dictionary::class,
                SouthDictionary::class => SouthDictionary::class
            ]
        ]);
    }

}
