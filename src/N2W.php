<?php
/**
 * @link https://github.com/phpviet/yii-number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace phpviet\yii\numberToWords;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use PHPViet\NumberToWords\Dictionary;
use PHPViet\NumberToWords\Transformer;
use PHPViet\NumberToWords\SouthDictionary;

/**
 * @method string toWords($number)
 * @method string toCurrency($number, $unit = 'đồng')
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class N2W extends Component
{
    /**
     * Hằng khai báo từ điển trong Nam.
     */
    const SOUTH_DICTIONARY = 'south';

    /**
     * Hằng khai báo từ điển tiêu chuẩn.
     */
    const STANDARD_DICTIONARY = 'standard';

    /**
     * Từ điển sử dụng để đọc số.
     *
     * @var string
     */
    public $dictionary = self::STANDARD_DICTIONARY;

    /**
     * Danh sách các từ điển đã thiết lập.
     *
     * @var array
     */
    protected $dictionaries = [];

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        if (empty($this->dictionaryClasses)) {
            $this->setDictionaries([]);
        }

        parent::init();
    }

    /**
     * Hổ trợ việc gọi các phương thức bên trong transformer.
     *
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public function __call($name, $params)
    {
        $transformer = $this->getTransformer();

        if (method_exists($transformer, $name)) {
            return call_user_func_array([$transformer, $name], $params);
        }

        return parent::__call($name, $params);
    }

    /**
     * Trả về đối tượng giúp cho việc chuyển đổi số sang chữ số.
     *
     * @return Transformer
     */
    protected function getTransformer(): Transformer
    {
        if (! isset($this->dictionaries[$this->dictionary])) {
            throw new InvalidConfigException(sprintf('Dictionary (%s) is not defined!', $this->dictionary));
        }

        $dictionary = Yii::createObject($this->dictionaries[$this->dictionary]);

        return Yii::createObject(Transformer::class, [$dictionary]);
    }

    /**
     * Thiết lập các từ điển.
     *
     * @param array $dictionaries
     */
    public function setDictionaries(array $dictionaries): void
    {
        $this->dictionaries = array_merge($this->defaultDictionaries(), $dictionaries);
    }

    /**
     * Danh sách từ điển mặc định.
     *
     * @return array
     */
    protected function defaultDictionaries(): array
    {
        return [
            self::SOUTH_DICTIONARY => SouthDictionary::class,
            self::STANDARD_DICTIONARY => Dictionary::class,
        ];
    }
}
