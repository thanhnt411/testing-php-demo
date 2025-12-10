<?php

namespace Tests\Unit;

use App\Utilts\StringUtilts;
use PHPUnit\Framework\TestCase;

test('it converts string to a basic slug', function () {
    $input = 'Ten San Pham Mau Do';
    $expected = 'ten-san-pham-mau-do';
    $result = StringUtilts::slugify($input);

    expect($result)->toBe($expected);
});

test('test dau va ki tu dac biet', function () {
    $input = 'Tên SẢN PHẨM Đặc biệt, giá 100%';
    $expected = 'ten-san-pham-dac-biet-gia-100';
    $result = StringUtilts::slugify($input);

    expect($result)->toBe($expected);
});

test('it handles multiple spaces and leading/trailing spaces', function () {
    $input = '  Test  khoảng    trống  ';
    $expected = 'test-khoang-trong';

    expect(StringUtilts::slugify($input))->toBe($expected);
});
