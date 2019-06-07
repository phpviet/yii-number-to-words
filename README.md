<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii Number To Words</h1>
    <br>
</p>

Yii number to words hổ trợ chuyển đổi số sang chữ số Tiếng Việt.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/phpviet/yii-number-to-words.svg?style=flat-square)](https://packagist.org/packages/phpviet/yii-number-to-words)
[![Build Status](https://img.shields.io/travis/phpviet/yii-number-to-words/master.svg?style=flat-square)](https://travis-ci.org/phpviet/yii-number-to-words)
[![Quality Score](https://img.shields.io/scrutinizer/g/phpviet/yii-number-to-words.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpviet/yii-number-to-words)
[![StyleCI](https://styleci.io/repos/190297766/shield?branch=master)](https://styleci.io/repos/190297766)
[![Total Downloads](https://img.shields.io/packagist/dt/phpviet/yii-number-to-words.svg?style=flat-square)](https://packagist.org/packages/phpviet/yii-number-to-words)

## Cài đặt

Cài đặt Yii Number To Words thông qua [Composer](https://getcomposer.org):

```bash
composer require phpviet/yii-number-to-words
```

## Cách sử dụng

### Các tính năng của extension:

- [`Chuyển đổi số sang chữ số`](#Chuyển-đổi-số-sang-chữ-số)
- [`Chuyển đổi số sang tiền tệ`](#Chuyển-đổi-số-sang-tiền-tệ)
- [`Thay cách đọc số`](#Thay-cách-đọc-số)

### Chuyển đổi số sang chữ số

+ Sử dụng thông qua helper `phpviet\yii\numberToWords\N2WHelper`:

```php
use phpviet\yii\numberToWords\N2WHelper;

// âm năm
N2WHelper::toWords(-5); 

// năm
N2WHelper::toWords(5); 

// năm phẩy năm
N2WHelper::toWords(5.5); 
```

+ Sử dụng thông qua `n2w` component:

```php
// mười lăm
Yii::$app->n2w->toWords(15); 

// một trăm linh năm
Yii::$app->n2w->toWords(105); 

// hai mươi tư
Yii::$app->n2w->toWords(24); 
```

### Chuyển đổi số sang tiền tệ

+ Sử dụng thông qua helper `phpviet\yii\numberToWords\N2WHelper`:

```php
use phpviet\yii\numberToWords\N2WHelper;

// năm triệu sáu trăm chín mươi nghìn bảy trăm đồng
N2WHelper::toCurrency(5690700);
```

+ Sử dụng thông qua `n2w` component:

```php
// chín mươi lăm triệu năm trăm nghìn hai trăm đồng
Yii::$app->n2w->toCurrency(95500200);
```

Ngoài ra ta còn có thể sử dụng đơn vị tiền tệ khác thông qua tham trị thứ 2 của phương thức
`toCurrency` tại helper và component với mảng phần từ đầu tiên là đơn vị cho số nguyên và kế tiếp là đơn vị của phân số:

```php
use phpviet\yii\numberToWords\N2WHelper;

// sáu nghìn bảy trăm bốn mươi hai đô bảy xen
N2WHelper::toCurrency(6742.7, ['đô', 'xen']);

// chín nghìn bốn trăm chín mươi hai đô mười lăm xen
Yii::$app->n2w->toCurrency(9492.15, ['đô', 'xen']);
```

### Thay cách đọc số

> Nếu như bạn cảm thấy cách đọc ở trên ổn rồi thì hãy bỏ qua bước này.

Đầu tiên để thay đổi cách đọc số bạn hãy cấu hình `n2w` component trong app config file:

```php
'components' => [
    'n2w' => [
        'class' => 'phpviet\yii\numberToWords\N2W',
        'dictionary' => 'standard',
        'dictionaries' => [
            'standard' => PHPViet\NumberToWords\Dictionary::class,
            'south' => PHPViet\NumberToWords\SouthDictionary::class
        ]
    ]
];
```

Ngay bây giờ bạn hãy thử đổi `dictionary` từ `standard` sang `south`, toàn bộ phương thức chuyển
đổi số sang chữ số và tiền tệ sẽ đọc theo phong cách trong Nam:

```php
use phpviet\yii\numberToWords\N2WHelper;

// một trăm linh một => một trăm lẻ một
N2WHelper::toWords(101);

// một nghìn => một ngàn
N2WHelper::toWords(1000);

 // hai mươi tư => hai mươi bốn
N2WHelper::toWords(24);

// một trăm hai mươi tư nghìn không trăm linh một => một trăm hai mươi bốn ngàn không trăm lẻ một
N2WHelper::toCurrency(124001);
```

hoặc bạn muốn sử dụng linh động hơn thì hãy chỉ định từ điển:

```php
use phpviet\yii\numberToWords\N2WHelper;

// một trăm hai mươi tư nghìn không trăm linh một
N2WHelper::toWords(124001);

// một trăm hai mươi bốn ngàn không trăm lẻ một
N2WHelper::toWords(124001, 'south');
```

Nếu như bạn muốn thay đổi cách đọc theo ý bạn thì hãy tạo một lớp `Dictionary` kế thừa
`PHPViet\NumberToWords\Dictionary` hoặc thực thi mẫu trừu tượng `PHPViet\NumberToWords\DictionaryInterface`:

```php

use PHPViet\NumberToWords\Dictionary;
use PHPViet\NumberToWords\Transformer;

class MyDictionary extends Dictionary {

    /**
     * @inheritDoc
     */
    public function specialTripletUnitFive(): string
    {
        return 'nhăm';
    }

}
```

Sau đó khai báo vào config:

```php
'components' => [
    'n2w' => [
        'class' => 'phpviet\yii\numberToWords\N2W',
        'dictionary' => 'my',
        'dictionaries' => [
            'standard' => PHPViet\NumberToWords\Dictionary::class,
            'south' => PHPViet\NumberToWords\SouthDictionary::class,
            'my' => MyDictionary::class
        ]
    ]
];
```

Và hãy thử ngay:

```php
use phpviet\yii\numberToWords\N2WHelper;

// mười nhăm
N2WHelper::toWords(15);
```

## Dành cho nhà phát triển

Nếu như bạn cảm thấy extension còn thiếu sót hoặc sai sót và bạn muốn đóng góp để phát triển chung, 
chúng tôi rất hoan nghênh! Hãy tạo các `issue` để đóng góp ý tưởng cho phiên bản kế tiếp 
hoặc tạo `PR` để đóng góp. Cảm ơn!
