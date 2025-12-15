<?php

use App\Models\ShoppingCart;

beforeEach(function () {
    $this->cart = new ShoppingCart();
});

test('carts start empty', function () {
    expect($this->cart->items)->toBeArray()->toBeEmpty();
});

test('add a single item', function () {
    $this->cart->add('Laptop');
    expect($this->cart->items)->toHaveCount(1)->toContain('Laptop');
});
