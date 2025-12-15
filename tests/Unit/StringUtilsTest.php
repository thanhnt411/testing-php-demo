<?php

namespace Tests\Unit;

use App\Utilts\StringUtilts;

it('correctly slugifies various input strings', function (string $input, string $expected) {
    expect(StringUtilts::slugify($input))->toBe($expected);
})->with([
    ['Ten San Pham Mau Do', 'ten-san-pham-mau-do'],

    ['Tên SẢN PHẨM Đặc biệt, giá 100%', 'ten-san-pham-dac-biet-gia-100'],

    ['  Test  khoảng   trống  ', 'test-khoang-trong'],

]);
